<?php

class InvalidEmailException extends InvalidArgumentException
{
    public function __construct()
    {
        $this->message = "Email invalide";
    }
}
