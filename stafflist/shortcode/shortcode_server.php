<?php
	require_once('../../../../wp-load.php');
	global $wpdb;
	$table_prefix = 'wp_';
	if(isset($_REQUEST["getStaffList"]))
	{
		$page_id = intval($_REQUEST["page_id"]);
		$package_size = intval($_REQUEST["package_size"]);
		$category = $_REQUEST["category"];
		$staff_str = $_REQUEST["staff_str"];
		$selected_alpha = $_REQUEST["selected_alpha"];
		$selected_personType = $_REQUEST["selected_personType"];
		$selected_section = $_REQUEST["section"];

		$category_caluse = '';
		if($category != '')
			$category_caluse = " AND category='$category'";

		$section_clause = ' ';
		if($selected_section != '' and $selected_section != 'undefined')
			$section_clause = " AND section = $selected_section ";

		$total_count = $wpdb->get_var("select count(*) from ".$table_prefix."stafflist where name like '%$staff_str%' AND name like '$selected_alpha%'" . $category_caluse."AND personType like '%".$selected_personType."%' $section_clause");
		$page_count = ceil($total_count / $package_size);
		$offset = $package_size * ($page_id - 1);
		
		//$query = "select list.*, vitae.vitae_language, vitae.vitae_url from ".$table_prefix."stafflist list LEFT JOIN (select staff_id, GROUP_CONCAT(language) as vitae_language, GROUP_CONCAT(url) as vitae_url from ".$table_prefix."vitae group by staff_id) vitae ON list.staff_id=vitae.staff_id where list.name like '%$staff_str%'" . $category_caluse . " AND list.personType like '%". $selected_personType."%' AND name like '$selected_alpha%' order by list.name limit $package_size offset $offset";

		$query = "select list.*, vitae.vitae_language, vitae.vitae_url, section_id, section.name_en as section_name_en, section.name_pt as section_name_pt, section.name_es as section_name_es, section.name_fr as section_name_fr
				 from ".$table_prefix."stafflist list
				 LEFT JOIN ".$table_prefix."staffsection section ON list.section = section.section_id
				 LEFT JOIN (select staff_id, GROUP_CONCAT(language) as vitae_language, GROUP_CONCAT(url) as vitae_url
				 from ".$table_prefix."vitae group by staff_id) vitae
				 ON list.staff_id=vitae.staff_id
				 where list.name like '%$staff_str%'" . $category_caluse . " AND list.personType like '%". $selected_personType."%' AND list.name like '$selected_alpha%' $section_clause
				 order by list.name limit $package_size offset $offset";
		
		$lang = 'pt-br';
		if ( defined( 'ICL_LANGUAGE_CODE' ) ) 
		{
			$lang = ICL_LANGUAGE_CODE;
		}
		$result = $wpdb->get_results($query);
		$data = array();
		foreach ( $result as $row )  
		{	
			if (!empty($row->image)) {
				$row->image = wp_get_attachment_image_src( $row->image , 'medium' );
				$row->image = $row->image[0];
			}
			array_push($data, $row);
		}
		$result_array = array("data"=>$data,"page_count"=>$page_count,"lang"=>$lang,"icl"=>apply_filters( 'wpml_active_languages', NULL ));
		echo json_encode($result_array);
	}

	if(isset($_REQUEST["getStaffSection"]))
	{

		$lang = 'pt-br';
		if ( defined( 'ICL_LANGUAGE_CODE' ) ) 
		{
			$lang = ICL_LANGUAGE_CODE;
		}

		$query = "SELECT * FROM ". $table_prefix . "staffsection sec WHERE EXISTS (SELECT 1 FROM ". $table_prefix . "stafflist li WHERE li.section = sec.section_id); ";

		$result = $wpdb->get_results($query);
		$data = array();
		foreach ( $result as $row )  
		{
			array_push($data, $row);
		}
		$result_array = array("data"=>$data, "lang"=>$lang, "icl"=>apply_filters( 'wpml_active_languages', NULL ));
		echo json_encode($result_array);

		die();

	}
?>