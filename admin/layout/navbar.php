<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle js-sidebar-toggle">
		<i class="hamburger align-self-center"></i>
	</a>
	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">
			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
					<i class="align-middle" data-feather="settings"></i>
				</a>

				<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
					<span class="text-dark">Admin</span>
				</a>
				<div class="dropdown-menu dropdown-menu-end">
					<a class="dropdown-item" href="../process/logout.php">Log out</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
<?php
require_once '../classes/Notification.php';

if (isset($_GET['error'])) {
	$errorMsg = Notification::getErrorMessage(intval($_GET['error']));
	require_once '../templates/error_notification.php';
}

if (isset($_GET['succes'])) {
	$succesMsg = Notification::getSuccesMessage(intval($_GET['succes']));
	require_once '../templates/succes_notification.php';
}
