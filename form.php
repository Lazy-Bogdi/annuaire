<?php 


require 'classes/classForm.php';

$formulaire = new Formulaire('Roger');

// var_dump($formulaire); die();

echo $formulaire->input('prenom');
echo $formulaire->input('nom');
echo $formulaire->input('email');
echo $formulaire->input('tel');
echo $formulaire->select('niveau');
echo $formulaire->select('interet');
echo $formulaire->submit();
