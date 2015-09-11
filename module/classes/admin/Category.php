<?php	

class Category extends Admin{
	
	private $class_name = "Category";	
	private $table_name = "category_tb";
	private $links_per_page = 50;
	private $name = "Категории";


	function form($row = array()){
		$oForm = new ConstructForm(&$this->oSmarty, $this->name);				
		
		$itab = 0;
		
		if(!isset($row['categoryID']) || $row['categoryID'] == 0){
			$row['categoryID'] = '0';
			$row['parent'] = 'нет';
		}else{
			$parent = DB::query_row("SELECT * FROM `category_tb` WHERE `id` = '".DB::escape($row['categoryID'])."'");
			$row['parent'] = $parent['name'];
		}
		
		$oForm->setField('text', 'parent', 'Родитель', !true, $itab, $row, " id = 'parent' ");
		$oForm->setField('hidden', 'categoryID', '', true, $itab, $row, " id = 'parentIDHidden' ");
		$oForm->setField('text', 'name', 'Категория', true, $itab, $row);
		$oForm->setField('fck', 'description', 'Описание', true, $itab, $row);	
		$aArr = $oForm->getField($itab); 		
		$oForm->setFields($aArr, $itab, "Основные");
		$itab++;
		$oForm->setField('manyphoto', 'img_arr', 'Изображения', !true, $itab, $row, ((isset($row['id']))?Photo::getPhoto($row['id'], $this->class_name, $row['main']):null));
		$aArr = $oForm->getField($itab); 		
		$oForm->setFields($aArr, $itab, "Изображения");		
		$itab++;				
		$oForm->setField('text', 'meta_title', 'Title мета', true, $itab, ((isset($row['id'])?Meta::getMeta($row['id'], $this->class_name):array())));
		$oForm->setField('text', 'meta_description', 'Description мета', true, $itab, ((isset($row['id'])?Meta::getMeta($row['id'], $this->class_name):array())));		
		$oForm->setField('text', 'meta_keywords', 'Keywords мета', true, $itab, ((isset($row['id'])?Meta::getMeta($row['id'], $this->class_name):array())));		
		$aArr = $oForm->getField($itab); 		
		$oForm->setFields($aArr, $itab, "Мета");	
		
		return $oForm;			
	}
	
	function form_add($row = array()){
		return $this->form();
	}
	
	function add(){		 
		DB::query("INSERT INTO `".$this->table_name."` (`date_add`, `categoryID`, `name`, `description`)
		VALUES( 
		NOW(),
		'".DB::escape($_POST['categoryID'])."',
		'".DB::escape($_POST['name'])."',
		'".DB::escape($_POST['description'])."'
		)
		");
		$parent_id = DB::last_inserted_id();
		Photo::updateID($parent_id);
		$main = 0;
		if(!isset($_POST['main'])){
			if($photo = DB::query_row("SELECT * FROM `photo_tb` WHERE `parentID` = '".$parent_id."' && `table` = '".$this->class_name."'")){
				$main = $photo['id'];
			}
		}else{
			$main = $_POST['main'];
		}
		DB::query("UPDATE `".$this->table_name."` SET `main` = '".DB::escape($main)."' WHERE `id` = '".$parent_id."'");
		Meta::updatetMeta($parent_id, $this->class_name);
	}	
	 
	function edit(){					
		DB::query("UPDATE `".$this->table_name."` SET		
		`categoryID` = '".DB::escape($_POST['categoryID'])."',
		`name` = '".DB::escape($_POST['name'])."',
		`description` = '".DB::escape($_POST['description'])."'		
		WHERE `id` = '".DB::escape($_GET['id'])."'");
		Photo::updateID($_GET['id']);
		$main = 0;
		if(!isset($_POST['main'])){
			if($photo = DB::query_row("SELECT * FROM `photo_tb` WHERE `parentID` = '".$_GET['id']."' && `table` = '".$this->class_name."'")){
				$main = $photo['id'];
			}
		}else{
			$main = $_POST['main'];
		}		
		DB::query("UPDATE `".$this->table_name."` SET `main` = '".DB::escape($main)."' WHERE `id` = '".DB::escape($_GET['id'])."'");
		
		Meta::updatetMeta($_GET['id'], $this->class_name);
	}

	function table($aRow){					
		if($parent = DB::query_row("SELECT * FROM `category_tb` WHERE `id` = '".DB::escape($aRow['categoryID'])."'"))
			$aRow['categoryID'] = $parent['name'];
		else 
			$aRow['categoryID'] = "нет";
		if(DB::query_row("SELECT * FROM `category_tb` WHERE `categoryID` = '".$aRow['id']."'"))
			$aRow['name'] = '<a href="/admin/ru/Category/Show/?categoryID='.$aRow['id'].'">'.$aRow['name'].'</a>';
		return $aRow;
	}		
	
	function searchCategory(){
		if($row = DB::query_array("SELECT * FROM `category_tb` WHERE `name` LIKE '%".DB::escape($_POST['key'])."%'")){
			return json_encode(array('result'=>1, 'data'=>$row));
		}else{
			return json_encode(array('result'=>0));
		}		
	}
	
	function action(){				
		$where = " WHERE 1";
		
		if(isset($_POST['b1']) && $_POST['b1'] == "Удалить"){
			foreach ($_REQUEST['id_check'] as $k=>$v){
				Photo::deletePhotos($v, $this->class_name);
				DB::query("DELETE FROM `".$this->table_name."` WHERE `id` = '".$v."'");				
			}	
		} 
		
		$a = array();
		$a['categoryID'] = array('Родитель', '20%', true);		
		$a['name'] = array('Заголовок', '80%', true);		
		
		$btn = array();
		$btn[] = "Удалить";
		
		$category_id = (isset($_GET['categoryID']))?$_GET['categoryID']:0;
		
		$where .= ' && `categoryID` = "'.DB::escape($category_id).'"';
		
		
		$oTable = new Table("admin.php?act=".str_replace('action', '', __FUNCTION__)."&page=");				
		return $this->InIndex('Категории' , $oTable->getTable($this, $this->class_name, $this->table_name, $a, $this->links_per_page, $btn, $where));
	}
	
} 

?>