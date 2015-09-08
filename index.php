<?php
session_start();
set_time_limit(0);
if($_GET['p1'] == "/order/export/"){
	ini_set('display_errors', 0);
}else{
	ini_set('display_errors', 1);
}
?>
<?php
//module

require_once("module/config.php");

require_once("lib/smarty/Smarty.class.php");
require_once("lib/phpmailer/class.phpmailer.php");

require_once("module/classes/BaseModule.class.php");
require_once("module/classes/DB.class.php");
require_once("module/classes/URI.class.php");
require_once("module/classes/Mail.class.php");
require_once("module/classes/Filter.class.php");
require_once("module/classes/SQL.class.php");
require_once("module/classes/reCaptha.class.php");
require_once("module/classes/Error.class.php");
require_once("module/classes/Auth.class.php");
require_once("module/classes/SMSC.class.php");
require_once("module/classes/Online.class.php");


$plugin = glob("module/classes/frontend/*.php"); 

foreach($plugin as $name) 
{ 
	include $name; 
}  
	
$oBaseModule = new BaseModule();	




/*
$user = file("user.txt");
$products = DB::query_array("SELECT * FROM `product_tb` ");
$currency = DB::query_array("SELECT * FROM `currency_tb` ");
$date = date("Y-m-d", time()-60*60*24*30);
for ($i = 0; $i <= 30; $i++){
	$now = date("Y-m-d ".rand(0,23).":".rand(0,59).":s", strtotime($date)+60*60*24*$i+3600*rand(0,10));
	$users = DB::query_array("SELECT * FROM `user_tb` ");
	
	for ($z = 0;$z< rand(6000, 12000);$z++){		
		$rand = rand(0, count($users)-1);
		$user_id = $users[$rand]['id'];
		$ref_id = $users[$rand]['ref_id'];
		
		$product_id = $products[rand(0, count($products)-1)]['id'];
		$product = DB::query_row("SELECT * FROM `product_tb` WHERE `id` = '".$product_id."'");
		DB::query("INSERT INTO `statistics_tb` (`date`, `user_id`, `product_id`, `forSite`)
		VALUES(
		'".$now."',
		'".$user_id."',
		'".$product_id."',
		'1'
		)ON DUPLICATE KEY UPDATE `forSite` = forSite+1;
		");			
		if(rand(0, 3) == 0){
			DB::query("INSERT INTO `statistics_tb` (`date`, `user_id`, `product_id`, `forPayment`)
			VALUES(	
			'".$now."',
			'".$user_id."',
			'".$product_id."',
			'1'
			)ON DUPLICATE KEY UPDATE `forPayment` = forPayment+1;
			");		
			if(rand(0, 5) == 0){
				DB::query("INSERT INTO `statistics_tb` (`date`, `user_id`, `product_id`, `orderCreate`)
				VALUES(
				'".$now."',
				'".$user_id."',
				'".$product_id."',
				'1'
				)ON DUPLICATE KEY UPDATE `orderCreate` = orderCreate+1;
				");	
				list($fio, $phone, $email) = explode('|', $user[rand(0, count($user))]);
				
				$ref_amount = 0;
				if($ref_id != 0){
					$ref_amount = round(($product['price']/100)*Config::$reff);					
				} 
				
				if($user_id == $product['user_id']){ 
					$uamount = $product['price'];							
					$owner_id = 0;
					$oamount = 0;								
				}else{
					$owner_id = $product['user_id'];
					$oamount = $product['price']-($product['price']/100)*$product['persent'];
					$uamount = ($product['price']/100)*$product['persent'];							
				}
				$pamount = $product['price_val']-$product['price']-$ref_amount;			
				
				DB::query("INSERT INTO `order_tb` 
				(
				`date_add`, `init`, `product_id`, `currency_id`, `user_id`, `uamount`, 
				`owner_id`, `oamount`, `pamount`, `fio`, `email`, `phone`, `ref_id`, `ref_amount`)
				VALUES(
				'".$now."',
				'1',
				'".$product_id."',
				'".$currency[rand(0, count($currency)-1)]['id']."',
				'".$user_id."',
				'".$uamount."',
				'".$owner_id."',
				'".$oamount."',
				'".$pamount."',
				'".$fio."',
				'".$email."',
				'".$phone."',
				'".$ref_id."',
				'".$ref_amount."'
				);
				");
				
				$last_id = DB::last_inserted_id();
				if(rand(0, 11) == 0){
					DB::query("UPDATE `order_tb` SET `status` = '1' WHERE `id` = '".$last_id."'");
					if($user_id == $product['user_id']){
						$earningsOwner = $product['price'];
						$earningsPartner = 0;
					}else{
						$earningsOwner = $product['price']-($product['price']/100)*$product['persent'];
						$earningsPartner = ($product['price']/100)*$product['persent'];
					}

					DB::query("INSERT INTO `statistics_tb` (`date`, `user_id`, `product_id`, `earningsOwner`, `earningsPartner`, `orderPay`, `earningsPP`, `earningsReff`)
					VALUES(
					'".$now."',
					'".$user_id."',
					'".$product_id."',
					'".$earningsOwner."',
					'".$earningsPartner."',
					'1',
					'".$pamount."',
					'".$ref_amount."'
					)ON DUPLICATE KEY UPDATE `earningsReff` = earningsReff+".$ref_amount.", `earningsOwner` = earningsOwner+".$earningsOwner.", `earningsPartner` = earningsPartner+".$earningsPartner.", `earningsPP` = earningsPP+".$pamount.", `orderPay` = orderPay+1;
					");	
				}
			}		
		}
		
	}
}

die();
*/


$menu = DB::query_row("SELECT * FROM `menu_tb` WHERE `uri` = '".DB::escape($_GET['p1'])."'");
if($page = DB::query_row("SELECT * FROM `page_tb` WHERE `uri` = '".DB::escape($_GET['p1'])."'")){
	$menu['class'] = "Page";
	$menu['method'] = "";
}

Auth::init();
if(Auth::isLogin()){
	 $oBaseModule->oSmarty->assign("user", Auth::getUser());
}


if(!isset($menu['class'])){
	$oBaseModule->redirectTo("/404/");
}

$oProcess = new $menu['class'];	

$action = ($menu['method'] == "")?"action":"action".$menu['method'];

call_user_func(array($oProcess, "init"), &$oBaseModule->oSmarty);	

$CONTENT =  call_user_func(array($oProcess, $action));

//echo $_SERVER['HTTP_ACCEPT'];die();

if(mb_strpos($_SERVER['HTTP_ACCEPT'], "json")){
	echo json_encode(array('result' => $CONTENT));die();
}else{
	if($CONTENT == null){
		$oBaseModule->redirectTo("/404/");
	}
	
	$oBaseModule->oSmarty->assign("text", $CONTENT);	
	
	header('Content-type: text/html; charset=utf-8');
	header("HTTP/1.1 200 OK", TRUE, 200);
	
	if(isset($_SESSION['session_id']) && is_file("i/profile/".$_SESSION['session_id'].".jpg")){
		$oBaseModule->oSmarty->assign("photo_profile", "/i/profile/".$_SESSION['session_id'].".jpg");
	}
	
	$active = call_user_func(array($oProcess, "getActive"), &$oBaseModule->oSmarty);
	$oBaseModule->oSmarty->assign("active", $active);
	if(isset($_SESSION['session_id']) && $_SESSION['session_id'] != ''){		
		
		echo $oBaseModule->oSmarty->assign("user_amount", number_format(Config::userAmount($_SESSION['session_id']), 0, ',', ' '))
		
		->assign("count_message", DB::query_row("SELECT COUNT(id) as count FROM `pmessage_tb` WHERE `status` = '1' && `user_id` = '".$_SESSION['session_id']."'"))
		->assign("count_news", Auth::getUser("news"))
		->fetch($_GET['region']."/IndexFrontend.tpl");
	}else{
		
		echo $oBaseModule->oSmarty
		
		->fetch($_GET['region']."/IndexAuth.tpl");
	}
}
 
 
?>
