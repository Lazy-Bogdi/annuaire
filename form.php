<?php 


require 'classes/classForm.php';

$formulaire = new Formulaire('Roger');

$formulaire2 = new Form2;

$formulaire2->debutFormulaire('POST', 'send_form.php', ['id' => 'form_new_student'])
    ->ajoutLabel('nom', 'Nom')
    ->ajoutInput('text', 'nom', ['id' => 'nom', 'class' => 'form-control'])

    ->ajoutLabel('prenom', 'Prénom')
    ->ajoutInput('text', 'prenom', ['id' => 'prenom', 'class' => 'form-control'])

    ->ajoutLabel('email', 'Adresse email')
    ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])

    ->ajoutLabel('tel', 'Numéro de téléphone')
    ->ajoutInput('text', 'tel', ['id' => 'tel', 'class' => 'form-control'])

    ->ajoutLabel('niveau', 'Quel est votre niveau / statut ?')
    ->ajoutSelect(
        'niveau', 
        [0 =>'Seconde', 1 =>'Première', 2 =>'Terminale', 3 =>'Bac +1', 4 =>'Bac +2', 5 =>'Bac +3', 6 =>'Bac +4/+5', 7 =>'Parent'] ,
        ['id' => 'niveau', 'class' => 'form-control'])

    ->ajoutLabel('interet', 'Quelle filière vous intéresse le plus ?')
    ->ajoutSelect(
        'niveau', 
        [8 =>'Communication graphique', 9 =>'Community Management', 10 =>'Développement web', 11 =>'Web Marketing'] ,
        ['id' => 'niveau', 'class' => 'form-control'])

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

    <div id="container">

        <h1>Bonjour! Dites-en nous plus sur vous !<span class="start_span_active">_</span></h1><br>

        
        <?php 
            $formJPO = $formulaire2->create();
            print_r($formJPO);
        ?>

    </div>

    <script src="script.js"></script>

</body>

</html>