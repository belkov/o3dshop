<?

class Auth{
	
	private static $user = FALSE;
    private static $logged = FALSE;
	
	public static function init(){	
		if ( isset($_SESSION['session_id'])){
		    $session = DB::query_row("SELECT * FROM `user_tb` WHERE `id` = '{$_SESSION['session_id']}'");
		}elseif(isset($_COOKIE['email']) && isset($_COOKIE['passwd'])){
			$passwd = base64_decode(mb_substr(base64_decode($_COOKIE['passwd']), 0, 3).mb_substr(base64_decode($_COOKIE['passwd']), 5));
			$email = $_COOKIE['email'];			
			if($session = DB::query_row("SELECT * FROM `user_tb` WHERE `email` = '{$email}' && `passwd` = '{$passwd}'")){				
				$_SESSION['session_id'] = $session['id'];	
				$session['id'] = $session['id'];
			}
		}
		
		
		if ( isset($session['id']) ){
		    self::$user = DB::query_row("SELECT * FROM `user_tb` WHERE `id` = '{$_SESSION['session_id']}'");		    
		    
		    DB::query("INSERT INTO `online_tb` (`user_id`, `date`) 
		    VALUES(
		    '".$_SESSION['session_id']."',
		    NOW()
		    )ON DUPLICATE KEY UPDATE `date` = NOW();
		    ");
		    self::$logged = TRUE;
		}else{
			self::$logged = FALSE;
		}
	} 

	public static function getUser($param=''){ 				
        if(!self::$logged)
            return FALSE;
        if(!empty($param))
            return self::$user[$param];
        else
            return self::$user;
    }
	
	public static function isLogin(){
		if(self::$logged){
			return $_SESSION['session_id'];
		}else{
			return false;
		}
	}
	
	public static function isLoginData(){
		if(isset($_SESSION['session_id']) && $_SESSION['session_id'] != -1){
			$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `user_tb` WHERE `id` = '".$_SESSION['session_id']."'"));
			return $user;
		}else{
			return false;
		}
	}
	
	public static function logout(){
        if ($_SESSION['session_id']){
			unset($_SESSION['session_id']);
        }
    }
	
    public static function authorized($email, $password)
    {        
        self::$user = DB::query_row('SELECT * FROM `user_tb` WHERE `email`="'.mysqli_real_escape_string(DB::$desc, $email).'" && `passwd` = "'.mysqli_real_escape_string(DB::$desc, $password).'" ');
        if(!self::$user)
            return FALSE;
        if(self::$user['isactive'] == 1)
            return FALSE;
       	$_SESSION['session_id'] = self::$user['id'];
        return TRUE;
    }
}

?>