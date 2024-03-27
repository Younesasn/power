<?php
require_once 'query.php';

if(isset($_POST['send'])) {
    if(!empty($_POST['useradmin']) && !empty($_POST['password'])) {
        $useradmin = $_POST['useradmin'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE username_admin = :username AND password_admin = :password";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(
            ['username' => $useradmin, 
            'password' => $password]
        );
        $user = $stmt->fetchAll();
        
        if (count($user) > 0) {
            session_start();
            // $_SESSION['useradmin'] = $useradmin;
            // $_SESSION['password'] = $password;
            // $_SESSION['id'] = $user->fetch()['id'];
            header('Location: /power/admin/index.php');
        }
    } else {
        echo 'Mauvais identifiants';
    }
}

// $message = '';

// if(isset($_POST['send'])) {
//     if (isset($_POST['useradmin']) && isset($_POST['password'])) {
//         $useradmin = $_POST['useradmin'];
//         $password = $_POST['password'];
    
//         $sql = "SELECT * FROM admin WHERE username_admin = :username";
//         $stmt = $bdd->prepare($sql);
//         $stmt->execute(['username' => $useradmin]);
//         $user = $stmt->fetchAll();
    
//         if ($user && password_verify($password, $user['password'])) {
//             session_start();
//             $_SESSION['id_admin'] = $user['id'];
//             header('Location: /admin/index.php');
//         } else {
//             $message = 'Mauvais identifiants';
//         }
//     } else {
//         echo 'error';
//     }
// }