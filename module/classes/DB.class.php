<?php
/**
 * Created by PhpStorm.
 * User: dmitriy.zhura@gmail.com
 * Date: 11.02.2015
 * Time: 17:17
 */

class DB {
    public static $desc = false;
    private static $host = 'localhost';
    private static $user = 'clickpay';
    private static $password = 'clickpay';
    private static $db_name = 'clickpay';
    private static $charset = 'UTF8';

    public static function init(){
    	self::$host = Config::$MYSQL_HOST;
    	self::$user = Config::$MYSQL_USER;
    	self::$password = Config::$MYSQL_PASS;
    	self::$db_name = Config::$DATABASE;
    	
        self::$desc = mysqli_connect(self::$host, self::$user, self::$password, self::$db_name)
        or die("Unable to connect to MySQL");
        mysqli_set_charset ( self::$desc , self::$charset );
    }

    public static function query($query){
        if (!$query)
            return false;              
        $rez = mysqli_query(self::$desc, $query) or trigger_error("Query Failed! SQL Error: ".mysqli_error(self::$desc), E_USER_ERROR);
        return $rez;
    }

    public static function last_inserted_id(){
        return mysqli_insert_id(self::$desc);
    }

    public static function query_array($query){
        $rows = array();
        $query_res = self::query($query);
        while($row = mysqli_fetch_assoc($query_res)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public static function query_row($query){
        $query_res = self::query($query);
        $row = mysqli_fetch_assoc($query_res);
        return $row;
    }

    public static function escape($str){
        return mysqli_real_escape_string( self::$desc, $str);
    }

}