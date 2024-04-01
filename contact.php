<?php
$title = 'Contact';
require_once 'layout/head.php';
?>

<section class="">
    <div class="container">
        <div class="row text-center">
            <h2 class="mt-4 mb-0">Contact</h2>
            <form action="data/contact_traitement.php" method="POST" class="row g-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="first_name" placeholder="Nom" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="last_name" placeholder="Prénom" required>
                </div>
                <div class="col-md-12">
                    <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                </div>
                <div class="col-lg-12">
                    <input type="text" class="form-control" name="object" id="inputAddress" placeholder="Objet" required>
                </div>
                <div class="col-lg-12">
                    <textarea type="text" class="form-control" name="text" id="text" placeholder="Message" style="height: 100px" required></textarea>
                </div>
                <div class="col-lg-6 text-start">
                    <input type="reset" value="Effacer" class="btn btn-primary"/>
                </div>
                <div class="col-lg-6 text-end">
                    <button type="submit" name="send" class="btn btn-primary">Envoyez</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once 'layout/foot.php';
