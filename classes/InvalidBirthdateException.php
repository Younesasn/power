<?php
class InvalidBirthdateException extends InvalidArgumentException
{
    public function __construct()
    {
        $this->message = "Date de naissance invalide";
    }
}
