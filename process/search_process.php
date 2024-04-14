<?php 
session_start();
require_once "../classes/Serie.php";
require_once "../classes/Notification.php";

if (!isset($_GET["search"]) || empty($_GET['search'])) {
    header('Location: ../serie.php?id='. $_SESSION['serie']['id']);
}

$_SESSION['search'] = $_GET['search'];
header('Location: ../serie.php?id='. $_SESSION['serie']['id']);