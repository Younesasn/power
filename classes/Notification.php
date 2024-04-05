<?php

class Notification
{
    public const CONTACT_SENT = 1;
    public const USER_INVALID = 2;
    public const USER_EMPTY = 3;
    public static function getSuccesMessageContact(int $code): string
    {
        $msg = '';

        switch ($code) {
            case self::CONTACT_SENT:
                $msg = "Votre demande sera traité dans les 48h !";
                break;
            // Add default
        }
        return $msg;
    }

    public static function getErrorMessageLogin(int $code): string
    {
        $msg = '';
    
        switch ($code) {
            case self::USER_INVALID:
                $msg = "Le nom d'utilisateur ou le mot de passe est incorrect";
                break;
            case self::USER_EMPTY:
                $msg = "Veuillez remplir les champs ci-dessous";
                break;
            // Add default
        }
        return $msg;
    }
}
