<div class="main-sidebar bg-secondary sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?= base_url() ?>">Paw-Paw Petshop</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?= base_url() ?>">PP</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li>
				<a href="<?= base_url("dashboard") ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
			</li>
			<li class="menu-header">Main Menu</li>
			<li><a class="nav-link" href="<?= base_url("kelola-customer") ?>"><i class="fas fa-users"></i> <span>Kelola Customer</span></a></li>
			<?php if ($this->session->userdata("logged_in") == "admin" && $this->session->userdata("role") == "Admin") : ?>
				<li><a class="nav-link" href="<?= base_url("kelola-admin") ?>"><i class="fas fa-users"></i> <span>Admin</span></a></li>
			<?php endif; ?>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-bag"></i> <span>Kelola Items</span></a>
				<ul class="dropdown-menu">
					<li><a href="<?= base_url("kelola-kategori") ?>">Kelola Kategori</a></li>
					<li><a class="nav-link" href="<?= base_url("kelola-produk") ?>">Kelola Produk</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-cat"></i> <span>Kelola Grooming</span></a>
				<ul class="dropdown-menu">
					<li><a href="<?= base_url("paket-grooming") ?>">Kelola Paket</a></li>
					<li><a class="nav-link" href="<?= base_url("kelola-grooming") ?>">Data Grooming</a></li>
				</ul>
			</li>
			<li><a class="nav-link" href="<?= base_url("kelola-orderan") ?>"><i class="fas fa-credit-card"></i> <span>Kelola Transaksi</span></a></li>
			<li><a class="nav-link" href="<?= base_url("admin/bank") ?>"><i class="fas fa-credit-card"></i> <span>Kelola Rekening</span></a></li>
			<li><a class="nav-link" href="<?= base_url("laporan") ?>"><i class="fas fa-file"></i> <span>Laporan</span></a></li>
			<li><a class="nav-link" href="<?= base_url("admin/profile") ?>"><i class="fas fa-user-cog"></i> <span>Profile Saya</span></a></li>
			<li><a class="nav-link text-danger" href="<?= base_url("admin/logout") ?>"><i class="fas fa-sign-out-alt"></i> <span>Keluar</span></a></li>
		</ul>
	</aside>
</div>
