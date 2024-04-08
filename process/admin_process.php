<?php
require_once '../classes/Authentification.php';
require_once '../classes/Notification.php';

if (empty($_POST)) {
    header('Location: ../sign-in.php');
    exit;
}

try {
    $admin = new Authentification($_POST);
    $admin = $admin->getAuthAdmin();
} catch (PDOException $e) {
    header('Location: ../sign-in.php?error=' . Notification::FIELD_EMPTY);
    exit;
}

if ($admin === false) {
    header('Location: ../sign-in.php?error=' . Notification::USER_INVALID);
    exit;
}

session_start();
$_SESSION['useradmin'] = $_POST['useradmin'];
header('Location: /power/admin/index.php');
