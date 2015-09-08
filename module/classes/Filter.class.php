<?php

class Filter{

	function __construct(){

	}

	public static  function EmailConfirm($sValue){
		if (!eregi("^([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)$", $sValue) || $sValue == "")
			return false;
		return true;
	}
	
	public function Uri($sValue){
		if (!eregi("^([0-9a-z])*$", $sValue) || $sValue == "")
			return false;
		return true;
	}	
	
	public  function PasswordConfirm($sValue){
		if(mb_strlen($sValue) <6)
			return false;
		return true;
	}
	
	public  function RePasswordConfirm($sValue, $sValue2){
		if($sValue <> $sValue2)
			return false;
		return true;
	}	

	public function LoginConfirm($sValue){
		if(!eregi("^([0-9a-zA-Z]{5,20})$", $sValue) || $sValue=="")
			return false;
		return true;
	}
	
}


?>