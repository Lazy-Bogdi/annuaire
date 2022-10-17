<?php 


require 'classes/classForm.php';

    


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