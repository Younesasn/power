<?php
require_once __DIR__ . '/../admin/classes/Contact.php';
require_once __DIR__ . '/../functions/error.php';
require_once __DIR__ . '/../functions/succes.php';

if (isset($_POST['send'])) {
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['object']) || empty($_POST['text'])) {
        header('Location: ../contact.php?error=' . USER_EMPTY);
        exit;
    }

    [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'object' => $object,
        'text' => $text
    ] = $_POST;

    try {
        $insertContact = new Contact();
        $insertContact = $insertContact->insertContact($firstName, $lastName, $email, $object, $text);
        header('Location: ../contact.php?succes=' . FORM_SENT);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}
