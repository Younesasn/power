<?php
require_once __DIR__ . '/../classes/Contact.php';
require_once __DIR__ . '/../classes/Notification.php';

if (isset($_POST['send'])) {
    try {
        $contact = new Contact($_POST);
        $contact->insertContact();
        header('Location: ../contact.php?succes=' . Notification::CONTACT_SENT);
    } catch (RequiredFieldsException $e) {
        header('Location: ../contact.php?error=' . Notification::USER_EMPTY);
        exit;
    }
}