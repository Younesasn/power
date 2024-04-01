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
                <div class="my-4">
                    <!-- une img de 630w -->
                    <img src="http://unsplash.it/630/320?random&gravity=center" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="my-4 justify">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id earum dolor eaque. Ipsa provident tempora voluptate dolorum sed! Porro alias magni aut voluptas harum commodi qui aperiam ut fugit optio. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos, quasi at totam optio obcaecati nostrum soluta nulla est eveniet fugiat praesentium aliquam, dolor corporis neque, commodi odit dolorum officia aut!
                    Natus atque quae harum consequuntur numquam facere ab magnam illo adipisci cum esse dignissimos perspiciatis odio unde, cupiditate, nesciunt minus non, voluptatem nihil id dolorum! Eum illo id nulla pariatur!
                    Exercitationem repellat doloribus iusto obcaecati minima fuga rem accusantium repellendus nostrum blanditiis illum asperiores eos quisquam dolore amet voluptatem eius accusamus, quis tempora. Non, a consequuntur magni odio iste in.
                    Debitis aliquid impedit ullam vitae, deserunt voluptas dolorem quas modi accusamus voluptatibus eligendi
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="my-4 justify">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id earum dolor eaque. Ipsa provident tempora voluptate dolorum sed! Porro alias magni aut voluptas harum commodi qui aperiam ut fugit optio. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos, quasi at totam optio obcaecati nostrum soluta nulla est eveniet fugiat praesentium aliquam, dolor corporis neque, commodi odit dolorum officia aut!
                    Natus atque quae harum consequuntur numquam facere ab magnam illo adipisci cum esse dignissimos perspiciatis odio unde, cupiditate, nesciunt minus non, voluptatem nihil id dolorum! Eum illo id nulla pariatur!
                    Exercitationem repellat doloribus iusto obcaecati minima fuga rem accusantium repellendus nostrum blanditiis illum asperiores eos quisquam dolore amet voluptatem eius accusamus, quis tempora. Non, a consequuntur magni odio iste in.
                    Debitis aliquid impedit ullam vitae, deserunt voluptas dolorem quas modi accusamus voluptatibus eligendi
                </div>
            </div>
            <div class="col-lg-6">
                <div class="my-4">
                    <!-- une img de 630w -->
                    <img src="http://unsplash.it/630/320?random&gravity=center" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Series -->
<section class="mb-4">
    <div class="container">
        <div class="row text-center">
            <h2 class="mt-4">Series</h2>
            <?php foreach ($series as $serie) { ?>
                <div class="col-lg-6 mt-4">
                    <div class="card text-center">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="<?php echo $serie['picture_series']; ?>" class="img-fluid" />
                            <a href="serie.php?id=<?php echo $serie['id_series']; ?>">
                                <div class="mask"></div>
                            </a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $serie['name_series']; ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php require_once 'layout/foot.php';
