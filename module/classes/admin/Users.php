<?php	

class Users extends Admin{
	
	private $class_name = "Users";	
	private $table_name = "user_tb";
	private $links_per_page = 50;
	private $name = "Пользователя";


	function form($row = array()){
		$oForm = new ConstructForm(&$this->oSmarty, $this->name);						
		$itab = 0;
		$oForm->setField('text', 'email', 'email', true, $itab, $row, null, array(), "EmailConfirm");
		$oForm->setField('text', 'passwd', 'Пароль', true, $itab, $row);		
		$oForm->setField('text', 'login', 'Логин', true, $itab, $row);				
		$status[0] = array('Title'=>'Заблокирован');
		$status[1] = array('Title'=>'Пользователь');
		$status[2] = array('Title'=>'Администатор');		
		if(isset($row['status'])){
			$status[$row['status']]['Selected'] = "selected";
		}
		$oForm->setField('select', 'status', 'Статус', true, $itab, $row, "", $status);		
		$aArr = $oForm->getField($itab); 		
		$oForm->setFields($aArr, $itab, "Основные");		
		return $oForm;	
	}
	
	function form_add($row = array()){
		return $this->form();
	}
	
	function add(){		
		DB::query("INSERT INTO `".$this->table_name."` 
		(`email`, `passwd`, `login`, `status`)
		VALUES(
		'".DB::escape($_POST['email'])."',
		'".DB::escape($_POST['passwd'])."',
		'".DB::escape($_POST['login'])."',
		'".DB::escape($_POST['status'])."'
		);
		");
	}	
	
	function edit(){					
		DB::query("UPDATE `user_tb` SET
		`email` = '".DB::escape($_POST['email'])."',
		`passwd` = '".DB::escape($_POST['passwd'])."',
		`login` = '".DB::escape($_POST['login'])."',
		`status` = '".DB::escape($_POST['status'])."'
		WHERE `id` = '".DB::escape($_GET['id'])."'");
	}

	function table($aRow){		
		$aRow['status'] = ' 
		<select class="change_status" id="'.$aRow['id'].'">
			<option '.(($aRow['status'] == 0)?"selected":"").' value="0">Заблокирован</option>
			<option '.(($aRow['status'] == 1)?"selected":"").' value="1">Пользователь</option>
			<option '.(($aRow['status'] == 2)?"selected":"").' value="2">Администратор</option>
		</select>
		';

		return $aRow;
	}		
	
	private $partner = array();
	
	function changeStatus(){
		DB::query("UPDATE `user_tb` SET `status` = '".DB::escape($_POST['value'])."' WHERE `id` = '".DB::escape($_POST['user_id'])."'");
		return  json_encode(array('result'=>1));
	}
	
	function action(){		
		$where = " WHERE 1";
		
		if(isset($_POST['b1']) && $_POST['b1'] == "Удалить" && isset($_REQUEST['id_check'])){
			foreach ($_REQUEST['id_check'] as $k=>$v){
				DB::query("DELETE FROM `".$this->table_name."` WHERE `id` = '".$v."'");				
			}
		}
				
		$a = array();
		$a['login'] = array('Логин', '20%', true);		
		$a['email'] = array('Email', '20%', true);		
		$a['passwd'] = array('Пароль', '10%', true);
		$a['status'] = array('Статус', '10%', true);
				
		$btn = array();
		$btn[] = "Удалить";
		
		if(isset($_GET['user_id'])){
			$where .= " && `id` = '".DB::escape($_GET['user_id'])."'";
		}
		if(isset($_GET['key'])){
			$where .= " && (
			`id` = '".DB::escape($_GET['key'])."' || 
			`email` = '".DB::escape($_GET['key'])."' || 
			`phone` = '".DB::escape($_GET['key'])."' 
			)";
		}
		
		
		$oTable = new Table("admin.php?act=".str_replace('action', '', __FUNCTION__)."&page=");				
		return $this->InIndex('Пользователи' , $oTable->getTable($this, $this->class_name, $this->table_name, $a, $this->links_per_page, $btn, $where." ORDER BY `id` DESC"));
	}
	
} 

?>