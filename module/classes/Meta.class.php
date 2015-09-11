<?php

class Meta{

	public static function getMeta($parentID, $table){
		if($meta = DB::query_row("SELECT * FROM `meta_tb` WHERE `parentID` = '".DB::escape($parentID)."' && `table` = '".DB::escape($table)."'")){
			return $meta;
		}
		return false;
	}

	
	public static function updatetMeta($parentID, $table){
		DB::query("INSERT INTO `meta_tb` (`parentID`, `table`, `meta_title`, `meta_description`, `meta_keywords`)
		VALUES(
		'".DB::escape($parentID)."',
		'".DB::escape($table)."',
		'".DB::escape($_POST['meta_title'])."',
		'".DB::escape($_POST['meta_description'])."',
		'".DB::escape($_POST['meta_keywords'])."'
		)
		ON DUPLICATE KEY UPDATE 
		`meta_title`='".DB::escape($_POST['meta_title'])."',
		`meta_description`='".DB::escape($_POST['meta_description'])."',
		`meta_keywords`='".DB::escape($_POST['meta_keywords'])."'
		;
		");
	}

	
}

?>