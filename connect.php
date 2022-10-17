<?php

try{
    $db = new PDO ('mysql:host=localhost;dbname=annuaire', 'root', '');

} catch (PDOException $e) {
    echo  'Erreur' . $e -> getMessage();
    die();
}

?>