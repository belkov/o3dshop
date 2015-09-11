<?

class Photo extends Admin{
	
	function getDir($dir){
		if(!is_dir($dir)){
			mkdir($dir, 0777);
		}
		return $dir;
	}

	public static function getPathFile($id){
		if(mb_strlen($id) == 1)
			return "00".$id;
		elseif(mb_strlen($id) == 2)
			return "0".$id;
		elseif(mb_strlen($id) == 3)
			return $id;
		return mb_substr($id, 0, 3);
	}
	
	function action(){		
		$photo = array();
		$dir = $this->getDir("i/".strtolower($_GET['classDiv']));
		$sort_id = 0;
		
		if($_POST['parentID'] != 0 && $row = DB::query_row("SELECT sort FROM `photo_tb` WHERE `parentID` = '".DB::escape($_POST['parentID'])."' && `table` = '".DB::escape($_GET['classDiv'])."' ORDER BY `sort` DESC")){
			$sort_id = $row['sort'];
		}			
				
		foreach ($_FILES['img_arr']['tmp_name'] as $k=>$v) {	
			$sort_id++;	
			DB::query("INSERT INTO `photo_tb` (`parentID`, `table`, `name`, `sort`) 
			VALUES (
				'".DB::escape($_POST['parentID'])."',
				'".DB::escape($_GET['classDiv'])."',
				'".DB::escape($_FILES['img_arr']['name'][$k])."',
				'".$sort_id."'
			)");
			$insert_id = DB::last_inserted_id();				
			$_SESSION['photo'][$insert_id] = $insert_id;
			foreach (Config::$photo[$_GET['classDiv']] as $size){
				$this->getDir($dir."/".self::getPathFile($insert_id));
				$e = explode('x', $size);
				if(count($e) == 1){
					Resize::resizeImage($e['0'], $v, $this->getDir($dir."/".self::getPathFile($insert_id)."/".$size)."/".$_FILES['img_arr']['name'][$k]);
				}else{
					Resize::cropImage($e['0'], $e['1'], $v, $this->getDir($dir."/".self::getPathFile($insert_id)."/".$size)."/".$_FILES['img_arr']['name'][$k]);
				}				
			}				
			copy($v, $dir."/".self::getPathFile($insert_id)."/".$_FILES['img_arr']['name'][$k]);
			Resize::resizeImage(80, $v, $this->getDir($dir."/".self::getPathFile($insert_id)."/thumb")."/".$_FILES['img_arr']['name'][$k]); 
			$photo[] = array('src'=>$dir."/".self::getPathFile($insert_id)."/thumb/".$_FILES['img_arr']['name'][$k], 'id'=>$insert_id, 'sort'=>$sort_id);
		}		
		echo json_encode($photo);
		die();		 
	}
	
	public static function updateID($parentID){		
		if(isset($_POST['photo_id'])){
		 	foreach ($_POST['photo_id'] as $k=>$v){
		 		DB::query("UPDATE `photo_tb` SET 
		 		`parentID` = '".DB::escape($parentID)."',
		 		`sort` = '".DB::escape($_POST['sort'][$v])."'
		 		WHERE `id` = '".DB::escape($v)."'
		 		");
		 		unset($_SESSION['photo'][$v]);
		 	}	 	 			
		 	$rows = DB::query_array("SELECT * FROM `photo_tb` WHERE `id` NOT IN(".DB::escape(implode(", ", $_POST['photo_id'])).") && `parentID` = '".DB::escape($parentID)."' && `table` = '".DB::escape($_GET['class'])."'");		 	
		 	foreach ($rows as $v){
		 		self::deletePhoto($v['id']);
		 	}
	 		DB::query("DELETE FROM `photo_tb` WHERE `id` NOT IN(".DB::escape(implode(", ", $_POST['photo_id'])).") && `parentID` = '".DB::escape($parentID)."' && `table` = '".DB::escape($_GET['class'])."'");
	 	}else{
	 		$rows = DB::query_array("SELECT * FROM `photo_tb` WHERE `parentID` = '".DB::escape($parentID)."' && `table` = '".DB::escape($_GET['class'])."'");		 	
	 		foreach ($rows as $v){
		 		self::deletePhoto($v['id']);
		 	}
	 		DB::query("DELETE FROM `photo_tb` WHERE `parentID` = '".DB::escape($parentID)."' && `table` = '".DB::escape($_GET['class'])."'");
	 	}
		foreach ($_SESSION['photo'] as $k=>$v){
			self::deletePhoto($v);
			DB::query("DELETE FROM `photo_tb` WHERE `id` = '".DB::escape($v)."' ");
			unset($_SESSION['photo'][$k]);
		}
	}

	public static function getPhoto($parentID, $table, $main = 0){
		$rows = DB::query_array("SELECT * FROM `photo_tb` WHERE `parentID` = '".DB::escape($parentID)."' && `table` = '".DB::escape($table)."'"); 		
		foreach ($rows as $k=>$v){
			if($v['id'] == $main){
				$rows[$k]['main'] = 1;
			}
			$rows[$k]['path'] = "/i/".strtolower($table)."/".self::getPathFile($v['id'])."/thumb";
		}		
		return $rows;
	}

	public static function deletePhoto($photo_id){
		$photo = DB::query_row("SELECT * FROM `photo_tb` WHERE `id` = '".DB::escape($photo_id)."'");		
		unlink("i/".strtolower($photo['table'])."/".self::getPathFile($photo['id'])."/thumb/".$photo['name']);
		unlink("i/".strtolower($photo['table'])."/".self::getPathFile($photo['id'])."/".$photo['name']);
		foreach (Config::$photo[$photo['table']] as $size){
			unlink("i/".strtolower($photo['table'])."/".self::getPathFile($photo['id'])."/".$size."/".$photo['name']);
			self::getCountFiles("i/".strtolower($photo['table'])."/".self::getPathFile($photo['id'])."/".$size);		
		}
		self::getCountFiles("i/".strtolower($photo['table'])."/".self::getPathFile($photo['id'])."/thumb");		
		self::getCountFiles("i/".strtolower($photo['table'])."/".self::getPathFile($photo['id']));		
	}
	
	public static function getCountFiles($dir){
		$count = 0;
		if (is_dir($dir)) {
		    if ($dh = opendir($dir)) {
		        while (($file = readdir($dh)) !== false) {
		            if(is_file($dir."/".$file)){
		            	$count++;
		            }
		        }
		        closedir($dh);
		    }
		}
		if($count == 0){
			rmdir ($dir);
		}
		return $count;
	}
	
	public static function deletePhotos($parentID, $table){
		$rows = DB::query_array("SELECT * FROM `photo_tb` WHERE `parentID` = '".DB::escape($parentID)."' && `table` = '".DB::escape($table)."'"); 		
		foreach ($rows as $k=>$v){			
			foreach (Config::$photo[$table] as $size){
				unlink("i/".strtolower($table)."/".self::getPathFile($v['id'])."/".$size."/".$v['name']);
				self::getCountFiles("i/".strtolower($table)."/".self::getPathFile($v['id'])."/".$size);		
			}
			unlink("i/".strtolower($table)."/".self::getPathFile($v['id'])."/thumb/".$v['name']);
			unlink("i/".strtolower($table)."/".self::getPathFile($v['id'])."/".$v['name']);
			self::getCountFiles("i/".strtolower($table)."/".self::getPathFile($v['id'])."/thumb");
			self::getCountFiles("i/".strtolower($table)."/".self::getPathFile($v['id'])."");			
		}	
		DB::query("DELETE FROM `photo_tb` WHERE `parentID` = '".DB::escape($parentID)."' && `table` = '".DB::escape($table)."'");
	}
	 
	public static function getCountPhoto($parentID, $table){
		$row = DB::query_row("SELECT COUNT(id) as count FROM `photo_tb` WHERE `parentID` = '".DB::escape($parentID)."' && `table` = '".DB::escape($table)."'");
		return $row['count'];
	}
	
	public static function getPhotoById($photo_id){
		$row = DB::query_row("SELECT * FROM `photo_tb` WHERE `id` = '".DB::escape($photo_id)."'");
		return array('path'=>"/i/".strtolower($row['table'])."/".self::getPathFile($row['id']), 'name'=>$row['name']);
	}
}

?>