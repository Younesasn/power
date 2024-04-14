<?php

require_once '../classes/FileUpload.php';
require_once '../classes/Actor.php';
require_once '../classes/Database.php';
require_once '../classes/Notification.php';

$id = $_POST['id'];

if (!isset($_POST['series'])) {
    header('Location: ../admin/upload.php');
    exit;
}

$hasBioUploaded = false;
$hasPdpUploaded = false;

if ($_POST['series'] === 'Choisir la série') {
    header('Location: ../admin/modify_actor.php?id=' . $id . '&error=' . Notification::FIELD_EMPTY);
    exit;
}

if ($_FILES['file_bio']['error'] == 0) {
    try {
        $fileBio = $_FILES['file_bio'];
        // On récupère le nom du fichier dans la BDD
        $actor = Actor::getActor($id, Actor::getActors());

        if (!unlink('../uploads/actors/' . $actor['picture_actors'])) {
            header('Location: ../admin/modify_actor.php?id=' . $id . '&error=' . Notification::FIELD_EMPTY);
        }
        $firstUpload = new FileUpload($fileBio, __DIR__ . '/../uploads/actors');
        $newFilenameBio = $firstUpload->upload();
        $hasBioUploaded = true;
    } catch (RuntimeException $e) {
        header('Location: ../admin/modify_actor.php?id=' . $id . '&error=' . Notification::FIELD_EMPTY);
        exit;
    }
}

if ($_FILES['file_pdp']['error'] == 0) {
    try {
        $filePdp = $_FILES['file_pdp'];
        $actor = Actor::getActor($id, Actor::getActors());

        if (!unlink('../uploads/actors/picture_round' . $actor['picture_round_actors'])) {
            header('Location: ../admin/modify_actor.php?id=' . $id . '&error=' . Notification::FIELD_EMPTY);
        }
        $secondUpload = new FileUpload($filePdp, __DIR__ . '/../uploads/actors/picture_round');
        $newFilenamePdp = $secondUpload->upload();
        $hasPdpUploaded = true;
    } catch (RuntimeException $e) {
        header('Location: ../admin/modify_actor.php?id=' . $id . '&error=' . Notification::FIELD_EMPTY);
        exit;
    }
}

extract($_POST);

try {
    $sql = 'UPDATE actors 
    SET first_name_actors = :first_name, 
    last_name_actors = :last_name, 
    surname_actors = :surname, 
    description_actors = :description, 
    date_birth_actors = :date_birth, 
    quote_actors = :quote,'; 
    if ($hasBioUploaded) {
        $sql .= ' picture_actors = :picture,';
    } 
    if ($hasPdpUploaded) {
        $sql .= ' picture_round_actors = :picture_round,';
    } 
    $sql .= ' status_actors = :status, 
    occupation_actors = :occupation WHERE id_actors = :id';
    $query = Database::getConnection()->prepare($sql);
    $query->bindValue('first_name', $first_name);
    $query->bindValue('last_name', $last_name);
    $query->bindValue('surname', $surname);
    $query->bindValue('description', $description);
    $query->bindValue('date_birth', $birth_date);
    $query->bindValue('quote', $quote);
    $query->bindValue('status', $status);
    $query->bindValue('occupation', $occupation);
    $query->bindValue('id', $id);
    if ($hasBioUploaded === true) {
        $query->bindValue('picture', $newFilenameBio);
    }
    if ($hasPdpUploaded === true) {
        $query->bindValue('picture_round', $newFilenamePdp);
    }
    $query->execute();
} catch (PDOException $e) {
    header('Location: ../admin/modify_actor.php?id=' . $id . '&error=' . Notification::ERROR_DATABASE);
    exit;
}

try {
    $sql = 'SELECT * FROM actors_series WHERE id_actors = :id_actors AND id_series = :id_series';
    $query = Database::getConnection()->prepare($sql);
    $query->execute([
        'id_actors' => $id,
        'id_series' => $series
    ]);
    $actors_series = $query->fetchAll();
} catch (RuntimeException $e) {
    header('Location: ../admin/modify_actor.php?id=' . $id . '&error=' . Notification::ERROR_MODIFY);
    exit;
}

try {
    $sql = 'UPDATE actors_series SET id_actors = :actors, id_series = :series WHERE id_actors_series = :id';
    $query = Database::getConnection()->prepare($sql);
    $query->execute([
        'actors' => $id,
        'series' => $series,
        'id'=> $actors_series['id_actors_series']
    ]);
} catch (RuntimeException $e) {
    header('Location: ../admin/modify_actor.php?id=' . $id . '&error=' . Notification::ERROR_MODIFY);
    exit;
}

header('Location: ../admin/upload.php?succes=' . Notification::SUCCES_MODIFY);
