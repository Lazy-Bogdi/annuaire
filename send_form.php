<?php 

if(!isset($_POST['nom'], $_POST['interet'], $_POST['niveau'], $_POST['prenom'], $_POST['email'], $_POST['tel'])):

    echo "Erreur, données incomplètes";

    
elseif(isset($_POST['nom'], $_POST['interet'], $_POST['niveau'], $_POST['prenom'], $_POST['email'], $_POST['tel'])):

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $interet = $_POST['interet'];
    $niveau = $_POST['niveau'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    var_dump($nom); die;

endif;