<?php 
$raw_db_data = file_get_contents('config.json');
$db_data = json_decode($raw_db_data);

class Student 
{
    public string $nom;
    public string $prenom;
    public string $interet;
    public string $niveau;
    public string $email;
    public string $tel;
    public string $annee;
    public string $birthDate;
    public string $ville;
    public string $school;

    public function __construct( string $newNom, string $newPrenom, string $newInteret, string $newNiveau, string $newEmail, string $newTel, string $newAnnee, string $newBirthDate,string $newVille, string $newSchool) 
    {

        $this->nom = $newNom;
        $this->prenom = $newPrenom;
        $this->interet = $newInteret;
        $this->niveau = $newNiveau;
        $this->email = $newEmail;
        $this->tel = $newTel;
        $this->annee = $newAnnee;
        $this->birthDate = $newBirthDate;
        $this->ville = $newVille;
        $this->school = $newSchool;

        return $this;

    }

//     public function __toString()
//    {
//     $string = $this->nom . "<br>" . $this->prenom . "<br>" . $this->interet . "<br>" . $this->niveau . "<br>" . $this->email . "<br>" . $this->tel . "<br>" . $this->annee . "<br>";

//      return $string;
//    }

}


