<?php 
require_once 'layout/head.php'; 

if(isset($_SESSION['useradmin'])) {
	header('Location: admin/index.php');
}
?>
<main class="d-flex w-100">
	<div class="container d-flex flex-column">
		<div class="row">
			<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
				<div class="d-table-cell align-middle">

					<div class="text-center mt-4">
						<h1 class="h2">Welcome back!</h1>
						<p class="lead">
							Sign in to your account to continue
						</p>
					</div>

					<div class="card">
						<div class="card-body">
							<div class="m-sm-3">
								<form method="POST" action="process/admin_process.php">
									<div class="mb-3">
										<label class="form-label">User Admin</label>
										<input class="form-control form-control-lg" type="text" id="useradmin" name="useradmin" placeholder="Enter your user admin" />
									</div>
									<div class="mb-3">
										<label class="form-label">Password</label>
										<input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Enter your password" />
									</div>
									<div class="d-grid gap-2 mt-3">
										<input type="submit" name="send" value="Sign In" class="btn btn-lg btn-primary">
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