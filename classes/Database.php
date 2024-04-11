<?php

class Database
{
    /**
     * Méthode qui permet la connexion une la BDD
     *
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        [
            'DB_HOST' => $db_host,
            'DB_NAME' => $db_name,
            'DB_USERNAME' => $db_user,
            'DB_PASSWORD' => $db_password,
            'DB_CHARSET' => $db_charset

        ] = parse_ini_file(__DIR__ . '/../config/db.ini');

        // On se connecte à MySQL
        return new PDO("mysql:host=$db_host;dbname=$db_name;charset=$db_charset", $db_user, $db_password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public static function select(string $table): array
    {
        $sql = "SELECT * FROM $table";
        $stmt = Database::getConnection()->query($sql);
        return $stmt->fetchAll();
    }
}
