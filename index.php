<?php 

    require_once 'connect.php';
    require 'classes/ClassStudent.php';
    require 'classes/ClassForm.php';
    require 'classes/UrlMaker.php';
    require 'classes/TriTable.php';
    require 'fonctions/fullWord.php';
    define('PAR_PAGE', 10); //Constante pour nombre de résultats par page
     
    $db = Database::connect();
    $sql ="SELECT * FROM students"; //Requete de base
    $queryCount = "SELECT COUNT(*) AS count FROM students"; //Comptage des requetes
    $params = []; //Clauses des requêtes
    $triable = ["id",  "nom", "prenom", "interet", "niveau", "email", "tel", "annee"];

//Recherche par nom/prénom
    if (!empty($_GET['form_search'])){
        $sql .= " WHERE nom LIKE :nom or prenom LIKE :nom";
        $queryCount .= " WHERE nom LIKE :nom or prenom LIKE :nom";
        $params['nom'] = '%' . $_GET['form_search'] . '%';
    }

//Tri des données
if(!empty($_GET['tri']) && in_array($_GET['tri'], $triable)) {
    $direction = $_GET['dir'] ?? 'asc';
    if(!in_array($direction, ['asc', 'desc'])) {
        $direction = 'asc';
    }
    $sql .= " ORDER BY " . $_GET['tri'] . " $direction";

}



//Pages du tableau
    $page = (int)($_GET['p'] ?? 1);
    $offset = ($page-1) * PAR_PAGE;


    $sql .= " LIMIT " . PAR_PAGE . " OFFSET $offset";

    $query = $db->prepare($sql);
    $query->execute($params);
    $rows = $query->fetchAll();

    $query = $db->prepare($queryCount);
    $query->execute($params);
    $count = $query->fetch()['count']; 
    $pages = ceil($count / PAR_PAGE);


    Database::disconnect(); 
//    var_dump( $pages, $count);die();

    $currYear = (new DateTime)->format("Y");

    
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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">

    <form method='GET' class='form_search' action="">
        <!-- condition isset dans le champ search avec ?? -->
        <input id="form_search" type="text" name="form_search"  placeholder="Rechercher un contact" class="form-control" value="<?= htmlentities($_GET['form_search'] ?? null)  ?>"> 

        <br>
        <button class='btn btn-success' type='submit'>Rechercher</button>

</form>
        <div class="table-responsive">

            <h1>Potentiels élèves pour la rentrée <?= $currYear+1 . '-' . $currYear+2?></h1><br>
            <table id="studentList" class="table table-dark table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?= TriTable::tri('id','ID', $_GET)?></th>
                        <th><?= TriTable::tri('prenom','Prénom', $_GET) . ' & ' .TriTable::tri('nom','Nom', $_GET) ?></th>
                        <th><?= TriTable::tri('niveau','Niveau', $_GET)?></th>
                        <th><?= TriTable::tri('email','Adresse email', $_GET)?></th>
                        <th><?= TriTable::tri('tel','Numéro de téléphone', $_GET)?></th>
                        <th><?= TriTable::tri('interet','Cursus visé', $_GET)?></th>
                        <th> <?= TriTable::tri('annee','Année désirée', $_GET)?></th>
                        <th colspan="3">Edition</th>
                    </tr>
                </thead>
                <tbody>


        <?php
        
            foreach($rows as $row):
                $student = new Student($row['nom'], $row['prenom'], $row['interet'],  $row['niveau'], $row['email'], $row['tel'], $row['annee']);

        ?>
                
                    <tr>
                        <td> <?= $row['id'] ?></td>
                        <td> <?= $student->nom . "&nbsp;" .$student->prenom; ?> </td>                    
                        <td> <?= fullWord($student->niveau,3); ?> </td>
                        <td> <?= $student->email; ?> </td>
                        <td> <?= $student->tel; ?> </td>
                        <td> <?= fullWord($student->interet, 1); ?> </td>
                        <td> <?= fullWord($student->annee, 2); ?> </td>

                        <td> 
                            <a class="btn btn-outline-light" href= "<?= "voir.php?id=". $row['id'].'"'  ?>"  ?> Voir</a>
                        </td>
                        <td> 
                            <a class="btn btn-success" href= "<?= "modif.php?id=". $row['id'].'"'  ?>"  ?> Modifier</a>
                        </td>
                        <td> 
                            <a class="btn btn-danger" href= "<?= "supp.php?id=". $row['id'].'"'  ?>" >Supprimer</a>
                        </td>
                    </tr>            
        <?php 
            endforeach;
        ?>
                </tbody>
            </table>
            <?php if($pages > 1 && $page > 1): ?>
                <a href="?<?= UrlMaker::avecParams($_GET,'p', $page - 1)?>" class='btn btn-primary'>< Page précedente </a>
                <?php endif; ?>
            <?php if($pages > 1 && $page < $pages ): ?>
                <a href="?<?= UrlMaker::avecParams($_GET,'p', $page + 1)?>" class='btn btn-primary'>Page suivante ></a>
                <?php endif; ?>
        </div>
    </div>
    </body>
</html>
