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
    ->ajoutInput('text', 'nom', ['class' => 'form-control', 'required' => 'required', 'value' => $viewStudent->nom])

    ->ajoutLabel('prenom', 'Prénom')
    ->ajoutInput('text', '', ['class' => 'form-control', 'required' => 'required', 'value' => $viewStudent->prenom])

    ->ajoutLabel('email', 'Adresse email')
    ->ajoutInput('email', '', ['class' => 'form-control', 'required' => 'required', 'value' => $viewStudent->email])

    ->ajoutLabel('tel', 'Numéro de téléphone')
    ->ajoutInput('tel', 'tel', ['class' => 'form-control', 'required' => 'required', 'pattern' =>'^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$', 'value' => $viewStudent->tel])

    ->ajoutLabel('niveau', 'Niveau / statut ?')
    ->ajoutInput('niveau', '', ['class' => 'form-control', 'required' => 'required', 'value' => $viewStudent->niveau])

    ->ajoutLabel('interet', 'Intéressé pour la filière')
    ->ajoutInput('interet', '', ['class' => 'form-control', 'required' => 'required', 'value' => fullWord($viewStudent->interet,1)])

    ->ajoutLabel('annee', 'Année d\'intérêt' )
    ->ajoutInput('annee', '', ['class' => 'form-control', 'required' => 'required', 'value' => fullWord($viewStudent->annee,2)])

    ->finFormulaire();


    endif;

?>