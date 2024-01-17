<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
		<div class="sidebar-brand-icon">
			<i class="fas fa-cat"></i>
		</div>
		<div class="sidebar-brand-text mx-3 text-uppercase">Paw-Paw</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="<?= base_url("/") ?>">
			<i class="fas fa-fw fa-home"></i>
			<span>Home</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Menu
	</div>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url("orderan-saya"); ?>">
			<i class="fas fa-fw fa-credit-card"></i>
			<span>Orderan Saya</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url("grooming"); ?>">
			<i class="fas fa-fw fa-cat"></i>
			<span>Status Grooming</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url("customer/profile"); ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>Profile Saya</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url("logout"); ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span class="text-warning font-weight-bold">Logout</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
