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
        return "<button type='submit' class='btn btn-primary w-25'>Confirmer</button>";
    }
}