<?php
require_once __DIR__ . '/../classes/Authentification.php';
require_once __DIR__ . '/../classes/Notification.php';

if (isset($_POST['send'])) {
    try {
        $admin = new Authentification($_POST);
        $admin = $admin->getAuthAdmin();
    } catch (Exception $e) {
        header('Location: ../sign-in.php?error=' . Notification::USER_EMPTY);
        exit;
    }

    if (count($admin) == 0) {
        header('Location: ../sign-in.php?error=' . Notification::USER_INVALID);
        exit;
    }

    session_start();
    $_SESSION['useradmin'] = $_POST['useradmin'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: /power/admin/index.php');
}
