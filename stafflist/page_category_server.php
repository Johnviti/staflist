<?php
	require_once('../../../wp-load.php');
	global $wpdb;
	$table_prefix = 'wp_';
	if(isset($_REQUEST["deleteCategory"]))
	{
		$category_id = $_REQUEST["category_id"];
		$result = $wpdb->delete( $table_prefix."staffcategory", array( 'category_id' => $category_id ) );
		echo $result == 1 ? 'success' : 'failed';
	}

	if(isset($_REQUEST["addCategory"]))
	{
		$category = $_REQUEST["category"];
		$name = $wpdb->get_var("select name from ".$table_prefix."staffcategory where name='$category'");
		if($name != NULL)
			echo 'double';
		else
		{
			$result = $wpdb->insert($table_prefix.'staffcategory', array(
			    'name' => $category
			));
			if($result != 1)
				echo 'failed';
			else
				'success';
		}
	}
?>