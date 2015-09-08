<?php

class Main extends BaseModule{
	
	function __construct(){
		parent::__construct();				
	}
	
	function getActive(){
		return "";
	} 
	
	function action(){
		echo $this->oSmarty
		
		->assign("count_partner", DB::query_row("SELECT COUNT(id) as count FROM `user_tb`"))
		->assign("count_product", DB::query_row("SELECT COUNT(id) as count FROM `product_tb`"))
		->assign("forSite", DB::query_row("SELECT SUM(forSite) as forSite FROM `statistics_tb`"))
		->fetch($_GET['region']."/Index.tpl");die();
	}
	
	function actionError(){
		header("HTTP/1.0 404 Not Found");		
		return $this->oSmarty->fetch($_GET['region']."/Body/404.tpl");
	}
	
	function actionInvite(){ 		
		if($user = DB::query_row("SELECT * FROM `user_tb` WHERE `id` = '".DB::escape($_GET['page'])."'")){			
			setcookie("ref_id", $user['id'], time()+2592000, "/", $this->domain);
		}
		$this->redirectTo("/registration/");
	}
	
	private $count = 10;
	
	function actionNews(){
		if(isset($_GET['all'])){
			DB::query("UPDATE `user_tb` SET `news` = '0' WHERE `id` = '".$_SESSION['session_id']."'");
			$this->redirectTo("/news/");
		}
		
		$limit = ($_GET['page']-1)*$this->count.", ".$this->count;		
		
		$news = DB::query_array("SELECT * FROM `news_tb` ORDER BY `id` DESC LIMIT ".$limit);
		
		
		$cpartners = DB::query_row("SELECT COUNT(id) as count FROM `news_tb` ");
		
		if(ceil($cpartners['count']/$this->count) > 1)
				$this->oSmarty->assign("pagination", $this->getNavigationIndex($cpartners['count'], $this->count, "/news/", $_GET['page'], 10)); 
		
		return $this->oSmarty
		->assign("news", $news)
		->fetch($_GET['region']."/Body/News.tpl");
	}
	
} 

?>