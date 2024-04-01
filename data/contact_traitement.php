<?php
require_once 'cnx.php';
require_once __DIR__ . '/../functions/error.php';
require_once __DIR__ . '/../functions/succes.php';

if (isset($_POST['send'])) {
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['object']) || empty($_POST['text'])) {
        header('Location: ../contact.php?error=' . USER_EMPTY);
    } else {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $object = $_POST['object'];
        $text = $_POST['text'];

        $sql = "INSERT INTO contacts(first_name_contacts, last_name_contacts, email_contacts, object_contacts, text_contacts) VALUES (:firstName, :lastName, :email, :object, :text)";
        $stmt = $bdd->prepare($sql);
        try {
            $stmt->execute(
                [
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'object' => $object,
                    'text' => $text
                ]
            );
            header('Location: ../contact.php?succes=' . FORM_SENT);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
