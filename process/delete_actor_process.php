<?php

require_once '../classes/Database.php';
require_once '../classes/Notification.php';
require_once '../classes/Actor.php';

if ($_GET['id'] == 0 || !isset($_GET)) {
    header('Location: ../admin/upload.php');
    exit;
}

$id = $_GET['id'];
$actor = Actor::getActor($id, Actor::getActors());

if (
    !unlink('../uploads/actors/' . $actor['picture_actors']) ||
    !unlink('../uploads/actors/picture_round/' . $actor['picture_round_actors'])
) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_DELETE_ACTOR);
    exit;
}

try {
    $sql = 'DELETE FROM actors_series WHERE id_actors = :id';
    $query = Database::getConnection()->prepare($sql);
    $query->execute(['id' => $id]);

    $sql = 'DELETE FROM actors WHERE id_actors = :id';
    $query = Database::getConnection()->prepare($sql);
    $query->execute(['id' => $id]);

    header('Location: ../admin/upload.php?succes=' . Notification::DELETE_ACTOR);
    exit;
} catch (PDOException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_DELETE_ACTOR);
}
