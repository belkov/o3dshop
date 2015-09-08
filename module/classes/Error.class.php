<?


class Error{
	
	public static $error = array();

	public static function addError($text){
		self::$error[] = $text;
	}
	
	public static function returnError(){		
		if(count(self::$error) == 0){
			return false;
		}else{
			return self::$error;
		}
	}
	
}


?>