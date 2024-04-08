<?php

class RequiredFieldsException extends InvalidArgumentException
{
    public function __construct() {
        $this->message = "Champs requis";
    }
}
