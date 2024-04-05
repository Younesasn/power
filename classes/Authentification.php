<?php
require_once 'Database.php';
require_once 'RequiredFieldsException.php';

class Authentification
{

    private const REQUIRED_FIELDS = ['userAdmin', 'password'];

    /**
     * @param array $data Données du formulaire
     * @throws InvalidArgumentException si les données sont invalides
     */
    public function __construct(private array $data)
    {
        if (!$this->isSignInFormValid()) {
            throw new RequiredFieldsException();
        }
    }

    /**
     * Méthode qui vérifie si les données passé sont valides
     *
     * @param array $data
     * @return boolean
     * @throws InvalidEmailException
     */
    private function isSignInFormValid(): bool
    {
        foreach (self::REQUIRED_FIELDS as $field) {
            // Si non défini, ou bien défini mais vide
            if (!isset($this->data[$field]) || empty($this->data[$field])) {
                return false;
            }
        }

        return true;
    }

    public function getAuthAdmin(): array
    {
        [
            'useradmin' => $useradmin,
            'password' => $password
        ] = $this->data;

        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
        $sql = "SELECT * FROM admin WHERE username_admin = :username AND password_admin = :password";
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute(
            [
                'username' => $useradmin,
                'password' => $password
            ]
        );
        return $stmt->fetchAll();
    }
}
