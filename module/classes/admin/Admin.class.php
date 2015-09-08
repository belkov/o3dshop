<?php

class Admin extends BaseModule{

	function Admin(){
		parent::__construct();		
		spl_autoload_register(array($this, 'autoloader'));
	}
	
	function autoloader($class) {
    	include 'module/classes/admin/' . $class . '.php';
	}
	
	function actionLogout(){
		session_destroy();		
	    unset($_SERVER["PHP_AUTH_USER"]);
	    unset($_SERVER["PHP_AUTH_PW"]);
		$this->redirectTo("/admin/ru/");
	}
	
	function actionDefault(){
		return $this->oSmarty->fetch("Admin/Default.tpl");
	}
	
	function actionShow(){	
    	$obj = new $_GET['class'];    	
		return call_user_func(array($obj, "action"));
		
	}
	
	function InIndex($sTitle, $sText){
		$this->oSmarty->assign("TITLE", $sTitle);
		$this->oSmarty->assign("TEXT", $sText);
		return $this->oSmarty->fetch("Admin/Main.tpl");
	}	

	
	function actionAdd(){	
    	$obj = new $_GET['class'];
		$oForm = call_user_func(array($obj, "form_add"));		
		$oForm->setFunctionPostBack($this, "addForm");		
		return $this->InIndex("Добавление ".$oForm->getFormName(), $oForm->getForm("", ""), 1);
	}
	
	
	function actionEdit(){
		$obj = DB::query_row("SELECT * FROM `".$_GET['table']."` WHERE `id` = '".$_GET['id']."'");
		$class = new $_GET['class'];
		$oForm =  call_user_func(array($class, "form"), $obj);
		$oForm->setFunctionPostBack($this, "editForm");				
		return $this->InIndex("Редактирование ".$oForm->getFormName(), $oForm->getForm("", ""), 1);
	}
	
	function editForm(){
		$obj = new $_GET['class'];
		call_user_func(array($obj, "edit"));	
		$this->redirectTo(unserialize(base64_decode($_GET['req'])));
	}
	
	function addForm(){		
		$obj = new $_GET['class'];
		call_user_func(array($obj, "add"));
		$this->redirectTo(unserialize(base64_decode($_GET['req'])));
	}
	
} 
	
?>