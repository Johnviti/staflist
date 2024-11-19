<?php
	require_once('../../../wp-load.php');
	global $wpdb;
	$table_prefix = 'wp_';
	if(isset($_REQUEST["deleteSection"]))
	{
		$section_id = $_REQUEST["section_id"];
		$section_in_use = $wpdb->get_var("select section from ".$table_prefix."stafflist where section='$section_id'");

		if($section_in_use == NULL) {
			$result = $wpdb->delete( $table_prefix."staffsection", array( 'section_id' => $section_id ) );
			echo $result == 1 ? 'success' : 'failed';
		} else {
			echo 'Section in use.';
		}
	}

	if(isset($_REQUEST["addSection"]))
	{
		$section_en = $_REQUEST["section_en"];
		$section_pt = $_REQUEST["section_pt"];
		$section_es = $_REQUEST["section_es"];
		$section_fr = $_REQUEST["section_fr"];

		$name = $wpdb->get_var("select name_en from ".$table_prefix."staffsection where name='$section_en'");
		if($name != NULL)
			echo 'double';
		else
		{
			$result = $wpdb->insert($table_prefix.'staffsection', array(
			    'name_en' => $section_en,
			    'name_pt' => $section_pt,
			    'name_es' => $section_es,
			    'name_fr' => $section_fr,

			));
			if($result != 1)
				echo 'failed';
			else
				'success';
		}
	}
?>