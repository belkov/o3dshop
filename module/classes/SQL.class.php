<?

class SQLInjection{
	
	function __construct(){

	}
	
	function getStringHTML($input_text){
		$input_text = trim($input_text);
		$input_text = htmlspecialchars($input_text);
		return mysql_escape_string($input_text);
	}
	
	
}

?>