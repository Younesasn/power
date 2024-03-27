<?php

const USER_INVALID = 1;
const USER_EMPTY = 2;

function getErrorMessage(int $code): string
{
    $msg = '';

    switch ($code) {
        case USER_INVALID:
            $msg = "Le nom d'utilisateur ou le mot de passe est incorrect";
            break;
        case USER_EMPTY:
            $msg = "Veuillez remplir les champs ci-dessous";
            break;
        default:
            $msg = "Une erreur est survenue";
    }
    return $msg;
}
