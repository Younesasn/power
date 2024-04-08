<?php
require_once '../classes/User.php';
require_once '../classes/Notification.php';

if (empty($_POST)) {
    header('Location: ../sign-up.php');
    exit;
}

try {
    $insertUser = new User($_POST);
    $insertUser->insertUser();
    header('Location: ../index.php');
} catch (PDOException $e) {
    header('Location: ../sign-up.php?error=' . Notification::FIELD_EMPTY);
    exit;
}
