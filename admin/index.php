<?php
require_once 'layout/head.php';
require_once '../classes/Contact.php';
require_once '../classes/Actor.php';

$actors = Actor::getActorsWithLimit(0, 8);
$latestContacts = Contact::getLatestContacts();
?>
<div class="wrapper">
	<?php require_once 'layout/sidebar.php'; ?>
	<div class="main">
		<?php require_once 'layout/navbar.php'; ?>
		<main class="content">
			<div class="container-fluid p-0">

				<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

				<div class="row">
					<div class="col-xl-6 col-xxl-5 d-flex">
						<div class="w-100">
							<div class="row">
								<div class="col-sm-6">
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col mt-0">
													<h5 class="card-title">Sales</h5>
												</div>

												<div class="col-auto">
													<div class="stat text-primary">
														<i class="align-middle" data-feather="truck"></i>
													</div>
												</div>
											</div>
											<h1 class="mt-1 mb-3">2.382</h1>
											<div class="mb-0">
												<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
												<span class="text-muted">Since last week</span>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col mt-0">
													<h5 class="card-title">Visitors</h5>
												</div>

												<div class="col-auto">
													<div class="stat text-primary">
														<i class="align-middle" data-feather="users"></i>
													</div>
												</div>
											</div>
											<h1 class="mt-1 mb-3">14.212</h1>
											<div class="mb-0">
												<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
												<span class="text-muted">Since last week</span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col mt-0">
													<h5 class="card-title">Earnings</h5>
												</div>

												<div class="col-auto">
													<div class="stat text-primary">
														<i class="align-middle" data-feather="dollar-sign"></i>
													</div>
												</div>
											</div>
											<h1 class="mt-1 mb-3">$21.300</h1>
											<div class="mb-0">
												<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
												<span class="text-muted">Since last week</span>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col mt-0">
													<h5 class="card-title">Orders</h5>
												</div>

												<div class="col-auto">
													<div class="stat text-primary">
														<i class="align-middle" data-feather="shopping-cart"></i>
													</div>
												</div>
											</div>
											<h1 class="mt-1 mb-3">64</h1>
											<div class="mb-0">
												<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
												<span class="text-muted">Since last week</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-6 col-xxl-7">
						<div class="card flex-fill w-100">
							<div class="card-header">

								<h5 class="card-title mb-0">Messages récents</h5>
							</div>
							<div class="card-body py-3">
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Last Name</th>
											<th class="d-none d-xl-table-cell">First Name</th>
											<th class="d-none d-xl-table-cell">E-mail</th>
											<th class="d-none d-xl-table-cell">Date</th>
											<th>Object</th>
											<th class="d-none d-md-table-cell"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($latestContacts as $contact) { ?>
											<tr>
												<td><?php echo $contact['last_name_contacts']; ?></td>
												<td class="d-none d-xl-table-cell"><?php echo $contact['first_name_contacts']; ?></td>
												<td class="d-none d-xl-table-cell"><?php echo $contact['email_contacts']; ?></td>
												<td><span class="badge text-bg-secondary"><?php echo $contact['date']; ?></span></td>
												<td class="d-none d-xl-table-cell"><?php echo $contact['object_contacts']; ?></td>
												<th class="d-none d-md-table-cell"><a href="messages.php?id=<?php echo $contact['id_contacts']; ?>"><i class="align-middle" data-feather="arrow-right"></i></a></th>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
						<div class="card flex-fill w-100">
							<div class="card-header">

								<h5 class="card-title mb-0">Browser Usage</h5>
							</div>
							<div class="card-body d-flex">
								<div class="align-self-center w-100">
									<div class="py-3">
										<div class="chart chart-xs">
											<canvas id="chartjs-dashboard-pie"></canvas>
										</div>
									</div>

									<table class="table mb-0">
										<tbody>
											<tr>
												<td>Chrome</td>
												<td class="text-end">4306</td>
											</tr>
											<tr>
												<td>Firefox</td>
												<td class="text-end">3801</td>
											</tr>
											<tr>
												<td>IE</td>
												<td class="text-end">1689</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-8 col-xxl-9 d-flex">
						<div class="card flex-fill">
							<div class="card-header">

								<h5 class="card-title mb-0">Derniers acteurs</h5>
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
				<div class="row">
					<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
						<div class="card flex-fill w-100">
							<div class="card-header">

								<h5 class="card-title mb-0">Real-Time</h5>
							</div>
							<div class="card-body px-4">
								<div id="world_map" style="height:350px;"></div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
						<div class="card flex-fill">
							<div class="card-header">

								<h5 class="card-title mb-0">Calendar</h5>
							</div>
							<div class="card-body d-flex">
								<div class="align-self-center w-100">
									<div class="chart">
										<div id="datetimepicker-dashboard"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4 col-xxl-3 d-flex">
						<div class="card flex-fill w-100">
							<div class="card-header">

								<h5 class="card-title mb-0">Monthly Sales</h5>
							</div>
							<div class="card-body d-flex w-100">
								<div class="align-self-center chart chart-lg">
									<canvas id="chartjs-dashboard-bar"></canvas>
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

<?php require_once 'layout/script-index.php'; ?>


</body>

</html>