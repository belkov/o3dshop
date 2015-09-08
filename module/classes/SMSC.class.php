<?

class SMSC {
	
	public static  $login = "kosmos36";
	public static $passwd = "11072009";
	
	public static function sendMessage($phone, $message){
		$client = new SoapClient('http://smsc.ru/sys/soap.php?wsdl');
		$ret = $client->send_sms(array('login'=> self::$login, 'psw'=> self::$passwd, 'phones'=>$phone, 'mes'=> $message, 'id'=>'', 'sender'=>'', 'time'=>0)); 		
		if(isset($ret->sendresult->error)){
			return array(false, $ret->sendresult->error);
		}else{
			return array(true, $ret->sendresult->id);
		}
	}
	 
	public static function getStatus($phone, $message_id){		
		$client = new SoapClient ('http://smsc.ru/sys/soap.php?wsdl');
		$ret = $client->get_status(array('login'=> $this->login, 'psw'=> $this->passwd, 'phone'=>$phone, 'id'=> $message_id, 'all'=>'0'));
		if($ret->statusresult->status == 1){
			return array(true);
		}else{
			return array(false, $ret->statusresult->status, $ret->statusresult->err);
		}
	}
	
}

?>