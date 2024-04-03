<?php

require_once 'Database.php';

class User
{

    public function insertUser(string $firstName, string $lastName, string $email, string $password) : void
    {
        $db = new Database();
        $sql = "INSERT INTO users(first_name_users, last_name_users, email_users, password_users) VALUES (:firstName, :lastName, :email, :password)";
        $stmt = $db->getConnexion()->prepare($sql);
        $stmt->execute(
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'password' => $password
            ]
        );
    }
}
