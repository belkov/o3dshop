<?php


class BaseModule{

	public static $oSmarty = null;	
	public $oWorld = null;	
	public  $domain = null;			
	public  $email = null;
	public  $language_id = 0;			
	
	function __construct(){		
		$this->email = Config::$email;
		$this->domain = Config::$domain;
		$this->oSmarty = new Smarty();					
		$this->oSmarty->assign("domain", Config::$domain);
		DB::init();
	}
	
	public function init(&$oSmarty, $sPage = null){
		$this->oSmarty = $oSmarty;		
	}
	

	public function redirectTo($sUrl){
		header("Location: ".$sUrl);
		exit;
	}


	function generateHASH($number) { 
		$symbols="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
		$symbols_count=strlen($symbols); 
		$pass = null; 
		for($i = 0; $i < $number; $i++){
			$pass .= substr($symbols, rand (0,$symbols_count-1), 1); 
		}
		return $pass; 
	} 

	
//session

	public function getNavigation($iCntRecord, $iCntPage = 5, $sModule, $iPageNow = 1, $iPageMenu = 100){
		$sResult = null;		
		//vsego stranic
		$iCntPages = ceil($iCntRecord/$iCntPage);			
		//esli stranici net now = 0
		if($iPageNow > $iCntPages)
			$iPageNow = 1;	
		if($iCntPages < $iPageMenu)
			$iPageMenu = $iCntPages;		
		// coef 			
		$n = ceil($iPageMenu/2);
		
		if($iPageNow < $n){				
			$nLeft = 1;
			$nRight = $iPageMenu+1;
		}else if($iCntPages <= $iPageNow + $n){								
			$nRight = $iCntPages+1;
			$nLeft = $iPageNow-($iPageMenu-($iCntPages+1-$iPageNow));				
		}else{
			$nLeft = $iPageNow-$n+1;
			$nRight = $iPageNow+$n;				
		}

		$aPage = array();
		$aPage['PagePrev'] = $sModule."".($iPageNow-1);
		$aPage['PageNext'] = $sModule."".($iPageNow+1);
		$aPage['Module'] = $sModule;			
		$this->oSmarty->assign("PAGE", $aPage);
		if($iPageNow<>1)
			$this->oSmarty->assign("PREV", $this->oSmarty->fetch("Admin/Pagination/PrevPage.tpl"));
		if($iPageNow<>$iCntPages)
			$this->oSmarty->assign("NEXT", $this->oSmarty->fetch("Admin/Pagination/NextPage.tpl"));
			
		if($iPageMenu<$iCntPages)
			$iCntPages = $iPageMenu;
		
		for($i=$nLeft; $i < $nRight; $i++){
			$iPage = $i;
			$aPage = array();
			$aPage['Page'] = $iPage;
			if ($i == 1)
				$aPage['I'] = $sModule.$i;
			else
				$aPage['I'] = $sModule."".$i;	
			$this->oSmarty->assign("PAGE", $aPage);
			
			if($i==$iPageNow)
				$sResult .= $this->oSmarty->fetch("Admin/Pagination/ElemActive.tpl");
			else
				$sResult .= $this->oSmarty->fetch("Admin/Pagination/ElemNotActive.tpl");
		}				
		
		$this->oSmarty->assign("NAVIGATION", $sResult);		
		return $this->oSmarty->fetch("Admin/Pagination/Index.tpl");
	}

	
		
	public function getNavigationIndex($iCntRecord, $iCntPage = 5, $sModule, $iPageNow = 1, $iPageMenu = 100, $right=""){
		//init 
		$sResult = null;		
		//vsego stranic
		$iCntPages = ceil($iCntRecord/$iCntPage);			
		//esli stranici net now = 0
		if($iPageNow > $iCntPages)
			$iPageNow = 1;	
		if($iCntPages < $iPageMenu)
			$iPageMenu = $iCntPages;		
		// coef 			
		$n = ceil($iPageMenu/2);
		
		if($iPageNow < $n){				
			$nLeft = 1;
			$nRight = $iPageMenu+1;
		}else if($iCntPages <= $iPageNow + $n){								
			$nRight = $iCntPages+1;
			$nLeft = $iPageNow-($iPageMenu-($iCntPages+1-$iPageNow));				
		}else{
			$nLeft = $iPageNow-$n+1;
			$nRight = $iPageNow+$n;				
		}

		$aPage = array();

		$aPage['PagePrev'] = $sModule."".($iPageNow-1)."".$right;
		$aPage['PageNext'] = $sModule."".($iPageNow+1)."".$right;
		$aPage['Module'] = $sModule;			
		$this->oSmarty->assign("PAGE", $aPage);
		if($iPageNow<>1)
			$this->oSmarty->assign("PREV", $this->oSmarty->fetch("Pagination/PrevPage.tpl"));
		if($iPageNow<>$iCntPages)
			$this->oSmarty->assign("NEXT", $this->oSmarty->fetch("Pagination/NextPage.tpl"));
			
		if($iPageMenu<$iCntPages)
			$iCntPages = $iPageMenu;
		for($i=$nLeft; $i < $nRight; $i++){
			$iPage = $i;
			$aPage = array();
			$aPage['Page'] = $iPage;
			if ($i == 1)
				$aPage['I'] = $sModule.$right;
			else
				$aPage['I'] = $sModule."".$i."".$right;			
			$this->oSmarty->assign("PAGE", $aPage);
			
			if($i==$iPageNow)
				$sResult .= $this->oSmarty->fetch("Pagination/ElemActive.tpl");
			else
				$sResult .= $this->oSmarty->fetch("Pagination/ElemNotActive.tpl");
		}				
		
		$this->oSmarty->assign("NAVIGATION", $sResult);		
		return $this->oSmarty->fetch("Pagination/Index.tpl");
	}
	
	function rus2translit($string){
		$string = trim($string);
		$converter = array(
        	'а' => 'a',   'б' => 'b',   'в' => 'v',
        	'г' => 'g',   'д' => 'd',   'е' => 'e',
        	'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
	        'и' => 'i',   'й' => 'y',   'к' => 'k',
	        'л' => 'l',   'м' => 'm',   'н' => 'n',
	        'о' => 'o',   'п' => 'p',   'р' => 'r',
	        'с' => 's',   'т' => 't',   'у' => 'u',
	        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
	        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
	        'ь' => "",  'ы' => 'y',   'ъ' => "",
	        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
	 
	        'А' => 'A',   'Б' => 'B',   'В' => 'V',
	        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
	        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
	        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
	        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
	        'О' => 'O',   'П' => 'P',   'Р' => 'R',
	        'С' => 'S',   'Т' => 'T',   'У' => 'U',
	        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
	        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
	        'Ь' => "",  'Ы' => 'Y',   'Ъ' => "",
	        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
	        ' ' => '-'
    	);
    	return preg_replace('|[^a-z0-9-]+|siUS', '', strtolower(strtr($string, $converter) ));
	}
	
	public function setActive($active){
		$this->oSmarty->assign("active", $active);
	}
  
}

?>