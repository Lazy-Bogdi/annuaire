<?php 

    require 'connect.php';
    require 'classes/classStudent.php';
    require 'classes/classForm.php';
    require 'fonctions/fullWord.php';
    



    $id = null;

    if (!empty($_GET['id'])) :
        $id = $_REQUEST['id'];
    endif;

    if ($id == null):
        header( "refresh:3;url=index.php" ); 

    else:

        $db = Database::connect();
        $sql = "SELECT * FROM students where id =?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        $row = $query->fetch();
        Database::disconnect();

        $viewStudent = new Student($row['nom'], $row['prenom'], $row['interet'],  $row['niveau'], $row['email'], $row['tel'], $row['annee']);

        $formulaire = new Form2;
        
        $formulaire->debutFormulaire('', '#', ['class' => 'form_view_student'])
    ->ajoutLabel('nom', 'Nom')
    ->ajoutInput('text', 'nom', ['class' => 'form-control', 'disabled' => 'disabled', 'value' => $viewStudent->nom])

    ->ajoutLabel('prenom', 'Prénom')
    ->ajoutInput('text', '', ['class' => 'form-control', 'disabled' => 'disabled', 'value' => $viewStudent->prenom])

    ->ajoutLabel('email', 'Adresse email')
    ->ajoutInput('email', '', ['class' => 'form-control', 'disabled' => 'disabled', 'value' => $viewStudent->email])

    ->ajoutLabel('tel', 'Numéro de téléphone')
    ->ajoutInput('tel', 'tel', ['class' => 'form-control', 'disabled' => 'disabled', 'pattern' =>'^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$', 'value' => $viewStudent->tel])

    ->ajoutLabel('niveau', 'Niveau / statut ?')
    ->ajoutInput('niveau', '', ['class' => 'form-control', 'disabled' => 'disabled', 'value' => $viewStudent->niveau])

    ->ajoutLabel('interet', 'Intéressé pour la filière')
    ->ajoutInput('interet', '', ['class' => 'form-control', 'disabled' => 'disabled', 'value' => fullWord($viewStudent->interet,1)])

    ->ajoutLabel('annee', 'Année d\'intérêt' )
    ->ajoutInput('annee', '', ['class' => 'form-control', 'disabled' => 'disabled', 'value' => fullWord($viewStudent->annee,2)])

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
            <h1> <?= $viewStudent->prenom . " " .$viewStudent->nom ?><span class="start_span_active">_</span></h1><br>
            <?php 
                $viewStudentForm = $formulaire->create();
                echo $viewStudentForm;
            ?>
        </div>  
        <script src="script.js"></script>
      
    </body>
    

</html>
