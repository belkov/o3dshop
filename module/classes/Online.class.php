<?

class Online{
	
	public static function getStatusUser($user_id){
		
		if(DB::query_row("SELECT * FROM `online_tb` WHERE `user_id` = '".$user_id."' && `date` >= '".date("Y-m-d H:i:s", time()-60*10)."'")){
			return true;
		}
		return false;
	} 
	
}

?>