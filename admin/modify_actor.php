<?php
require_once 'layout/head.php';
require_once '../classes/Serie.php';
require_once '../classes/Actor.php';

$id = $_GET['id'];
$actor = Actor::getActor($id, Actor::getActors());
$series = Serie::getSeries();

if ($actor === null) {
    http_response_code(404);
    // Template 404 => require_once
    echo "Acteur non trouvé";
    exit;
}
?>
<div class="wrapper">
    <?php require_once 'layout/sidebar.php'; ?>
    <div class="main">
        <?php require_once 'layout/navbar.php'; ?>

        <main class="content">
            <div class="container-fluid p-0">
                <div class="mb-2">
                    <a href="upload.php" class="mb-2"><i class="align-middle" data-feather="arrow-left"></i>Retour à l'upload</a>
                </div>

                <h1 class="h3 mb-3">Modifier l'acteur</h1>

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-12 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Modifier</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="../process/modify_actor_process.php" method="POST" enctype="multipart/form-data" class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label for="" class="mb-1">Nom :</label>
                                                <input class="form-control" type="text" name="last_name" placeholder="Nom" value="<?php echo $actor['last_name_actors'] ?>">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                            <label for="" class="mb-1">Prénom :</label>
                                                <input class="form-control" type="text" name="first_name" placeholder="Prénom" value="<?php echo $actor['first_name_actors'] ?>">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                            <label for="" class="mb-1">Surnom :</label>
                                                <input class="form-control" type="text" name="surname" placeholder="Surnom" value="<?php echo $actor['surname_actors'] ?>">
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                            <label for="" class="mb-1">Date de naissance :</label>
                                                <input id="startDate" class="form-control" type="date" name="birth_date" placeholder="Date de naisssance" value="<?php echo $actor['date_birth_actors'] ?>" />
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                            <label for="" class="mb-1">Citation :</label>
                                                <input class="form-control" type="text" name="quote" placeholder="Citation" value="<?php echo $actor['quote_actors'] ?>">
                                            </div>
                                            <div class="col-lg-6">
                                            <label for="" class="mb-1">Occupation :</label>
                                                <input type="text" name="occupation" class="form-control" placeholder="Occupation" value="<?php echo $actor['occupation_actors'] ?>">
                                            </div>

                                            <div class="col-lg-12 mb-3">
                                            <label for="" class="mb-1">Description :</label>
                                                <textarea name="description" cols="30" rows="10" class="form-control" ><?php echo $actor['description_actors'] ?></textarea>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <select class="form-select" name="status">
                                                    <option selected>En vie</option>
                                                    <option>Mort</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <select class="form-select" name="series">
                                                    <option>Choisir la série</option>
                                                    <?php foreach ($series as $serie) { ?>
                                                        <option <?php  ?> value="<?php echo $serie['id_series'] ?>"><?php echo $serie['name_series'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="mb-1">Photo pour biographie :</label>
                                                <input class="form-control" type="file" name="file_bio">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="" class="mb-1">Photo pour profil :</label>
                                                <input class="form-control" type="file" name="file_pdp">
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $actor['id_actors']?>">
                                            <div class="col-12 mt-3 text-end">
                                                <input type="submit" value="Envoyez" class="btn btn-primary ">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="assets/js/app.js"></script>

</body>

</html>