<?php
require_once __DIR__ . '/../classes/Contact.php';
require_once __DIR__ . '/../functions/error.php';
require_once __DIR__ . '/../functions/succes.php';

if (isset($_POST['send'])) {
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['object']) || empty($_POST['text'])) {
        header('Location: ../contact.php?error=' . USER_EMPTY);
        exit;
    }
    
    try {
        $contact = new Contact($_POST);
        $contact->insertContact();
        header('Location: ../contact.php?succes=' . FORM_SENT);
    } catch (InvalidArgumentException $e) {
        echo $e->getMessage();
        exit;
    }
}
