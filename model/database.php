<?php

   
class Database{
   
    private static $url;
    private static $dbparts;
 
    private static $username;
    private static $password;
    private static $database;
    private static $db;
    private static $dsn;
    private static $dsnsql;
    


    public function __construct(){
     self::$url = getenv('JAWSDB_URL');
     self::$dbparts = parse_url($url);
     self::$dsn = $dbparts['host'];
     self::$username = $dbparts['user'];
     self::$password = $dbparts['pass'];
     self::$database = ltirm($dbparts['path'],'/');
     self::$dsnsql = 'mysql:host='.$dsn.';dbname='.$database ;

    }
    public static function getDB(){
        
      if (!isset(self::$db)){
                try {
                    self::$db = new PDO(self::$dsnsql,self::$username,self::$password);
   
                } catch (PDOException $e) {
                    $error =$e->getMessage();
                    include('view/error.php');
                    exit();
                } 
            }
    return self::$db;
}

   
}

$database = new Database();

   


   
