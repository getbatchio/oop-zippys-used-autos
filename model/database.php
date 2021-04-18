
<?php
class Database {
    private static $dsn = 'mysql:host=vkh7buea61avxg07.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=egnvidxep6ohl0mk';
    private static $username = 'a7rgpxgomi8vyu3o';
    private static $password = 'zn5gg89k1uuh7dx7';
    private static $db;

    private function __construct() {}

    public static function getDB() {
        if (!isset(self::$db)){
            try
            {
                self::$db = new PDO(self::$dsn,self::$username,self::$password);
            } catch (PDOException $e)
            {
                $error = "Database error: ";
                $error = $e -> getMessage();
                include('view/error.php');
                exit();
            }
        }
        return self::$db;
    }
}
