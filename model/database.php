<?php
class Database {
    private static $dsn = "mysql:host=sql1.njit.edu;dbname=rvz2";
    private static $user = "rvz2";
    private static $pass = "gEQl8u0MT";
    private static $db;

    private function __construct(){}

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$user, self::$pass);
            }catch(PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p class='errorMessage'><span class='errorType'>Database error: </span><span class='errorDescription'>An error occurred while connecting to the database: $error_message</span></p>";
                exit();
            }
        }
        return self::$db;
    }
}