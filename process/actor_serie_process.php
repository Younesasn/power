<?php
require_once '../classes/Notification.php';
require_once '../classes/Database.php';

if (!isset($_POST['actor']) || !isset($_POST['serie'])) {
    header('Location: ../admin/upload.php');
    exit;
}

if ($_POST['actor'] === "Choisir l'acteur" || $_POST['serie'] === "Choisir la série") {
    header('Location: ../admin/upload.php?error=' . Notification::FIELD_EMPTY);
    exit;
}

$actor = $_POST['actor'];
$serie = $_POST['serie'];

try {
    $sql = 'INSERT INTO actors_series(id_actors, id_series) VALUES (:actors, :series)';
    $query = Database::getConnection()->prepare($sql);
    $query->execute([
        'actors' => $actor,
        'series' => $serie
    ]);
} catch (PDOException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_DATABASE);
    exit;
}

header('Location: ../admin/upload.php?succes=' . Notification::ADD_ACTOR);