<?php 
session_start();
if (!isset($_SESSION['useradmin']) && !isset($_SESSION['password'])) {
	header('Location: ../sign-in.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="You-Dev">

	<title>Power Admin</title>

	<link href="assets/css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>