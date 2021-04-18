<?php

   
class Database{
    private static $url;
    private static $dbparts;
  
    private static $hostname;
    private static $username;
    private static $password;
    private static $db;
    


    
    


    public function __construct(){
     self::$url = getenv('JAWSDB_URL');
     self::$dbparts = parse_url($url);
     self::$dsn = $dbparts['host'];
     self::$username = $dbparts['user'];
     self::$password = $dbparts['pass'];
     self::$database = ltirm($dbparts['path'],'/');

    }
    public static function getDB(){
        
      if (!isset(self::$db)){
                try {
                    self::$db = new PDO("mysql:host=".self::$hostname.";dbname=".self::$database,self::$username,self::$password);
                    
                } catch (PDOException $e) {
                    $error =$e->getMessage();
                    include('view/error.php');
                    exit();
                } 
            }
    return self::$db;
}

   
}

   


   
