<?php
require_once '../classes/User.php';
require_once '../functions/error.php';

if (isset($_POST['send'])) {
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['password'])) {
        header('Location: ../sign-up.php?error=' . USER_EMPTY);
        exit;
    }

    try {
        $insertUser = new User($_POST);
        $insertUser->insertUser();
        header('Location: ../index.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
