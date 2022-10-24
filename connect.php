<?php


class Database
{
    private static $dbName = "annuaire";
    private static $dbHost = "localhost";
    private static $dbUsername = "root";
    private static $dbUserPassword = "";
    private static $etat = null;

    public function __construct()
    {
        die("");
    }
    public static function connect()
    {
        if (self::$etat == null):
            try {
                self::$etat = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        endif;
        return self::$etat;
    }
    public static function disconnect()
    {
        self::$etat = null;
    }
}



// try{
//     $db = new PDO ('mysql:host=localhost;dbname=annuaire', 'root', '');

// } catch (PDOException $e) {
//     echo  'Erreur' . $e -> getMessage();
//     die();
// }

?>

