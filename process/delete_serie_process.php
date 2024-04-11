<?php 

require_once "../classes/Database.php";
require_once "../classes/Notification.php";

if (!isset($_POST['series'])) {
    header('Location: ../index.php');
    exit;
}

if ($_POST['series'] == 'Choisir la série') {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_DELETE_SERIE);
    exit;
}

$id_series = $_POST['series'];

try {
    $sql = 'SELECT * FROM series WHERE id_series = :id';
    $query = Database::getConnection()->prepare($sql);
    $query->execute(['id' => $id_series]);
    $series = $query->fetch();

    unlink('../uploads/series/' . $series['picture_series']);

    $sql = 'DELETE FROM series WHERE id_series = :series';
    $query = Database::getConnection()->prepare($sql);
    $query->execute(['series' => $id_series]);
    $result = $query->fetchAll();
    header('Location: ../admin/upload.php?succes=' . Notification::DELETE_SERIE);
    exit;
} catch (PDOException $e) {
    header('Location: ../admin/upload.php?error=' . Notification::ERROR_DELETE_SERIE);
    exit;
}