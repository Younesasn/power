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

if ($_POST['series'] === 'Choisir la série') {
    header('Location: ../admin/upload.php?error=' . Notification::FIELD_EMPTY);
    exit;
}

// On extrait le fichier de $_FILES
$fileBio = $_FILES['file_bio'];
$filePdp = $_FILES['file_pdp'];

try {
    $firstUpload = new FileUpload($fileBio, __DIR__ . '/../uploads/actors');
    $newFilenameBio = $firstUpload->upload();

    $secondUpload = new FileUpload($filePdp, __DIR__ . '/../uploads/actors/picture_round');
    $newFilenamePdp = $secondUpload->upload();

} catch (RuntimeException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_UPLOAD);
    exit;
}

extract($_POST);


try {
    $sql = 'INSERT INTO actors(first_name_actors, last_name_actors, surname_actors, description_actors, date_birth_actors, quote_actors, picture_actors, picture_round_actors, status_actors, occupation_actors) 
        VALUES (:first_name, :last_name, :surname, :description, :date_birth, :quote, :picture, :picture_round, :status, :occupation);';
    $query = Database::getConnection()->prepare($sql);
    $query->execute([
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'surname'    => $surname,
        'description' => $text,
        'date_birth' => $birth_date,
        'quote'      => $quote,
        'picture'    => $newFilenameBio,
        'picture_round' => $newFilenamePdp,
        'status'     => $status,
        'occupation' => $occupation
    ]);
} catch (RuntimeException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_UPLOAD);
    exit;
}

try {
    $sql = 'SELECT * FROM actors WHERE surname_actors = :surname';
    $query = Database::getConnection()->prepare($sql);
    $query->execute(['surname' => $_POST['surname']]);
    $idNewActor = $query->fetch();
} catch (RuntimeException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_UPLOAD);
    exit;
}

try {
    $sql = 'INSERT INTO actors_series(id_actors, id_series) VALUES (:actors, :series)';
    $query = Database::getConnection()->prepare($sql);
    $query->execute([
        'actors' => $idNewActor['id_actors'],
        'series' => $series
    ]);
} catch (RuntimeException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_UPLOAD);
    exit;
}

header('Location: ../admin/upload.php?succes=' . Notification::ADD_ACTOR);
