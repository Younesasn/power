<?php

class Notification
{
    private const CONTACT_SENT = 1;
    private const USER_INVALID = 1;
    private const USER_EMPTY = 2;
    public static function getSuccesMessageContact(int $code): string
    {
        $msg = '';

        switch ($code) {
            case self::CONTACT_SENT:
                $msg = "Votre demande sera traité dans les 48h !";
                break;
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
        }
        return $msg;
    }
}
