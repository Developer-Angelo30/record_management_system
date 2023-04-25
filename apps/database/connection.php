<?php

class DB{

    private static $server = "localhost";
    private static $user = "root";
    private static $pass = "";
    private static  $dbname = "record_management";

    public static function DBconnection(){
        $con = new mysqli(self::$server , self::$user, self::$pass , self::$dbname);

        return (!$con)? die("Connection failed"): $con;
    }

    public static function DBclose(){
        return self::DBconnection()->close();
    }

}

?>