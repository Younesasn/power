<?php
require_once '../classes/Actor.php';
require_once '../classes/Serie.php';
require_once 'layout/head.php';

$actors = Actor::getActorsWithLimit();
$series = Serie::getSeries();
?>
<div class="wrapper">
	<?php require_once 'layout/sidebar.php'; ?>
	<div class="main">
		<?php require_once 'layout/navbar.php'; ?>

		<main class="content">
			<div class="container-fluid p-0">

				<h1 class="h3 mb-3">Upload</h1>

				<div class="row">
					<div class="col-12">
						<div class="row">
							<div class="col-lg-12 d-flex">
								<div class="card flex-fill">
									<div class="card-header">
										<h5 class="card-title mb-0">Latest Upload</h5>
									</div>
									<table class="table table-hover my-0">
										<thead>
											<tr>
												<th>Actors</th>
												<th class="d-none d-xl-table-cell">Series</th>
												<th class="d-none d-xl-table-cell">Occupations</th>
												<th class="d-none d-xl-table-cell">Date</th>
												<th>Status</th>
												<th class="d-none d-md-table-cell"></th>
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
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12">
						<div class="row">
							<div class="col-12-lg">
								<div class="card flex-fill">
									<div class="card-header">
										<h5 class="card-title mb-0">Ajouter un acteur</h5>
									</div>
									<div class="card-body">
										<form action="../process/upload_process.php" method="POST" enctype="multipart/form-data">
											<div>
												<label for="">Nom :</label>
												<input class="form-control" type="text" name="last_name">
											</div>
											<div>
												<label for="">Prénom :</label>
												<input class="form-control" type="text" name="first_name">
											</div>
											<div>
												<label for="">Surnom :</label>
												<input class="form-control" type="text" name="surname">
											</div>
											<div>
												<label for="">Date de naisssance :</label>
												<!-- <input class="form-control" type="text" name="birth_date"> -->
												<input id="startDate" class="form-control" type="date" name="birth_date" />
											</div>
											<div>
												<label for="">Citation</label>
												<input class="form-control" type="text" name="quote">
											</div>
											<div>
												<label for="">Description</label>
												<textarea class="form-control" rows="2" name="text"></textarea>
											</div>
											<div>
												<label for="">Occupation</label>
												<input type="text" name="occupation" class="form-control mb-3">
											</div>
											<div>
												<label for="">État :</label>
												<select class="form-select mb-3" name="status">
													<option selected>En vie</option>
													<option>Mort</option>
												</select>
											</div>
											<div>
												<label for="">Série : </label>
												<select class="form-select mb-3" name="series">
													<option selected>Choisir la série</option>
													<?php foreach ($series as $serie) { ?>
														<option value="<?php echo $serie['id_series'] ?>"><?php echo $serie['name_series'] ?></option>
													<?php } ?>
												</select>
											</div>
											<div>
												<label for="">Photo pour biographie :</label>
												<input class="form-control" type="file" name="file_bio">
											</div>
											<div>
												<label for="">Photo pour profil :</label>
												<input class="form-control" type="file" name="file_pdp">
											</div>
											<div class="">
												<input type="reset" value="Effacer" class="btn btn-primary text-start">
												<input type="submit" value="Envoyez" class="btn btn-primary text-end">
											</div>
										</form>
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