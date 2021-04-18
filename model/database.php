<?php
class Database {
    private static $host;
    private static $dbname;
    private static $username;
    private static $password;
    private static $dsn;
    private static $db;

    public function __construct(){
        self::$host = getenv('SQL_HOST') ;
        self::$dbname = getenv('SQL_DB') ;
        self::$username = getenv('SQL_USER') ;
        self::$password = getenv('SQL_PW') ;
        self::$dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbname;
    }

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                    self::$username,
                                    self::$password);
            } catch (PDOException $e) {
                $error_message = 'Database Error: ';
                $error_message .= $e->getMessage();
                include('view/error.php');
                exit();
            }
        }
        return self::$db;
    }
}
$database = new Database();

   


   
