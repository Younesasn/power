<?php
require_once 'Database.php';
require_once 'RequiredFieldsException.php';

class Authentification
{

    private const REQUIRED_FIELDS = ['useradmin', 'password'];

    /**
     * @param array $data Données du formulaire
     * @throws InvalidArgumentException si les données sont invalides
     */
    public function __construct(private array $data)
    {
        if (!$this->hasRequiredFields()) {
            throw new RequiredFieldsException();
        }
    }

    /**
     * Méthode qui vérifie si les données passé sont valides
     *
     * @param array $data
     * @return boolean
     */
    private function hasRequiredFields(): bool
    {
        foreach (self::REQUIRED_FIELDS as $field) {
            // Si non défini, ou bien défini mais vide
            if (!isset($this->data[$field]) || empty($this->data[$field])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Méthode qui détermine si la requète de connexion est true ou false
     *
     * @return boolean
     * @throws PDOException
     */
    public function getAuthAdmin(): bool
    {
        [
            'useradmin' => $useradmin,
            'password' => $password
        ] = $this->data;

        $sql = "SELECT * FROM admin WHERE username_admin = :username";
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute(
            ['username' => $useradmin]);
        $query = $stmt->fetch();
        
        if (!password_verify($password, $query['password_admin'])) {
            return false;
        }
        return true;
    }
}
