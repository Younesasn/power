<?php
$title = 'Power Universe';
require_once 'layout/head.php';
?>

<section class="">
    <div class="container">
        <div class="row text-center">
            <?php for ($i = 0; $i < count($actors); $i++) {
                if ($_GET['id'] == $series[$i]['id_series']) {
            ?>
                    <h2 class="my-4"><?php echo $series[$i]['name_series']; ?></h2>
                <?php } ?>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="<?php echo $actors[$i]['picture_round_actors']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
                            <h5 class="mt-3 mb-0"><?php echo $actors[$i]['first_name_actors'] . ' ' . $actors[$i]['last_name_actors']; ?></h5>
                            <p class="text-muted mb-1"><?php echo $actors[$i]['name_occupations']; ?></p>
                            <div class="d-flex justify-content-center mb-2 mt-3">
                                <a href="actor.php?id=<?php echo $actors[$i]['id_actors']; ?>" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
</section>

<?php require_once 'layout/foot.php';
