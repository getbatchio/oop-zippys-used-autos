<?php

   
class Database{
  
    private static $dsn = $dbparts['host'];
    private static $username = $dbparts['user'];
    private static $password = $dbparts['pass'];
    private static $db;


    
    


    public function __construct(){
     
    }
    public static function getDB(){
        
      if (!isset(self::$db)){
                try {
                    self::$db = new PDO(self::$dsn,self::$username,self::$password);
                    //echo 'connection good';
                } catch (PDOException $e) {
                    $error =$e->getMessage();
                    include('view/error.php');
                    exit();
                } 
            }
    return self::$db;
}

   
}

   
