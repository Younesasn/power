<?php 

require_once 'Database.php';

class Authentification {

    public function __construct(
        private string $userAdmin,
        private string $password
    ) {
        if (empty($this->userAdmin) || empty($this->password)) {
            throw new Exception('Champs vides');
        }
    }
    
    public function getAuthAdmin() : array {
        $db = new Database();
        $sql = "SELECT * FROM admin WHERE username_admin = :username AND password_admin = :password";
        $stmt = $db->getConnexion()->prepare($sql);
        $stmt->execute(
            [
                'username' => $this->userAdmin,
                'password' => $this->password
            ]
        );
        return $stmt->fetchAll();
    }
}