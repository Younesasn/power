<?php
require_once '../classes/Actor.php';
require_once '../classes/Serie.php';
require_once 'layout/head.php';

$actors = Actor::getActorsWithLimit(0, 20);
$series = Serie::getSeries();
$actors_series = Actor::getActorsWithoutJoin();

// var_dump($actor);
// exit;
?>
<div class="wrapper">
	<?php require_once 'layout/sidebar.php'; ?>
	<div class="main">
		<?php require_once 'layout/navbar.php'; ?>

		<main class="content">
			<div class="container-fluid p-0">

				<h1 class="h3 mb-3">Upload</h1>

				<div class="row">
					<div class="col-6">
						<div class="row">
							<div class="col-12-lg">
								<div class="card flex-fill">
									<div class="card-header">
										<h5 class="card-title mb-0">Ajouter un acteur</h5>
									</div>
									<div class="card-body">
										<form action="../process/upload_actor_process.php" method="POST" enctype="multipart/form-data" class="row">
											<div class="col-lg-6 mb-3">
												<input class="form-control" type="text" name="last_name" placeholder="Nom">
											</div>
											<div class="col-lg-6 mb-3">
												<input class="form-control" type="text" name="first_name" placeholder="Prénom">
											</div>
											<div class="col-lg-6 mb-3">
												<input class="form-control" type="text" name="surname" placeholder="Surnom">
											</div>
											<div class="col-lg-6 mb-3">
												<input id="startDate" class="form-control" type="date" name="birth_date" placeholder="Date de naisssance" />
											</div>
											<div class="col-lg-6 mb-3">
												<input class="form-control" type="text" name="quote" placeholder="Citation">
											</div>
											<div class="col-lg-6">
												<input type="text" name="occupation" class="form-control" placeholder="Occupation">
											</div>

											<div class="col-lg-12 mb-3">
												<textarea class="form-control" rows="2" name="text" placeholder="Description"></textarea>
											</div>
											<div class="col-lg-6 mb-2">
												<select class="form-select" name="status">
													<option selected>En vie</option>
													<option>Mort</option>
												</select>
											</div>

											<div class="col-lg-6 mb-2">
												<select class="form-select" name="series">
													<option selected>Choisir la série</option>
													<?php foreach ($series as $serie) { ?>
														<option value="<?php echo $serie['id_series'] ?>"><?php echo $serie['name_series'] ?></option>
													<?php } ?>
												</select>
											</div>

											<div class="col-lg-6">
												<label for="">Photo pour biographie :</label>
												<input class="form-control" type="file" name="file_bio">
											</div>
											<div class="col-lg-6">
												<label for="">Photo pour profil :</label>
												<input class="form-control" type="file" name="file_pdp">
											</div>
											<div class="col-lg-6 mt-3">
												<input type="reset" value="Effacer" class="btn btn-primary">
											</div>
											<div class="col-lg-6 mt-3 text-end">
												<input type="submit" value="Envoyez" class="btn btn-primary ">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="col-12">
							<div class="row">
								<div class="col-12-lg">
									<div class="card flex-fill">
										<div class="card-header">
											<h5 class="card-title mb-0">Ajouter une série</h5>
										</div>
										<div class="card-body">
											<form action="../process/upload_serie_process.php" method="POST" enctype="multipart/form-data" class="row">
												<div class="col-lg-6">
													<input class="form-control" type="text" name="name_series" placeholder="Nom*">
												</div>
												<div class="col-lg-6">
													<input class="form-control" type="file" name="file_series">
												</div>
												<div class="col-lg-6 mt-3">
													<input type="reset" value="Effacer" class="btn btn-primary">
												</div>
												<div class="col-lg-6 mt-3 text-end">
													<input type="submit" value="Envoyez" class="btn btn-primary ">
												</div>
												<div class="mt-3">
													<p>* Attention : veillez à respecter la syntaxe (EX : Power Book V : Influence)</p>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12">
							<div class="row">
								<div class="col-12-lg">
									<div class="card flex-fill">
										<div class="card-header">
											<h5 class="card-title mb-0">Supprimer une série</h5>
										</div>
										<div class="card-body">
											<form action="../process/delete_serie_process.php" method="POST" enctype="multipart/form-data" class="row">
												<div class="col-lg-12 mb-2">
													<select class="form-select" name="series">
														<option selected>Choisir la série</option>
														<?php foreach ($series as $serie) { ?>
															<option value="<?php echo $serie['id_series'] ?>"><?php echo $serie['name_series'] ?></option>
														<?php } ?>
													</select>
												</div>
												<div class="col-12 mt-3 text-end">
													<input type="submit" value="Supprimer" class="btn btn-primary">
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-8">
						<div class="row">
							<div class="col-lg-12 d-flex">
								<div class="card flex-fill">
									<div class="card-header">
										<h5 class="card-title mb-0">Supprimer un acteur</h5>
									</div>
									<table class="table table-hover my-0">
										<thead>
											<tr>
												<th>Acteur</th>
												<th class="d-none d-xl-table-cell">Série</th>
												<th class="d-none d-xl-table-cell">Occupation</th>
												<th class="d-none d-xl-table-cell">Date</th>
												<th>État</th>
												<th class="d-none d-md-table-cell text-center">Modifier</th>
												<th class="d-none d-md-table-cell text-center">Supprimer</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($actors as $actor) { ?>
												<tr>
													<td><?php echo $actor['first_name_actors'] . ' ' . $actor['last_name_actors'] ?></td>
													<td class="d-none d-xl-table-cell"><?php echo $actor['name_series'] ?></td>
													<td class="d-none d-xl-table-cell"><?php echo $actor['occupation_actors'] ?></td>
													<td><span class="badge bg-success"><?php echo $actor['date'] ?></span></td>
													<td class="d-none d-md-table-cell"><?php echo $actor['status_actors'] ?></td>
													<td class="d-none d-md-table-cell text-center"><a href="modify_actor.php?id=<?php echo $actor['id_actors']; ?>" title="Modifier"><i class="align-middle" data-feather="edit"></i></a></td>
													<td class="d-none d-md-table-cell text-center"><a href="../process/delete_actor_process.php?id=<?php echo $actor['id_actors']; ?>" title="Supprimer"><i class="align-middle" data-feather="x"></i></a></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-4">
						<div class="row">
							<div class="col-12-lg">
								<div class="card flex-fill">
									<div class="card-header">
										<h5 class="card-title mb-0">Ajouter un acteur dans une série</h5>
									</div>
									<div class="card-body">
										<form action="../process/actor_serie_process.php" method="POST" enctype="multipart/form-data" class="row">
											<div class="col-lg-12 mb-3">
												<select class="form-select" name="actor">
													<option selected>Choisir l'acteur</option>
													<?php foreach ($actors_series as $item) { ?>
														<option value="<?php echo $item['id_actors'] ?>"><?php echo $item['first_name_actors'] . ' ' . $item['last_name_actors']?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-lg-12 mb-3">
												<select class="form-select" name="serie">
													<option selected>Choisir la série</option>
													<?php foreach ($series as $serie) { ?>
														<option value="<?php echo $serie['id_series'] ?>"><?php echo $serie['name_series'] ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-lg-12 mt-3 text-end">
												<input type="submit" value="Ajouter" class="btn btn-primary ">
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