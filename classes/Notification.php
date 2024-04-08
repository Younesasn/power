<?php

class Notification
{
    public const FORM_SENT = 1;
    public const USER_INVALID = 2;
    public const FIELD_EMPTY = 3;
    public const ADD_ACTOR = 4;
    public const ERROR_UPLOAD = 5;
    public static function getSuccesMessage(int $code): string
    {
        $msg = '';

        switch ($code) {
            case self::FORM_SENT:
                $msg = "Votre demande sera traité dans les 48h !";
                break;
            case self::ADD_ACTOR:
                $msg = "Acteur créé !";
        }
        return $msg;
    }

    public static function getErrorMessage(int $code): string
    {
        $msg = '';
    
        switch ($code) {
            case self::USER_INVALID:
                $msg = "Le nom d'utilisateur ou le mot de passe est incorrect";
                break;
            case self::FIELD_EMPTY:
                $msg = "Veuillez remplir les champs ci-dessous";
                break;
            case self::ERROR_UPLOAD:
                $msg = "L'upload a échoué, veuillez réessayer";
            // Add default
        }
        return $msg;
    }
}
