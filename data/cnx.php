<?php
[
    'DB_HOST' => $db_host,
    'DB_NAME' => $db_name,
    'DB_USERNAME' => $db_user,
    'DB_PASSWORD' => $db_password,
    'DB_CHARSET' => $db_charset
    
] = parse_ini_file(__DIR__ . '/../config/db.ini');

try {
    // On se connecte à MySQL
    $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=$db_charset", $db_user, $db_password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}