<?php	

class Users extends Admin{
	
	private $class_name = "Users";	
	private $table_name = "user_tb";
	private $links_per_page = 50;
	private $name = "Партнеры";


	function form($row = array()){
		$oForm = new ConstructForm(&$this->oSmarty, $this->name);				
		
		$oForm->setField('text', 'email', 'email', true, 0, $row);
		$oForm->setField('text', 'passwd', 'Пароль', true, 0, $row);
		$oForm->setField('text', 'phone', 'Телефон', !true, 0, $row);
		$oForm->setField('text', 'fname', 'Имя', !true, 0, $row);
		$oForm->setField('text', 'lname', 'Фамилия', !true, 0, $row);
		$oForm->setField('text', 'wmz', 'wmz', !true, 0, $row);
		$oForm->setField('text', 'wmr', 'wmr', !true, 0, $row);
		$oForm->setField('text', 'qiwi', 'qiwi', !true, 0, $row);
		$oForm->setField('text', 'yandex', 'yandex', !true, 0, $row);
		
		$oForm->setField('checkbox', 'notificationNews', 'Источник', !true, 0, $row);
		$oForm->setField('checkbox', 'notificationProduct', 'Источник', !true, 0, $row);
		$oForm->setField('checkbox', 'notificationMessage', 'Источник', !true, 0, $row);
		$oForm->setField('checkbox', 'notificationPartner', 'Источник', !true, 0, $row);
		
		$aArr = $oForm->getField(0); 		
		$oForm->setFields($aArr, 0, "");		
		return $oForm;			
	}
	
	function form_add($row = array()){
		return $this->form();
	}
	
	function add(){		
		
	}	
	
	function edit(){					
		DB::query("UPDATE `user_tb` SET
		`email` = '".DB::escape($_POST['email'])."',
		`passwd` = '".DB::escape($_POST['passwd'])."',
		`phone` = '".DB::escape($_POST['phone'])."',
		`fname` = '".DB::escape($_POST['fname'])."',
		`lname` = '".DB::escape($_POST['lname'])."',
		`wmz` = '".DB::escape($_POST['wmz'])."',
		`wmr` = '".DB::escape($_POST['wmr'])."',
		`qiwi` = '".DB::escape($_POST['qiwi'])."',
		`yandex` = '".DB::escape($_POST['yandex'])."',
		`notificationNews` = '".DB::escape($_POST['notificationNews'])."',
		`notificationProduct` = '".DB::escape($_POST['notificationProduct'])."',
		`notificationMessage` = '".DB::escape($_POST['notificationMessage'])."',
		`notificationPartner` = '".DB::escape($_POST['notificationPartner'])."'
		WHERE `id` = '".DB::escape($_GET['id'])."'");
	}

	function table($aRow){		
		$aRow['status'] = ' 
		<select class="change_status" id="'.$aRow['id'].'">
			<option '.(($aRow['status'] == 0)?"selected":"").' value="0">не активирован</option>
			<option '.(($aRow['status'] == 1)?"selected":"").' value="1">активирован</option>
			<option '.(($aRow['status'] == 2)?"selected":"").' value="2">АДМИНИСТАТОР</option>
		</select>
		';
		
		if(!isset($this->partner[$aRow['ref_id']])){
			$this->partner[$aRow['ref_id']] = DB::query_row("SELECT * FROM `user_tb` WHERE `id` = '".DB::escape($aRow['ref_id'])."'");
		}
		if(isset($this->partner[$aRow['ref_id']]['email'])){
			$aRow['ref_id'] = "<a target='_blank' href='/admin/ru/Users/Show/?user_id=".$aRow['ref_id']."'>".$this->partner[$aRow['ref_id']]['email']."</a>";
		}else{
			$aRow['ref_id'] = "нет";
		}
		
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
		
		if(isset($_POST['func']) && $_POST['func'] == "changeStatus"){
			DB::query("UPDATE `user_tb` SET `status` = '".DB::escape($_POST['value'])."' WHERE `id` = '".DB::escape($_POST['user_id'])."'");
			echo json_encode(array('result'=>1));die();
		}
		
		
		$a = array();
		$a['ref_id'] = array('Рефферал', '20%', true);		
		$a['email'] = array('Email', '20%', true);		
		$a['passwd'] = array('Пароль', '10%', true);
		$a['phone'] = array('Телефон', '10%', true);
		$a['status'] = array('Статус', '15%', true);
		$a['wmz'] = array('Wmz', '10%', true);
		$a['wmr'] = array('Wmr', '10%', true);
		$a['qiwi'] = array('Qiwi', '10%', true);
		$a['yandex'] = array('Yandex', '10%', true);
		
		
		
		
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
		return $this->InIndex('Партнеры' , $this->oSmarty->fetch("Admin/Elem/SearchUser.tpl").$oTable->getTable($this, $this->class_name, $this->table_name, $a, $this->links_per_page, $btn, $where." ORDER BY `id` DESC"));
	}
	
} 

?>