<?php require_once 'layout/head.php'; ?>
<main class="d-flex w-100">
	<div class="container d-flex flex-column">
		<div class="row">
			<div class="col-lg-10 mx-auto d-table h-100">
				<div class="d-table-cell align-middle">

					<div class="text-center mt-4">
						<h1 class="h2">Get started</h1>
						<p class="lead">
							Start creating the best possible user experience for you customers.
						</p>
					</div>

					<div class="card">
						<div class="card-body">
							<div class="m-sm-3">
								<form method="POST" action="process/signup_process.php">
									<div class="row">
										<div class="mb-3 col-lg-6">
											<label class="form-label">First name</label>
											<input class="form-control form-control-lg" type="text" name="first_name" placeholder="Enter your name" />
										</div>
										<div class="mb-3 col-lg-6">
											<label class="form-label">Last name</label>
											<input class="form-control form-control-lg" type="text" name="last_name" placeholder="Enter your name" />
										</div>
									</div>
									<div class="mb-3">	
										<label class="form-label">Email</label>
										<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
									</div>
									<div class="mb-3">
										<label class="form-label">Password</label>
										<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
									</div>
									<div class="d-grid gap-2 mt-3">
										<input type="submit" name="send" value="Sign Up" class="btn btn-lg btn-primary">
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

<script src="assets/js/app.js"></script>

</body>

</html>