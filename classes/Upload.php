<?php

require_once 'Database.php';
require_once 'Utils.php';
require_once 'RequiredFieldsException.php';
require_once 'InvalidBirthdateException.php';

class Upload
{

    private const REQUIRED_FIELDS = ['last_name', 'first_name', 'surname', 'birth_date', 'quote', 'text', 'occupation', 'status', 'series'];

    private const REQUIRED_FIELDS_FILES = ['file_bio', 'file_pdp'];

    /**
     * @param array $data Données du formulaire
     * @throws RequiredFieldsException si les données sont invalides
     * @throws InvalidBirthdateException si la date n'est pas valide
     */
    public function __construct(private array $data, private array $files)
    {
        if (!$this->hasRequiredFields()) {
            throw new RequiredFieldsException();
        }

        if (!$this->hasBirthdateValid()) {
            throw new InvalidBirthdateException();
        }

        // Contrôle :
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

    private function hasBirthdateValid(): bool
    {
        if ($this->data['birth_date'] > date('Y-m-d')) {
            return false;
        }

        return true;
    }
}
