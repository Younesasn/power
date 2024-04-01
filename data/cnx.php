<?php
$db_host = 'localhost';
$db_user = 'youpower';
$db_password = '6ym[i9)m5(2Fh]3M';
$db_db = 'power';

try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host='.$db_host.';dbname='.$db_db.';charset=utf8', $db_user, $db_password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}