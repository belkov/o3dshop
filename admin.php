<?
session_start();
set_time_limit(0);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8'); 
?>
<?php
//module
require_once("module/config.php");
require_once("module/classes/DB.class.php");
require_once("module/classes/BaseModule.class.php");
require_once("module/classes/web/Table.class.php");
require_once("module/classes/web/Form.class.php");
require_once("module/classes/web/ConstructForm.class.php");
require_once("module/classes/BaseModule.class.php");
require_once("module/classes/admin/Admin.class.php");
require_once("module/classes/Resize.class.php"); 
require_once("module/classes/Menu.class.php");
require_once("module/classes/URI.class.php");
require_once("module/classes/Filter.class.php");
require_once("module/classes/Meta.class.php");
// lib
require_once("lib/phpmailer/class.phpmailer.php");
require_once("lib/smarty/Smarty.class.php");

$login_successful = false;

$oBaseModule = new BaseModule();

if(!isset($_GET['region'])){	
	$oBaseModule->redirectTo('/admin/ru/');
}

if(!isset($_REQUEST['act']))
	$sAct = "actionDefault";
else
	$sAct = "action".$_REQUEST['act'];
 
if(isset($_GET['act']) && $_GET['act']=="Logout"){
	if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
		header('WWW-Authenticate: Basic realm="My Realm"');
		header('HTTP/1.0 401 Unauthorized');
		echo "<script>window.location = '/admin/';</script>";
		exit(0);
	}
	else 
	{
		$oBaseModule->redirectTo('/admin/ru/');
	}
}


$oProcess = new Admin();	
call_user_func(array($oProcess, "init"), &$oBaseModule->oSmarty);
$CONTENT =  call_user_func(array($oProcess, $sAct));

if(isset($_GET['class'])){
	if(is_file("assets/backend/js/".$_GET['class'].".js")){
		$oBaseModule->oSmarty->assign("jsfile", "/assets/backend/js/".$_GET['class'].".js");
	}
	if(is_file("assets/backend/css/".$_GET['class'].".css")){
		$oBaseModule->oSmarty->assign("cssfile", "/assets/backend/css/".$_GET['class'].".css");
	}
}


if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
    $usr = $_SERVER['PHP_AUTH_USER'];
    $pwd = $_SERVER['PHP_AUTH_PW'];
	//echo $usr."|".$pwd;die();


    if (DB::query_row("SELECT * FROM `user_tb` WHERE `email` = '".DB::escape($usr)."' AND `passwd` = '".DB::escape($pwd)."' && `status` = '2'")){
        $login_successful = true;
    }

}

if (!$login_successful){
 	header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    print "Login failed!n";
}
else {		
	
	
	$oMenu = new Menu();
	$oMenu->setMenuParent("Информация", '/admin/'.$_GET['region'].'/');
	
	$oMenu->setMenuParent("Пользователи", "/admin/".$_GET['region']."/Users/Show/", null);
	$oMenu->setMenuParent("Товары", "/admin/".$_GET['region']."/Product/Show/", null);
	$oMenu->setMenuParent("Категории", "/admin/".$_GET['region']."/Category/Show/", null);
	
	
	$parent_id = $oMenu->setMenuParent("Тех поддержка", "/admin/".$_GET['region']."/Support/Show/", null);
	
	$oBaseModule->oSmarty->assign("menu", $oMenu->getMenu());
	
	
	
	$oBaseModule->oSmarty->assign("TEXT", $CONTENT);
	echo $oBaseModule->oSmarty->fetch("Admin.tpl");
}





?>