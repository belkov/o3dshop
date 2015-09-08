<?php

//config files

class Config{

public static $MYSQL_HOST = "localhost";
public static $MYSQL_USER = "clickpay";
public static $MYSQL_PASS = "clickpay";
public static $DATABASE = "clickpay";
public static $email = "belkov.n@gmail.com";
public static $domain = "clickpay24.ru";
public static $domain_pays = "http://clickpay24.ru/";
public static $encoding = "UTF8";
public static $reff = "5";
public static $ik_co_id = "55d444a93b1eafee408b4568";
public static $ik_key = "E0ESXaLt03SeLiBD";
public static $min_pay = 300;

public static $persent = "16";
 
	public static function userAmount($user_id){
		$amount = 0;
		
		$row = DB::query_row("SELECT SUM(uamount) as amount FROM `order_tb` WHERE `user_id` = '".$user_id."' && `pay_user` = '0' && `status` = '1'");
		$amount += $row['amount'];
		$row = DB::query_row("SELECT SUM(oamount) as amount FROM `order_tb` WHERE `owner_id` = '".$user_id."' && `pay_owner` = '0' && `status` = '1'");
		$amount += $row['amount'];
		$row = DB::query_row("SELECT SUM(ref_amount) as amount FROM `order_tb` WHERE `ref_id` = '".$user_id."' && `pay_ref` = '0' && `status` = '1'");
		$amount += $row['amount'];
		return round($amount, 2);
	}

}
 
?>