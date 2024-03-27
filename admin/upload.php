<?php require_once 'layout/head.php'; ?>
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
											<tr>
												<td>Project Apollo</td>
												<td class="d-none d-xl-table-cell">01/01/2023</td>
												<td class="d-none d-xl-table-cell">31/06/2023</td>
												<td><span class="badge bg-success">Done</span></td>
												<td class="d-none d-md-table-cell">Vanessa Tucker</td>
											</tr>
										</tbody>
									</table>
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