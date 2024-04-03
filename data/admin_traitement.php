<?php
require_once __DIR__ . '/../classes/Authentification.php';
require_once __DIR__ . '/../functions/error.php';

// if (isset($_POST['send'])) {
//     if (isset($_POST['']) || isset($_POST[''])) {
//         header('Location: sign-in.php?error=' . USER_EMPTY);
//     } else {
//         $useradmin = $_POST['useradmin'];
//         $password = $_POST['password'];

//         try {
//             $admin = new Authentification($useradmin, $password);
//             $admin = $admin->getAuthAdmin();
//         } catch (Exception $e) {
//             echo $e->getMessage();
//             exit;
//         }

//         if (count($admin) > 0) {
//             session_start();
//             $_SESSION['useradmin'] = $useradmin;
//             $_SESSION['password'] = $password;
//             // $_SESSION['id'] = $user->fetch()['id'];
//             header('Location: /power/admin/index.php');
//         } else {
//             header('Location: ../sign-in.php?error=' . USER_INVALID);
//         }
//     }
// }

if (isset($_POST['send'])) {
    if (!isset($_POST['useradmin']) || !isset($_POST['password'])) {
        header('Location: sign-in.php?error=' . USER_EMPTY);
        exit;
    }

    [
        'useradmin' => $useradmin,
        'password' => $password
    ] = $_POST;

    if (empty($useradmin) || empty($password)) {
        header('Location: ../sign-in.php?error=' . USER_EMPTY);
        exit;
    }

    try {
        $admin = new Authentification($useradmin, $password);
        $admin = $admin->getAuthAdmin();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }

    if (count($admin) == 0) {
        header('Location: ../sign-in.php?error=' . USER_INVALID);
        exit;
    }

    session_start();
    $_SESSION['useradmin'] = $useradmin;
    $_SESSION['password'] = $password;
    header('Location: /power/admin/index.php');
}
