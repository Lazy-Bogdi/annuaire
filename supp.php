<?php
    require 'connect.php';
    require 'classes/classStudent.php';
    require 'classes/classForm.php';
    require 'fonctions/fullWord.php';

    $id = null;

    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ($id == null) {
        header( "refresh:3;url=index.php" ); 
    } else 
    {   $db = Database::connect();

        $sql = "SELECT * FROM students where id =?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        $row = $query->fetch();
        Database::disconnect();
        $suppStudent = new Student($row['nom'], $row['prenom'], $row['interet'],  $row['niveau'], $row['email'], $row['tel'], $row['annee']);

        $formulaire = new Form2;

        $formulaire->debutFormulaire('POST', 'send_form.php', ['class' => 'form_supp_student form-inline'])
        
        ->ajoutInput('hidden', 'form_supp', ['id' => 'nom', 'class' => 'form-control', 'value' =>'form_supp'])
    
    
        ->ajoutBouton('Confirmer', ['class' => 'btn btn-danger'])
        ->ajoutBouton('Annuler', ['class' => 'btn btn-success'])
    
        ->finFormulaire();
    }


    ?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Présentation</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Nunito&display=swap" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
                <h1> Supprimer le profil de <?= $suppStudent->prenom . " " .$suppStudent->nom ?> ? </h1><br>
                <?php 
                    $suppStudentForm = $formulaire->create();
                    echo $suppStudentForm;
                ?>
        </div> 
        
    </body>
</html>