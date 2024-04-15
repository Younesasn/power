<?php
$title = 'Power Universe';
require_once 'layout/head.php';
require_once 'classes/Actor.php';

if (!isset($_SESSION['search'])) {
    $_SESSION['search'] = '';
}
$actors = Actor::getActorByIdSeriesWithSearch(intval($_GET['id']), $_SESSION['search']);
if (count($actors) == 0) {
    require_once 'templates/actor_not_found.php';
    $_SESSION['search'] = '';
    exit;
}

?>

<section class="">
    <div class="container">
        <div class="row text-center">
            <?php for ($i = 0; $i < 1; $i++) {
                $_SESSION['serie'] = ['id' => $actors[$i]['id_series'], 'name' => $actors[$i]['name_series']];
            ?>
                <h2 class="my-4"><?php echo $actors[$i]['name_series']; ?></h2>
            <?php } ?>
            <?php foreach ($actors as $actor) { ?>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="uploads/actors/picture_round/<?php echo $actor['picture_round_actors']; ?>" alt="avatar" class="rounded-circle img-fluid img-thumbnail" style="width: 150px; height: 150px;">
                            <h5 class="mt-3 mb-0"><?php echo $actor['first_name_actors'] . ' ' . $actor['last_name_actors']; ?></h5>
                            <p class="text-muted mb-1"><?php echo $actor['occupation_actors']; ?></p>
                            <div class="d-flex justify-content-center mb-2 mt-3">
                                <a href="actor.php?id=<?php echo $actor['id_actors']; ?>" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php 
$_SESSION['search'] = '';
require_once 'layout/foot.php';
