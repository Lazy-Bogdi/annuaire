<?php 

    require 'connect.php';
    require 'classes/ClassStudent.php';
    require 'classes/ClassForm.php';
    require 'fonctions/fullWord.php';
    



    $id = null;

    if (!empty($_GET['id'])) :
        $id = $_REQUEST['id'];
    endif;

    if ($id == null):
        header( "refresh:3;url=index.php" ); 

    else:

        
        $sql = "SELECT * FROM students where id =?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        $row = $query->fetch();
        

        $modifStudent = new Student($row['nom'], $row['prenom'], $row['interet'],  $row['niveau'], $row['email'], $row['tel'], $row['annee'],$row['date_naissance'], $row['ville'], $row['etab_scol']);

        $formulaire = new Form2;
        
        $formulaire->debutFormulaire('POST', 'send_form.php', ['id' => 'form_modif', 'class' => 'form_modif_student'])
        ->ajoutInput('hidden', 'form_modif', ['id' => 'nom', 'class' => 'form-control', 'value' =>'form_modif'])

        // ->ajoutLabel('idStudent', 'Id')
        ->ajoutInput('hidden', 'idStudent', ['id' => 'idStudent', 'class' => 'form-control', 'value' => $id])

        ->ajoutLabel('nom', 'Nom')
        ->ajoutInput('text', 'nom', ['id' => 'nom', 'class' => 'form-control', 'required' => 'required', 'value' => $modifStudent->nom])

        ->ajoutLabel('prenom', 'Prénom')
        ->ajoutInput('text', 'prenom', ['id' => 'prenom', 'class' => 'form-control', 'required' => 'required', 'value' => $modifStudent->prenom])

        ->ajoutLabel('email', 'Adresse email')
        ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control', 'required' => 'required', 'value' => $modifStudent->email])

        ->ajoutLabel('tel', 'Numéro de téléphone')
        ->ajoutInput('tel', 'tel', ['id' => 'tel', 'class' => 'form-control', 'required' => 'required', 'pattern' =>'^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$', 'value' => $modifStudent->tel])

        ->ajoutLabel('niveau', 'Quel est votre niveau / statut ?')
        ->ajoutSelect(
            'niveau', 
            ["p" =>'Seconde', "p" =>'Première', "t" =>'Terminale', "b" =>'Bac', "b1" =>'Bac +1', "b2" =>'Bac +2', "B3" =>'Bac +3', "b45" =>'Bac +4/+5', "p" =>'Parent'] ,
            ['id' => 'niveau', 'class' => 'form-control', 'required' => 'required', 'value' => $modifStudent->niveau])

        ->ajoutLabel('interet', 'Quelle filière vous intéresse le plus ?')
        ->ajoutSelect(
            'interet', 
            ['ComG' =>'Communication graphique', 'ComM' =>'Community Management', 'DevW' =>'Développement web', 'WebM' =>'Web Marketing'] ,
            ['id' => 'niveau', 'class' => 'form-control', 'required' => 'required', 'value' => $modifStudent->interet])

        ->ajoutLabel('annee', 'En quelle année souhaitez-vous intégrer la Normandie Web School?' )
        ->ajoutSelect(
            'annee', 
            ['A1' =>'Année 1 (Cursus de tronc commun)', 'A2' =>'Année 2', 'A3' =>'Année 3 (Année certifiante)'] ,
            ['id' => 'niveau', 'class' => 'form-control', 'required' => 'required', 'value' => $modifStudent->annee])

        ->ajoutBouton('Confirmer', ['class' => 'btn btn-primary', 'type'=>'submit'])
        ->ajoutLien('Retour à la lecture', ['class' => 'btn btn-success', 'href' => 'voir.php?id='.$id.''])
        ->finFormulaire();


    endif;

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
            <a class="btn btn-warning" href='index.php'>Retour à la liste des étudiants</a>
            <h1> <?= $modifStudent->prenom . " " .$modifStudent->nom ?></h1><br>
            <?php 
                $modifStudentForm = $formulaire->create();
                echo $modifStudentForm;
            ?>
            
        </div>  
        <script src="script.js"></script>
      
    </body>
    

</html>