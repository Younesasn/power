<?php
require_once 'layout/head.php';
require_once 'data/query.php';
?>
<div class="wrapper">
	<?php require_once 'layout/sidebar.php'; ?>
	<div class="main">
		<?php require_once 'layout/navbar.php'; ?>

		<main class="content">
			<div class="container-fluid p-0">
				<h1 class="h3 mb-3">Messenger</h1>
				<div class="row">
					<div class="col-12">
						<div class="row">
							<div class="col-lg-12 d-flex">
								<div class="card flex-fill">
									<div class="card-header">
										<h5 class="card-title mb-0">Latest Messages</h5>
									</div>
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
											<?php foreach ($contacts as $contact) { ?>
												<tr>
													<td><?php echo $contact['last_name_contacts']; ?></td>
													<td class="d-none d-xl-table-cell"><?php echo $contact['first_name_contacts']; ?></td>
													<td class="d-none d-xl-table-cell"><?php echo $contact['email_contacts']; ?></td>
													<td><span class="badge bg-success"><?php echo $contact['date']; ?></span></td>
													<td class="d-none d-xl-table-cell"><?php echo $contact['object_contacts']; ?></td>
													<th class="d-none d-md-table-cell"></th>
												</tr>
											<?php } ?>
										</tbody>
									</table>
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