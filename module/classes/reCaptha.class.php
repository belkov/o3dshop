<?

class reCaptha{
	
	private static $user = FALSE;
    private static $logged = FALSE;
	
	
	public static function Verify($response){
		$ch = curl_init();	
		curl_setopt($ch,CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($ch,CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_POSTFIELDS, "secret=6LfMjAsTAAAAAMFRoj7zS1Z1TizxWyKIKILR7yNv&response=".$response);	
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,20);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);		
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);	
		$result = curl_exec($ch);
		$json = json_decode($result, 1); 
		if($json['success'] == 1){
			return true;
		}
		return false;
	}
	
}

?>