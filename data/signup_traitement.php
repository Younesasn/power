<?php
require_once '../classes/User.php';
require_once '../functions/error.php';

if (isset($_POST['send'])) {
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password'])) {
        header('Location: ../sign-up.php?error=' . USER_EMPTY);
        exit;
    }
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    try {
        $insertUser = new User();
        $insertUser = $insertUser->insertUser($firstName, $lastName, $email, $password);
        header('Location: ../index.php');
    } catch (PDOException $e) {
        var_dump($e->getMessage());
        exit;
    }
}
