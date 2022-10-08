<?php
class Formulaire {


    private $data;

    public function __construct($newData) {
        $this->data = $newData;

    }

    public function input($name) {
        return "<input type= 'text' id='$name' name= '$name'>";

    }

    public function select($name) {
        return "
        <select class='form-control' id='$name' name='$name'>
            <option value>Votre choix</option>
            <option value='12'>Première</option>
            <option value='0'>Terminale</option>
            <option value='1'>Bac+1</option>
            <option value='2'>Bac+2</option>
            <option value='3'>Bac+3</option>
            <option value='4'>Bac+4</option>
            <option value='5'>Bac+5</option>
            <option value='6'>Parent</option>        
        </select>";
    }

    public function submit() {
        return "<button type='submit'>Confirmer</button>";
    }
}