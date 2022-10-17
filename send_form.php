<?php 

require 'classes/classForm.php';


if (!isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['niveau'], $_POST['interet'], $_POST['interet'], $_POST['annee'] )):

    echo "Erreur, données incomplètes"; die();

    
elseif (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['niveau'], $_POST['interet'], $_POST['interet'], $_POST['annee'] )):

    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $interet = $_POST['interet'];
    $niveau = $_POST['niveau'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    var_dump($nom); die;

endif;



