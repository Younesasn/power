<?php

require_once '../classes/Database.php';
require_once '../classes/FileUpload.php';
require_once '../classes/Utils.php';
require_once '../classes/Notification.php';


// si intrusion dans upload_process via le lien, je rediriges
if (empty($_FILES)) {
    header('Location: ../admin/upload.php?error=' . Notification::FIELD_EMPTY);
    exit;
}

// On extrait le fichier de $_FILES
$fileSeries = $_FILES['file_series'];

try {
    $serieUpload = new FileUpload($fileSeries, __DIR__ . '/../uploads/series');
    $newFilename = $serieUpload->upload();

} catch (RuntimeException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_UPLOAD);
    exit;
}

extract($_POST);

try {
    $sql = 'INSERT INTO series(name_series, picture_series) VALUES (:name, :picture)';
    $query = Database::getConnection()->prepare($sql);
    $query->execute([
        'name' => $name_series,
        'picture'    => $newFilename
    ]);
} catch (RuntimeException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_UPLOAD);
    exit;
}

header('Location: ../admin/upload.php?succes=' . Notification::ADD_SERIE);
