<?php

require_once __DIR__ . '/../../classes/Database.php';

class Contact
{
    public function insertContact(string $firstName, string $lastName, string $email, string $object, string $text): void
    {
        $db = new Database();
        $sql = "INSERT INTO contacts(first_name_contacts, last_name_contacts, email_contacts, object_contacts, text_contacts) VALUES (:firstName, :lastName, :email, :object, :text)";
        $stmt = $db->getConnexion()->prepare($sql);
        $stmt->execute(
            [
                'firstName' => $firstName,
                'lastName' => strtoupper($lastName),
                'email' => $email,
                'object' => $object,
                'text' => $text
            ]
        );
    }
    public function getContacts(): array
    {
        $db = new Database();
        $sql = 'SELECT *, DATE_FORMAT(date_contacts, "%d/%m/%Y") AS date FROM contacts ORDER BY date_contacts DESC';
        $query = $db->getConnexion()->query($sql);
        return  $query->fetchAll();
    }

    public function getLatestContacts() : array
    {
        $db = new Database();
        $sql = 'SELECT *, DATE_FORMAT(date_contacts, "%d/%m/%Y") AS date FROM contacts ORDER BY date_contacts DESC LIMIT 4';
        $query = $db->getConnexion()->query($sql);
        return $query->fetchAll();
    }

    public function getMessages(int $id, array $contacts): ?array
    {
        $contactsIds = array_column($contacts, 'id_contacts');
        $contactKey = array_search($id, $contactsIds);

        if ($contactKey === false) {
            return null;
        }

        return $contacts[$contactKey];
    }
}
