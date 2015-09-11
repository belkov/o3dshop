<?php	

class Product extends Admin{
	
	private $class_name = "Product";	
	private $table_name = "product_tb";
	private $links_per_page = 50;
	private $name = "Товара";


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
		
		$oForm->setField('text', 'name', 'Название', true, $itab, $row);
		$oForm->setField('text', 'sku', 'Артикул', true, $itab, $row);		
		$oForm->setField('text', 'price', 'Цена', true, $itab, $row);		
		$oForm->setField('text_pro', 'short_description', 'Краткое описание', !true, $itab, $row);
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
		DB::query("INSERT INTO `".$this->table_name."` (`date_add`, `categoryID`, `name`, `sku`, `short_description`, `price`, `description`)
		VALUES( 
		NOW(),
		'".DB::escape($_POST['categoryID'])."',
		'".DB::escape($_POST['name'])."',
		'".DB::escape($_POST['sku'])."',
		'".DB::escape($_POST['short_description'])."',
		'".DB::escape($_POST['price'])."',
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
		
		DB::query("UPDATE `".$this->table_name."` SET `main` = '".DB::escape($main)."', `cphoto` = '".Photo::getCountPhoto($parent_id, $this->class_name)."' WHERE `id` = '".$parent_id."'");
		Meta::updatetMeta($parent_id, $this->class_name);
	}	
	 
	function edit(){					
		DB::query("UPDATE `".$this->table_name."` SET		
		`date_update` = NOW(),
		`categoryID` = '".DB::escape($_POST['categoryID'])."',
		`name` = '".DB::escape($_POST['name'])."',
		`sku` = '".DB::escape($_POST['sku'])."',
		`short_description` = '".DB::escape($_POST['short_description'])."',
		`price` = '".DB::escape($_POST['price'])."',
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
		
		DB::query("UPDATE `".$this->table_name."` SET `main` = '".DB::escape($main)."', `cphoto` = '".Photo::getCountPhoto($_GET['id'], $this->class_name)."' WHERE `id` = '".DB::escape($_GET['id'])."'");
		
		Meta::updatetMeta($_GET['id'], $this->class_name);
	}

	function table($aRow){			
		$photo = Photo::getPhotoById($aRow['main']);
		$aRow['main'] = "<img src='".$photo['path']."/thumb/".$photo['name']."'>";		
		if($parent = DB::query_row("SELECT * FROM `category_tb` WHERE `id` = '".DB::escape($aRow['categoryID'])."'"))
			$aRow['categoryID'] = $parent['name'];
		else 
			$aRow['categoryID'] = "нет";
		return $aRow;
	}		
	
	private $partner = array();
	
	
	function action(){				
		$where = " WHERE 1";
		
		if(isset($_POST['b1']) && $_POST['b1'] == "Удалить"){
			foreach ($_REQUEST['id_check'] as $k=>$v){
				Photo::deletePhotos($v, $this->class_name);
				DB::query("DELETE FROM `".$this->table_name."` WHERE `id` = '".$v."'");				
			}	
		} 
		
		$a = array();
		$a['main'] = array('Изображение', '15%', true);		
		$a['categoryID'] = array('Категория', '15%', true);		
		$a['name'] = array('Название', '20%', true);		
		$a['price'] = array('Стоимость', '50%', true);		
		
		$btn = array();
		$btn[] = "Удалить";
		
		
		
		
		$oTable = new Table("admin.php?act=".str_replace('action', '', __FUNCTION__)."&page=");				
		return $this->InIndex('Товары' , $oTable->getTable($this, $this->class_name, $this->table_name, $a, $this->links_per_page, $btn));
	}
	
} 

?>