<?php

require_once 'Database.php';
require_once 'Utils.php';
require_once 'RequiredFieldsException.php';
require_once 'InvalidBirthdateException.php';

class FileUpload
{

    /**
     * @param array $files 
     */
    public function __construct(private array $file, private string $destination)
    {
        // Contrôle :
        // File(si ce n'est pas une image, ...)
    }

    public function upload(): string
    {
        ['filename' => $fileName, 'extension' => $fileExt] = pathinfo($this->file['name']);
        $newFilename = $fileName . '_' . Utils::randomString(10) . '.' . $fileExt;
        $dirPath = $this->destination . '/' . $newFilename;

        if (!move_uploaded_file($this->file['tmp_name'], $dirPath)) {
            throw new RuntimeException("Impossible d'upload le fichier");
        }

        return $newFilename;
    }
}
