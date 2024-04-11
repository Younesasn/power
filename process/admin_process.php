<?php
require_once '../classes/Authentification.php';
require_once '../classes/Notification.php';

if (!isset($_POST) || empty($_POST)) {
    header('Location: ../sign-in.php');
    exit;
}

try {
    $admin = new Authentification($_POST);
    $admin = $admin->authAdmin();
} catch (RequiredFieldsException $e) {
    header('Location: ../sign-in.php?error=' . Notification::FIELD_EMPTY);
    exit;
} catch (PDOException $e) {
    header('Location: ../sign-in.php?error=' . Notification::ERROR_DATABASE);
    exit;
}

if ($admin === false) {
    header('Location: ../sign-in.php?error=' . Notification::USER_INVALID);
    exit;
}

session_start();
$_SESSION['useradmin'] = $_POST['useradmin'];
header('Location: /power/admin/index.php');
