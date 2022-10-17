<?php 

class Student 
{
    public string $nom;
    public string $prenom;
    public string $interet;
    public string $niveau;
    public string $email;
    public string $tel;

    public function __construct( string $newNom, string $newPrenom, string $newInteret, string $newNiveau, string $newEmail, string $newTel) 
    {

        $this->nom = $newNom;
        $this->prenom = $newPrenom;
        $this->interet = $newInteret;
        $this->niveau = $newNiveau;
        $this->email = $newEmail;
        $this->tel = $newTel;

        return $this;

    }

    public function __toString()
   {
    $string = $this->nom . "<br>" . $this->prenom . "<br>" . $this->interet . "<br>" . $this->niveau . "<br>" . $this->email . "<br>" . $this->tel . "<br>";

     return $string;
   }

}


