<?php

require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/RequiredFieldsException.php';
require_once __DIR__ . '/InvalidEmailException.php';

class Contact
{
    private const REQUIRED_FIELDS = ['first_name', 'last_name', 'email', 'object', 'text'];

    /**
     * @param array $data Données du formulaire
     * @throws InvalidArgumentException si les données sont invalides
     */
    public function __construct(private array $data)
    {
        if (!$this->hasRequiredFields()) {
            throw new RequiredFieldsException();
        }

        if (!$this->isEmailValid()) {
            throw new InvalidEmailException();
        }
    }

    /**
     * Méthode qui vérifie si les données passé sont valides
     *
     * @param array $data
     * @return boolean
     * @throws InvalidEmailException
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

    private function isEmailValid(): bool {
        if (filter_var($this->data['email'], FILTER_VALIDATE_EMAIL) === false) {
            return false;
        }

        return true;
    }

    public function insertContact(): void
    {
        [
            'first_name' => $firstName,
            'last_name'=> $lastName,
            'email'=> $email,
            'object'=> $object,
            'text'=> $text
        ] = $this->data;
        
        $sql = "INSERT INTO contacts(first_name_contacts, last_name_contacts, email_contacts, object_contacts, text_contacts) VALUES (:firstname, :lastname, :email, :object, :text)";
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute(
            [
                'firstname' => $firstName,
                'lastname' => strtoupper($lastName),
                'email' => $email,
                'object' => $object,
                'text' => $text
            ]
        );
    }
    public static function getContacts(): array
    {
        $sql = 'SELECT *, DATE_FORMAT(date_contacts, "%d/%m/%Y") AS date FROM contacts ORDER BY date_contacts DESC';
        $query = Database::getConnection()->query($sql);
        return $query->fetchAll();
    }

    public static function getContactsWithLimit(): array
    {
        $sql = 'SELECT *, DATE_FORMAT(date_contacts, "%d/%m/%Y") AS date FROM contacts ORDER BY date_contacts DESC LIMIT 0, 14';
        $query = Database::getConnection()->query($sql);
        return $query->fetchAll();
    }

    public static function getLatestContacts(): array
    {
        $sql = 'SELECT *, DATE_FORMAT(date_contacts, "%d/%m/%Y") AS date FROM contacts ORDER BY date_contacts DESC LIMIT 4';
        $query = Database::getConnection()->query($sql);
        return $query->fetchAll();
    }

    public static function getMessages(int $id, array $contacts): ?array
    {
        $contactsIds = array_column($contacts, 'id_contacts');
        $contactKey = array_search($id, $contactsIds);

        if ($contactKey === false) {
            return null;
        }

        return $contacts[$contactKey];
    }
}
