<?php

class Mail{

	
	
	public static function send($to, $subject, $content){
		$__smtp = array(
			"host" => "smtp.sxss.com.ua", //Я сюда вбиваю IP сервака
			"debug" => 0, //Отладка
			"auth" => true, //Авторизация в SMPT
			"port" => 25, // Какой порт
			"username" => "no-reply@sxss.com.ua", //Логин почты
			"password" => "oz7UQD1a", //Пароль на почту
			"addreply" => "no-reply@sxss.com.ua", //Какую почту подставлять в раздел "Ответить"
			"replyto" => ""
		);
		$mail = new PHPMailer(true);
		$mail->IsSMTP();
		try {
			$mail->CharSet = 'utf-8';
			$mail->Host = $__smtp['host'];
			$mail->SMTPDebug = $__smtp['debug'];
			$mail->SMTPAuth = $__smtp['auth'];
			$mail->Host = $__smtp['host'];
			$mail->Port = $__smtp['port'];
			$mail->Username = $__smtp['username'];
			$mail->Password = $__smtp['password'];
			$mail->AddReplyTo($__smtp['username'], "ClickPay24");
			$mail->AddAddress($to);
			$mail->SetFrom($__smtp['username'], "ClickPay24");
			$mail->AddReplyTo($__smtp['username'], "ClickPay24");
			$mail->Subject = htmlspecialchars($subject);
			$mail->MsgHTML($content);		
		  	$mail->Send();		 
		} catch (phpmailerException $e) {
		  
		} catch (Exception $e) {
		  
		}
	}
	
}


?>