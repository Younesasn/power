<?php

class Notification
{
    public const FORM_SENT = 1;
    public const USER_INVALID = 2;
    public const FIELD_EMPTY = 3;
    public const ADD_ACTOR = 4;
    public const ERROR_UPLOAD = 5;
    public const ERROR_DATABASE = 6;
    public const ADD_SERIE = 7;
    public const DELETE_SERIE = 8;
    public const ERROR_DELETE_SERIE = 9;
    public const NOT_FOUND_ACTOR = 10;
    public const DELETE_ACTOR = 11;
    public const ERROR_DELETE_ACTOR = 12;

    public static function getSuccesMessage(int $code): string
    {
        $msg = '';

        switch ($code) {
            case self::FORM_SENT:
                $msg = "Votre demande a bien été prise en compte !";
                break;
            case self::ADD_ACTOR:
                $msg = "Acteur créé !";
                break;
            case self::ADD_SERIE:
                $msg = "Série créée !";
                break;
            case self::DELETE_SERIE:
                $msg = "Série supprimée !";
                break;
            case self::DELETE_ACTOR:
                $msg = "Acteur supprimé !";
                break;
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
                break;
            case self::ERROR_DATABASE:
                $msg = "Lors de la connexion à la base de donnée";
                break;
            case self::ERROR_DELETE_SERIE:
                $msg = "Veuillez sélectionner une série à supprimer";
                break;
            case self::NOT_FOUND_ACTOR:
                $msg = "Acteur non trouvé";
                break;
            case self::ERROR_DELETE_ACTOR:
                $msg = "Lors de la suppression de l'acteur";
                // Add default
        }
        return $msg;
    }
}
