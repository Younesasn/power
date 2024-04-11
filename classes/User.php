<?php

require_once 'Database.php';
require_once 'RequiredFieldsException.php';
require_once 'InvalidEmailException.php';

class User
{
    private const REQUIRED_FIELDS = ['first_name', 'last_name', 'email', 'password'];

    /**
     * @param array $data Données du formulaire
     * @throws RequiredFieldsException si les données sont invalides
     */
    public function __construct(private array $data)
    {
        if (!$this->isSignUpFormValid()) {
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
    private function isSignUpFormValid(): bool
    {
        foreach (self::REQUIRED_FIELDS as $field) {
            // Si non défini, ou bien défini mais vide
            if (!isset($this->data[$field]) || empty($this->data[$field])) {
                return false;
            }
        }

        if (filter_var($this->data['email'], FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidEmailException();
        }

        // Vérif du pass si length > 12 && MAJ && min && chiffres

        return true;
    }

    // -------

    public function insertUser() : void
    {
        [
            'first_name' => $firstname,
            'last_name'=> $lastname,
            'email'=> $email,
            'password'=> $password
        ] = $this->data;

        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users(first_name_users, last_name_users, email_users, password_users) VALUES (:firstname, :lastname, :email, :password)";
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute(
            [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $passwordHashed
            ]
        );
    }
}
