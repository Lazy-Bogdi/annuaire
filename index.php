<?php 

    require_once 'connect.php';
    require 'classes/classStudent.php';
    require 'classes/classForm.php';
    require 'fonctions/fullWord.php';
    
    $db = Database::connect();
    $sql ="SELECT * FROM students";
    $query = $db->prepare($sql);
    $query->execute();
    $rows = $query->fetchAll();

    
    //var_dump(fullWord('p',3));die();

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

        <table id="studentList" class="table table-dark table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nom & Prénom</th>
                    <th>Niveau</th>
                    <th>Adresse email</th>
                    <th>Numéro de téléphone</th>
                    <th>Cursus visé</th>
                    <th>Année désirée</th>
                    <th colspan="3">Edition</th>
                </tr>
            </thead>
            <tbody>


    <?php
       
        foreach($rows as $row):
            $student = new Student($row['nom'], $row['prenom'], $row['interet'],  $row['niveau'], $row['email'], $row['tel'], $row['annee']);

    ?>
            
                <tr>
                    <td> <?= $student->nom . "&nbsp;" .$student->prenom; ?> </td>                    
                    <td> <?= fullWord($student->niveau,3); ?> </td>
                    <td> <?= $student->email; ?> </td>
                    <td> <?= $student->tel; ?> </td>
                    <td> <?= fullWord($student->interet, 1); ?> </td>
                    <td> <?= fullWord($student->annee, 2); ?> </td>

                    <td> 
                        <a class="btn" href= <?= "voir.php?id= '". $row['id'] ."' "  ?>>Voir</a>
                    </td>
                    <td> 
                        <a class="btn" href= <?= "modif.php?id= '". $row['id'] ."' "  ?>>Modifier</a>
                    </td>
                    <td> 
                        <a class="btn" href= <?= "supp.php?id= '". $row['id'] ."' "  ?>>Supprimer</a>
                    </td>
                </tr>            
    <?php 
        endforeach;
        Database::disconnect(); 
    ?>
            </tbody>
        </table>
    </body>
</html>
