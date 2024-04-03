<?php
$title = 'Profil';
require_once 'layout/head.php';
require_once 'classes/Actor.php';

$id = $_GET['id'];
$actor = new Actor();
$actor = $actor->getActor($id, $actor->getActorsByIdSeries());

if ($actor === null) {
    http_response_code(404);
    // Template 404 => require_once
    echo "Acteur non trouvé";
    exit;
}
?>

<section class="">
    <div class="container">
        <div class="row">
            <h2 class="my-4 text-center"><?php echo $actor['first_name_actors'] . ' ' . $actor['last_name_actors']; ?></h2>
            <div class="col-lg-6 bg-secondary">
                <div class="mb-4 text-center">
                    <img src="<?php echo $actor['picture_actors']; ?>" alt="" class="mt-2 img-fluid">
                </div>
                <div class="">
                    <div>
                        <p>Nom : <?php echo $actor['last_name_actors']; ?></p>
                        <p>Prénom : <?php echo $actor['first_name_actors']; ?></p>
                        <p>Surnom : <?php echo $actor['surname_actors']; ?></p>
                        <p>Date de naissance : <?php echo $actor['date_birth_actors']; ?></p>
                    </div>
                    <div>
                        <p>Occupation : <?php echo $actor['name_occupations']; ?></p>
                        <p>État : <?php echo $actor['status_actors']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb4">
                    <p class="justify">"<?php echo $actor['quote_actors']; ?>"</p>
                    <p class="justify"><?php echo $actor['description_actors']; ?></p>

                    <p class="justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, explicabo illum ab perspiciatis in error eveniet porro beatae aliquid necessitatibus pariatur quos ducimus? Ab mollitia velit veritatis eius officiis dolores.
                        Culpa pariatur esse sit modi quas accusantium nesciunt autem officiis, praesentium labore non recusandae optio ipsam quasi tempora saepe laboriosam atque velit ad dolore quia aspernatur laudantium. Perferendis, veritatis rerum!
                        Sit quam nesciunt, cumque cupiditate officiis cum adipisci excepturi in temporibus, distinctio consectetur saepe quo perferendis facilis totam molestias similique. Enim dignissimos ducimus asperiores iure possimus assumenda fugit sit reprehenderit.
                        Provident amet eos, illum molestias et sint perferendis laborum iusto atque praesentium laudantium veniam quaerat, magnam beatae sed sit facere quo, aut officia nesciunt commodi quibusdam. Eos ullam dolorum totam.
                        Illo animi nihil, nemo modi deleniti fugit esse ex beatae recusandae error quasi nam expedita commodi quae cupiditate? Assumenda reprehenderit harum eveniet ipsa distinctio aperiam laborum tempore odit, aspernatur nulla!
                        Ab in unde molestiae molestias sed fuga? Necessitatibus voluptate rerum delectus eos similique rem accusamus repellat deserunt doloremque eius? Molestiae, doloremque? Architecto dolores sequi veniam ut, iusto natus optio rerum!
                        Dolore vitae consectetur dolorum hic, inventore eius placeat odit optio veniam ex laborum aperiam. Quibusdam nulla itaque saepe odit, sit odio nobis veniam quam hic culpa iure exercitationem consequatur vero?
                        Enim delectus accusamus, nemo eius laudantium soluta? Dolorum voluptatibus recusandae, dicta amet nesciunt, incidunt ratione maxime natus numquam harum tempore vero provident corporis exercitationem officiis assumenda. Recusandae quaerat consequatur impedit.
                        Facere beatae eaque corporis, ipsum praesentium impedit quis accusamus, obcaecati molestias repudiandae, possimus sed? Perspiciatis voluptates veritatis ut sint praesentium, nobis earum omnis dicta mollitia libero quod iure. Possimus, alias.
                        Cum ea, laborum quos tempora placeat minima assumenda nostrum esse impedit quasi libero nesciunt corrupti asperiores culpa repellat fugit ex quam, qui cupiditate adipisci neque, aut magnam velit? Quia, fuga.
                        Delectus vel quas ab, tempore voluptatum deleniti atque amet, voluptatibus, odit libero minima ut ratione repudiandae. Facilis placeat laborum aperiam nam, accusamus, minus odit atque sequi molestias exercitationem fugiat cum!
                        Numquam voluptates, quod eaque vitae fuga labore, tenetur iusto ducimus, molestiae veritatis laudantium ea accusantium! Nesciunt molestiae molestias nostrum ad sit numquam, dolore id placeat deserunt ut aliquid porro. Ab.
                        Fugiat omnis molestias voluptatum dolorem, at deleniti quasi deserunt dolorum nam, optio reprehenderit numquam exercitationem non totam, vero ut nihil nemo adipisci cum quam. Deserunt ratione voluptates cupiditate assumenda modi!
                        Cupiditate ipsa ratione delectus aliquam rerum atque iusto repellendus ut saepe neque! Eligendi aliquid rerum accusantium, corrupti, dolorum atque reprehenderit unde perferendis tempora accusamus natus optio incidunt nostrum, tempore placeat.
                        Dolores placeat asperiores aspernatur itaque, sequi eius culpa. Deserunt, nisi commodi aut atque reiciendis vitae odit consequuntur quisquam nostrum? Ipsam velit optio unde harum animi laudantium porro maxime a ea!
                        Expedita, asperiores velit voluptatibus dolorem quas obcaecati nemo, molestias doloribus ipsum enim minima blanditiis soluta, similique provident delectus possimus hic dolor corrupti atque quod. Non fugiat recusandae itaque saepe delectus.
                        Blanditiis distinctio labore recusandae, dolore dolor perspiciatis deserunt inventore. Tempore error modi maxime, quasi eaque rerum aliquid doloribus rem voluptatum debitis ut in hic, quia unde. Incidunt odio nesciunt sunt!
                        Quae, placeat voluptates! Dolores voluptatum, nobis dignissimos commodi asperiores unde quisquam, atque, suscipit accusantium quae ipsa. Qui fugiat harum soluta, minus illo, ipsum ea enim voluptate libero ullam labore optio!
                        Error animi deserunt rerum cum unde voluptas illo. Facere numquam tempora recusandae nisi unde enim, temporibus est? Similique nulla, quis fugit, a ratione reprehenderit consequatur adipisci, dolores nemo perferendis eligendi.
                        Soluta fuga recusandae porro iste eos alias sequi natus similique! Beatae sint facere sequi quam, porro adipisci vel suscipit reprehenderit blanditiis perferendis dolores </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'layout/foot.php';
