<?php	

class News extends Admin{
	
	private $class_name = "News";	
	private $table_name = "news_tb";
	private $links_per_page = 50;
	private $name = "Новости";


	function form($row = array()){
		$oForm = new ConstructForm(&$this->oSmarty, $this->name);				
		
		$oForm->setField('text', 'name', 'Заголовок', true, 0, $row);
		$oForm->setField('fck', 'text', 'Новость', true, 0, $row);
	
		
		$aArr = $oForm->getField(0); 		
		$oForm->setFields($aArr, 0, "");		
		return $oForm;			
	}
	
	function form_add($row = array()){
		return $this->form();
	}
	
	function add(){		 
		DB::query("INSERT INTO `news_tb` (`date_add`, `name`, `text`)
		VALUES( 
		NOW(),
		'".DB::escape($_POST['name'])."',
		'".DB::escape($_POST['text'])."'
		)
		");
		DB::query("UPDATE `user_tb` SET `news` = news+1");
	}	
	
	function edit(){					
		DB::query("UPDATE `news_tb` SET		
		`name` = '".DB::escape($_POST['name'])."',
		`text` = '".DB::escape($_POST['text'])."'		
		WHERE `id` = '".DB::escape($_GET['id'])."'");
	}

	function table($aRow){					
		return $aRow;
	}		
	
	private $partner = array();
	
	
	function action(){		
		$where = " WHERE 1";
		
		if(isset($_POST['b1']) && $_POST['b1'] == "Удалить"){
			foreach ($_REQUEST['id_check'] as $k=>$v){
				DB::query("DELETE FROM `".$this->table_name."` WHERE `id` = '".$v."'");				
			}	
		}
		
	
		
		$a = array();
		$a['name'] = array('Заголовок', '80%', true);		
		
		
		
		
		$btn = array();
		$btn[] = "Удалить";
		
		
		
		
		$oTable = new Table("admin.php?act=".str_replace('action', '', __FUNCTION__)."&page=");				
		return $this->InIndex('Новости' , $oTable->getTable($this, $this->class_name, $this->table_name, $a, $this->links_per_page, $btn));
	}
	
} 

?>