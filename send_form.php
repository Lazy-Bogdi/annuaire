<?php 

    require 'classes/ClassStudent.php';
    require 'connect.php';
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);



    // echo $student; die();       
        

    if($_POST['form_add'] ==  'form_add'):

        if (!isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['niveau'], $_POST['interet'], $_POST['interet'], $_POST['annee'], $_POST['date_naissance'], $_POST['ville'] , $_POST['etab_scol'])):

            echo "Erreur dans la complétion des données";
            
        elseif (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['niveau'], $_POST['interet'], $_POST['interet'], $_POST['annee'], $_POST['date_naissance'], $_POST['ville'] , $_POST['etab_scol'])):

            $student = new Student($_POST['nom'], $_POST['prenom'],  $_POST['interet'], $_POST['niveau'], $_POST['email'], $_POST['tel'], $_POST['annee'],$_POST['date_naissance'], $_POST['ville'], $_POST['etab_scol'] );
            // echo $student . "<br>";


            
            $sql = "INSERT INTO students (nom, prenom, interet, niveau, email, tel, annee, date_naissance, ville, etab_scol)
            VALUES ('$student->nom', '$student->prenom', '$student->interet', '$student->niveau','$student->email', '$student->tel', '$student->annee', '$student->birthDate', '$student->ville', '$student->school')";
            $query = $db->prepare($sql);
            $query->execute(); 
            header( "refresh:3;url=index.php" );
?>

            <p> Les infos ont bien été enregistrées. (Redirection auto)  </p>

<?php  

             exit;
        endif;

    elseif($_POST['form_modif'] == 'form_modif'):

        if (!isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['niveau'], $_POST['interet'], $_POST['interet'], $_POST['annee'], $_POST['date_naissance'], $_POST['ville'] , $_POST['etab_scol'])):

            echo "Erreur dans la complétion des données";

        elseif (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['niveau'], $_POST['interet'], $_POST['interet'], $_POST['annee'], $_POST['date_naissance'], $_POST['ville'] , $_POST['etab_scol'])):

            $student = new Student($_POST['nom'], $_POST['prenom'],  $_POST['interet'], $_POST['niveau'], $_POST['email'], $_POST['tel'], $_POST['annee'],$_POST['date_naissance'], $_POST['ville'], $_POST['etab_scol']);
            $id = $_POST['idStudent'];
            // var_dump($id);die();

            
            $sql = "UPDATE students SET nom = ?, prenom = ?,interet = ?, niveau = ?, email = ?, tel = ?, annee = ?, date_naissance = ?, ville = ?, etab_scol = ?  WHERE id = ?";
            $query = $db->prepare($sql);
            $query->execute(array($student->nom, $student->prenom, $student->interet, $student->niveau, $student->email, $student->tel, $student->annee,$student->birthDate,$student->ville,$student->school, $id));
            
            header( "refresh:3;url=index.php" );
?>
            <p> Les infos ont bien été mises à jour. (Redirection auto)  </p>
<?php
            exit;      
        endif;


    elseif($_POST['form_supp'] == 'form_supp'):
        // $student = new Student($_POST['nom'], $_POST['prenom'],  $_POST['interet'], $_POST['niveau'], $_POST['email'], $_POST['tel'], $_POST['annee'] );
        $id = $_POST['idSuppStudent'];
        // var_dump($id);die();

        
        $sql = "DELETE FROM students WHERE id = ?";
        $query = $db->prepare($sql);
        $query->execute(array($id));
        
        header( "refresh:3;url=index.php" );

?>
        <p> Les infos ont été supprimées avec succès (Redirection auto)  </p>
<?php
        exit;
    endif;
    



