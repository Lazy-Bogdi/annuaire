<?php 

    require 'classes/classStudent.php';
    require_once 'connect.php';



    // echo $student; die();

    if (!isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['niveau'], $_POST['interet'], $_POST['interet'], $_POST['annee'] )):

        echo "Erreur, données incomplètes"; die(); 

        
    elseif (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['niveau'], $_POST['interet'], $_POST['interet'], $_POST['annee'] )):

        
        // $nom = $_POST['nom'];
        // $prenom = $_POST['prenom'];
        // $interet = $_POST['interet'];
        // $niveau = $_POST['niveau'];
        // $email = $_POST['email'];
        // $tel = $_POST['tel'];
        // $annee = $_POST['annee'];

        $student = new Student($_POST['nom'], $_POST['prenom'],  $_POST['interet'], $_POST['niveau'], $_POST['email'], $_POST['tel'], $_POST['annee'] );
        // echo $student . "<br>";
    
?>



<?php
    $sql = "INSERT INTO students (nom, prenom, interet, niveau, email, tel, annee)
    VALUES ('$student->nom', '$student->prenom', '$student->interet', '$student->niveau','$student->email', '$student->tel', '$student->annee')";
    $query = $db->prepare($sql);
    $query->execute();
    header( "refresh:3;url=index.php" );
?>

<p> Les infos ont bien été enregistrées. (Redirection auto)  </p>

<?php  exit;

    
endif;



