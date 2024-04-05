<?php

class RequiredFieldsException extends InvalidArgumentException
{
    public function __construct() {
        $this->message = "Veuillez remplir tout les champs";
    }
}
