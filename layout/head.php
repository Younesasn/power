<?php
session_start();
require_once 'classes/Serie.php';
require_once 'classes/Notification.php';

// $series = Serie::getSeries();
$series = Database::select('series');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <!-- MDBootstrap -->
    <link rel="stylesheet" href="assets/css/mdb.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- AOS Animation -->
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/mdb.umd.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? "Power Universe"; ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid my-2">
                <div class="col-lg-4">
                    <a class="navbar-brand" href="index.php">Power Universe</a>
                </div>
                <!-- Bouton Burger -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-lg-4 justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">
                                Accueil
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Series
                            </a>

                            <ul class="dropdown-menu">
                                <?php for ($i = 0; $i < count($series); $i++) { ?>
                                    <li><a class="dropdown-item" href="serie.php?id=<?php echo $series[$i]['id_series']; ?>"><?php echo $series[$i]['name_series']; ?></a></li>
                                <?php } ?>
                            </ul>

                        </li>
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link active">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse col-lg-4 justify-content-end" id="navbarNav">
                    <?php if ($_SERVER["SCRIPT_NAME"] === '/power/serie.php') { ?>
                        <div class="me-3">
                            <form class="d-flex" role="search" method="GET" action="process/search_process.php">
                                <input class="form-control me-2" name="search" type="search" placeholder="Un acteur ?" aria-label="Actor">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </form>
                        </div>
                    <?php } ?>

                    <ul class="navbar-nav">
                        <?php if (!isset($_SESSION['useradmin'])) { ?>
                            <li class="nav-item">
                                <a href="sign-up.php" class="nav-link active">
                                    Inscription
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (isset($_SESSION['useradmin'])) { ?>
                            <li class="nav-item">
                                <a href="sign-in.php" class="nav-link active">
                                    Admin
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        if (isset($_GET['error'])) {
            $errorMsg = Notification::getErrorMessage(intval($_GET['error']));
            require_once 'templates/error_notification.php';
        }

        if (isset($_GET['succes'])) {
            $succesMsg = Notification::getSuccesMessage(intval($_GET['succes']));
            require_once 'templates/succes_notification.php';
        }
        ?>
    </header>
    <main>