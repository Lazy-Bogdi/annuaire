<?php


$raw_db_data = file_get_contents('config.json');
$db_data = json_decode($raw_db_data);

$dbName= $db_data->dbName;
$dbHost= $db_data->dbHost;
$dbUsername= $db_data->dbUsername;
$dbUserPassword= $db_data->dbUserPassword;


 
try{
    $db = new PDO("mysql:host=" . $dbHost . ";" . "dbname=" . $dbName, $dbUsername, $dbUserPassword);
} catch (PDOException $e) {
    echo  'Erreur' . $e -> getMessage();
    die();
}

?>

