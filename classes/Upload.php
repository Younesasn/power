<?php

require_once 'Database.php';
require_once 'RequiredFieldsException.php';

class Upload
{

    private const REQUIRED_FIELDS = ['last_name', 'first_name', 'surname', 'birth_date', 'quote', 'text', 'occupation', 'status', 'series'];

    private const REQUIRED_FIELDS_FILES = ['file_bio', 'file_pdp'];

    /**
     * @param array $data Données du formulaire
     * @throws RequiredFieldsException si les données sont invalides
     */
    public function __construct(private array $data, private array $files)
    {
        if (!$this->hasRequiredFields()) {
            throw new RequiredFieldsException();
        }

        // Contrôle : Date (si n'égale pas ou si ne dépasse pas aujourd'hui)
        // File(si ce n'est pas une image, ...)
    }

    private function hasRequiredFields(): bool
    {
        foreach (self::REQUIRED_FIELDS as $field) {
            if (!isset($this->data[$field]) || empty($this->data[$field])) {
                return false;
            }
        }

        foreach (self::REQUIRED_FIELDS_FILES as $field) {
            if (!isset($this->files[$field]) || empty($this->files[$field])) {
                return false;
            }
        }

        return true;
    }
}
