<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'power';

try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host='.$db_host.';dbname='.$db_db.';charset=utf8', $db_user, $db_password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

// $mysqli = @new mysqli(
//     $db_host,
//     $db_user,
//     $db_password,
//     $db_db
// );

// if ($mysqli->connect_error) {
//     echo 'Errno: ' . $mysqli->connect_errno;
//     echo '<br>';
//     echo 'Error: ' . $mysqli->connect_error;
//     exit();
// }

// echo 'Success: A proper connection to MySQL was made.';
// echo '<br>';
// echo 'Host information: ' . $mysqli->host_info;
// echo '<br>';
// echo 'Protocol version: ' . $mysqli->protocol_version;

// $mysqli->close();