<?php

class InvalidEmailException extends InvalidArgumentException
{
    public function __construct() {
        $this->message = "Veuillez remplir un email valide";
    }
}
