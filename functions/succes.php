<?php

const FORM_SENT = 1;

function getSuccesMessage(int $code): string
{
    $msg = '';

    switch ($code) {
        case FORM_SENT:
            $msg = "Votre demande sera traité dans les 48h !";
            break;
        default:
            $msg = "Succès";
    }
    return $msg;
}
