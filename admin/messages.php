<?php
require_once 'layout/head.php';
require_once 'classes/Contact.php';

$id = $_GET['id'];

$message = new Contact();
$message = $message->getMessages($id, $message->getcontacts());

if ($message === null) {
    http_response_code(404);
    // Template 404 => require_once
    echo "Message non trouvé";
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
                    <a href="messagerie.php"><i class="align-middle" data-feather="arrow-left"></i>Retour à la liste</a>
                </div>
                <h1 class="h3 mb-3">Messages</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-12 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <div class="row">
                                            <h5 class="col-10 card-title mb-0">Messages</h5>
                                            <div class="col-2 text-end">
                                                <span class="badge text-bg-secondary"><?php echo $message['date']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header border-top">
                                        <h4 class="mb-2">Nom : <?php echo $message['first_name_contacts'] . ' ' . $message['last_name_contacts']; ?></h4>
                                        <h4>Email : <?php echo $message['email_contacts'] ?></h4>
                                    </div>
                                    <div class="card-body border-top">
                                        <h4 class="m-0">Objet : <?php echo $message['object_contacts']; ?></h4>
                                    </div>
                                    <div class="card-body border-top">
                                        <h3 class="m-0 card-title">Message :</h3>
                                        <div>
                                            <?php echo $message['text_contacts']; ?>
                                        </div>
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