<?php 


require 'classes/classForm.php';

$formulaire = new Formulaire('Roger');

$formulaire2 = new Form2;

$formulaire2->debutFormulaire()
    ->ajoutLabel('email', 'Email')
    ->ajoutInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])
    ->ajoutLabel('password', 'Mot de passe')
    ->ajoutInput('password', 'password', ['id' => 'password', 'class' => 'form-control'])
    ->ajoutBouton('Me connecter', ['class' => 'btn btn-primary'])
    ->finFormulaire();

    


// var_dump($formulaire); die();
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

        <form method="POST" id="form_new_student" action="send_form.php">

            <div class="form-group w-50">
                <label for="nom">Nom</label>       
                        
                <?= $formulaire->input('nom'); ?>
            </div>
            
            <div class="form-group w-50">
                <label for="prenom">Prénom</label>       
                        
                <?= $formulaire->input('prenom'); ?>
            </div>
            
            <div class="form-group w-50">
                <label for="email">Adresse email</label>       
                        
                <?= $formulaire->input('email'); ?>
            </div>

            <div class="form-group w-50">
                <label for="tel">Numéro de téléphone</label>       
                        
                <?= $formulaire->input('tel'); ?>
            </div>

            <div class="form-group w-50">
                <label for="niveau">Quel est votre niveau / statut</label>       
                        
                <?= $formulaire->select('niveau'); ?>
            </div>

            <div class="form-group w-50">
                <label for="niveau">Quel est votre niveau / statut</label>       
                        
                <?= $formulaire->select('niveau'); ?>
            </div>
            <br>

            <?= $formulaire->submit('niveau'); ?>

            

        </form>
        
        <?php 
            $formJPO = ['formJPO' => $formulaire2->create()];
            print_r($formJPO);
        ?>

    </div>

</body>

</html>