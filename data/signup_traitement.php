<?php
require_once 'cnx.php';
require_once __DIR__ . '/../functions/error.php';

if (isset($_POST['send'])) {
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password'])) {
        header('Location: ../sign-up.php?error=' . USER_EMPTY);
    } else {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users(first_name_users, last_name_users, email_users, password_users) VALUES (:firstName, :lastName, :email, :password)";
        $stmt = $bdd->prepare($sql);
        try {
            $stmt->execute(
                [
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'password' => $password
                ]
            );
            header('Location: ../index.php');
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
