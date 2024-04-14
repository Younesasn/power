<?php
require_once '../classes/Contact.php';
require_once '../classes/Notification.php';

if (!isset($_POST) || empty($_POST)) {
    header('Location: ../contact.php');
    exit;
}

try {
    $contact = new Contact($_POST);
    $contact->insertContact();
    header('Location: ../contact.php?succes=' . Notification::FORM_SENT);
} catch (RequiredFieldsException $e) {
    header('Location: ../contact.php?error=' . Notification::FIELD_EMPTY);
    exit;
}
