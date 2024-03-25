<?php
require_once 'layout/head.php';
?>

<!-- Hero -->
<section class="">
    <div class="container-fluid p-0">
        <img src="assets/img/hero1.jpg" alt="" class="img-fluid text-center">
    </div>
</section>

<!-- informations -->
<section class="">
    <div class="container">
        <h2 class="text-center mt-4">Infos</h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="border my-4">
                    Photo
                </div>
            </div>
            <div class="col-lg-6">
                <div class="my-4">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id earum dolor eaque. Ipsa provident tempora voluptate dolorum sed! Porro alias magni aut voluptas harum commodi qui aperiam ut fugit optio.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="my-4 justify-left">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id earum dolor eaque. Ipsa provident tempora voluptate dolorum sed! Porro alias magni aut voluptas harum commodi qui aperiam ut fugit optio.
                </div>
            </div>
            <div class="col-lg-6">
                <div class="border my-4">
                    Photo
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Series -->
<section class="">
    <div class="container">
        <div class="row text-center">
            <h2 class="mt-4">Series</h2>
            <?php for ($i = 0; $i < count($series); $i++) { ?>
                <div class="col-lg-6 mt-4">
                    <div class="card text-center">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="<?php echo $series[$i]['picture_series']; ?>" class="img-fluid" />
                            <a href="serie.php?id=<?php echo $series[$i]['id_series']; ?>">
                                <div class="mask"></div>
                            </a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $series[$i]['name_series']; ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- call to action -->
<section class="primary">
    <div class="container">
        <div class="row text-center">
            <h2 class="my-4">Titre</h2>
            <div class="col-lg-12">
                <div class="border mb-4">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta molestias id doloremque praesentium consequuntur ipsa vero, expedita, modi veniam laboriosam possimus itaque inventore accusantium perferendis maiores sunt! Optio, voluptatibus inventore!
                </div>
                <div class="btn btn-primary">
                    <a href="admin/index.php" class="deco-none">Admin</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'layout/foot.php';
