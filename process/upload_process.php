<?php

require_once '../classes/Database.php';
require_once '../classes/Upload.php';
require_once '../classes/Utils.php';
require_once '../classes/Notification.php';


// si intrusion dans upload_process via le lien, je rediriges
if (empty($_FILES)) {
    header('Location: ../admin/upload.php');
    exit;
}

// On vérifie les données récupérées
try {
    $upload = new Upload($_POST, $_FILES);
} catch (RequiredFieldsException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::FIELD_EMPTY);
    exit;
} catch (InvalidBirthdateException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::BIRTHDATE_INVALID);
    exit;
}

// On extrait le fichier de $_FILES
$fileBio = $_FILES['file_bio'];
$filePdp = $_FILES['file_pdp'];

// On déstructure le nom du fichier avec son extension
['filename' => $fileNameBio, 'extension' => $fileExtBio] = pathinfo($fileBio['name']);
['filename' => $fileNamePdp, 'extension' => $fileExtPdp] = pathinfo($filePdp['name']);

// On reconstruit le nom du fichier avec des charactères aléatoires
$newFilenameBio = $fileNameBio . '_' . Utils::randomString(10) . '.' . $fileExtBio;
$newFilenamePdp = $fileNamePdp . '_' . Utils::randomString(10) . '.' . $fileExtPdp;

// On crée la destination du fichier suivi du nom du fichier à uploader
$path_actors = __DIR__ . '/../uploads/actors/' . $newFilenameBio;
$path_actors_round = __DIR__ . '/../uploads/actors/picture_round/' . $newFilenamePdp;


// On upload le fichier dans le dossier ciblé
$file_one = move_uploaded_file($_FILES['file_bio']['tmp_name'], $path_actors);
$file_two = move_uploaded_file($_FILES['file_pdp']['tmp_name'], $path_actors_round);

if ($file_one === false || $file_two === false) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_UPLOAD);
    exit;
}

try {
    $sql = 'INSERT INTO actors(first_name_actors, last_name_actors, surname_actors, description_actors, date_birth_actors, quote_actors, picture_actors, picture_round_actors, status_actors, occupation_actors) 
        VALUES (:first_name, :last_name, :surname, :description, :date_birth, :quote, :picture, :picture_round, :status, :occupation);';
    $query = Database::getConnection()->prepare($sql);
    $query->execute([
        'first_name' => $_POST['first_name'],
        'last_name'  => $_POST['last_name'],
        'surname'    => $_POST['surname'],
        'description'=> $_POST['text'],
        'date_birth' => $_POST['date'],
        'quote'      => $_POST['quote'],
        'picture'    => $newFilenameBio,
        'picture_round' => $newFilenamePdp,
        'status'     => $_POST['status'],
        'occupation' => $_POST['occupation']
    ]);
} catch (PDOException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_UPLOAD);
    exit;
}

try {
    $sql = 'SELECT * FROM actors WHERE surname_actors = :surname';
    $query = Database::getConnection()->prepare($sql);
    $query->execute(['surname' => $_POST['surname']]);
    $surname = $query->fetch();
} catch (PDOException $e) {
    header('Location: ../admin/upload.php?error='. Notification::ERROR_UPLOAD);
    exit;
}

try {
    $sql = 'INSERT INTO actors_series(id_actors, id_series) VALUES (:actors, :series)';
    $query = Database::getConnection()->prepare($sql);
    $query->execute([
        'actors' => $surname['id_actors'],
        'series' => $_POST['series']
    ]);
} catch (PDOException $e) {
    header('Location: ../admin/upload.php?error='. Notification::ERROR_UPLOAD);
    exit;
}

header('Location: ../admin/upload.php?succes=' . Notification::ADD_ACTOR);