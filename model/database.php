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
     self::$dbparts = parse_url(self::$url);
     self::$dsn = self::$dbparts['host'];
     self::$username = self::$dbparts['user'];
     self::$password = self::$dbparts['pass'];
     self::$database = ltirm(self::$dbparts['path'],'/');
     self::$dsnsql = 'mysql:host=' . self::$dsn . ';dbname=' . self::$database ;

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


   


   
