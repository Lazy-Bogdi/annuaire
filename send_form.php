<?php 

if(!isset($_POST['nom'], $_POST['interet'], $_POST['niveau'], $_POST['prenom'], $_POST['email'], $_POST['tel'])):

    echo "Erreur, données incomplètes";

    
else:

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $interet = $_POST['interet'];
    $niveau = $_POST['niveau'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    
endif;