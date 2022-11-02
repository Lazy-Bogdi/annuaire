<?php 

##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
##TODO: AJOUTER AGE / GENRE##
require 'classes/ClassForm.php';

$formulaire2 = new Form2;

$formulaire2->debutFormulaire('POST', 'send_form.php', ['id' => 'add_form', 'class' => 'form_new_student'])
    ->ajoutInput('hidden', 'form_add', ['id' => 'nom', 'class' => 'form-control', 'value' =>'form_add'])

    ->ajoutLabel('nom', 'Nom')
    ->ajoutInput('text', 'nom', ['id' => 'nom', 'class' => 'form-control', 'required' => 'required'])

    ->ajoutLabel('prenom', 'Prénom')
    ->ajoutInput('text', 'prenom', ['id' => 'prenom', 'class' => 'form-control', 'required' => 'required'])

    ->ajoutLabel('date_naissance', 'Date de naissance')
    ->ajoutInput('date', 'date_naissance', ['id' => 'date_naissance', 'class' => 'form-control', 'required' => 'required'])

    ->ajoutLabel('ville', 'Ville de résidence')
    ->ajoutInput('text', 'ville', ['id' => 'ville', 'class' => 'form-control', 'required' => 'required'])


    ->ajoutLabel('email', 'Adresse email')
    ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control', 'required' => 'required'])

    ->ajoutLabel('tel', 'Numéro de téléphone')
    ->ajoutInput('tel', 'tel', ['id' => 'tel', 'class' => 'form-control', 'required' => 'required', 'pattern' =>'^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$'])

    ->ajoutLabel('etab_scol', 'Dernier établissement fréquenté')
    ->ajoutInput('text', 'etab_scol', ['id' => 'etab_scol', 'class' => 'form-control', 'required' => 'required'])

    ->ajoutLabel('niveau', 'Quel est votre niveau / statut ?')
    ->ajoutSelect(
        'niveau', 
        ["p" =>'Seconde', "p" =>'Première', "t" =>'Terminale', "b" =>'Bac', "b1" =>'Bac +1', "b2" =>'Bac +2', "B3" =>'Bac +3', "b45" =>'Bac +4/+5', "p" =>'Parent'] ,
        ['id' => 'niveau', 'class' => 'form-control', 'required' => 'required'])

    ->ajoutLabel('interet', 'Quelle filière vous intéresse le plus ?')
    ->ajoutSelect(
        'interet', 
        ['ComG' =>'Communication graphique', 'ComM' =>'Community Management', 'DevW' =>'Développement web', 'WebM' =>'Web Marketing'] ,
        ['id' => 'niveau', 'class' => 'form-control', 'required' => 'required'])

    ->ajoutLabel('annee', 'En quelle année souhaitez-vous intégrer la Normandie Web School?' )
    ->ajoutSelect(
        'annee', 
        ['A1' =>'Année 1 (Cursus de tronc commun)', 'A2' =>'Année 2', 'A3' =>'Année 3 (Année certifiante)'] ,
        ['id' => 'niveau', 'class' => 'form-control', 'required' => 'required'])

    ->ajoutBouton('Confirmer', ['class' => 'btn btn-primary'])
    ->finFormulaire();

    


// var_dump($formulaire2); die();
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

        <h1>Bonjour! Dites nous-en plus sur vous !<span class="start_span_active">_</span></h1><br>

        
        <?php 
            $formJPO = $formulaire2->create();
            echo $formJPO;
        ?>

    </div>

    <script src="script.js"></script>

</body>

</html>