<?php
class Formulaire {


    private $data;

    public function __construct($newData) {
        $this->data = $newData;

    }

    public function input($name) {
        return "<input type= 'text' class='form-control' id='$name' name= '$name'>";

    }

    public function select($name) {
        return "<select class='form-control' id='$name' name='$name'></select>";
    }

    public function submit() {
        return "<button type='submit' class='btn btn-primary w-25'a>Confirmer</button>";
    }
}


/******************************************************** */


class Form2 
{

    private $formulaireCode= "";

    public function create() 
    {
        return $this->formulaireCode;
    }

    
    //ajout d'attributs (id,class, name, etc.)
    private function ajoutAttributs(array $attributs): string 
    {
   
        $str = '';

        foreach($attributs as $attribut => $valeur){

                $str = "$str" . " $attribut='$valeur'";        
        }

        return $str;
    }

    //Debut de la balise formulaire
    public function debutFormulaire(string $methode = 'post', string $action = 'send_form.php', array $attributs= []) 
    {
        $this->formulaireCode = $this->formulaireCode . "<form action='$action' method='$methode'";

        if($attributs):
            $this->formulaireCode = $this->formulaireCode . $this->ajoutAttributs($attributs) . '>';
        else:
            $this->formulaireCode = $this->formulaireCode . '>';
        endif;

        return $this;

    }

    //Fin du formulaire
    public function finFormulaire()
    {
        $this->formulaireCode = $this->formulaireCode . '</form>';

        return $this;
    }

    //DIFFERENTS CHAMPS DU FORM
        //Ajout des labels
    public function ajoutLabel(string $for, string $texte, array $attributs = []) {
        $this->formulaireCode = $this->formulaireCode . "<label for='$for'";

        if($attributs):
            $this->formulaireCode = $this->formulaireCode . $this->ajoutAttributs($attributs);
        else:
            $this->formulaireCode = $this->formulaireCode . '';
        endif;

        $this->formCode = $this->formulaireCode .">$texte</label>";

        return $this;

    }

        //Ajout d'inputs
    public function ajoutInput(string $type, string $nom, array $attributs = []) {

        $this->formulaireCode = $this->formulaireCode . "input type='$type' name = '$nom'";

        if($attributs):
            $this->formulaireCode = $this->formulaireCode . $this->ajoutAttributs($attributs) . '>';
        else:
            $this->formulaireCode = $this->formulaireCode .'>';
        endif;

        return $this;
    }

        //Ajout des selects
    public function ajoutSelect(string $nom, array $option, array $attributs=[]) {
        $this->formulaireCode = $this->formulaireCode . "<select name ='$nom' ";

        if($attributs):
            $this->formulaireCode = $this->formulaireCode . $this->ajoutAttributs($attributs) . '>';
        else:
            $this->formulaireCode = $this->formulaireCode .'>';
        endif;

        return $this;

    }
}

