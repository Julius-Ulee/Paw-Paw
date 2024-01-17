<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("admin/layouts/_head"); ?>

<body>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">

			<!-- topbar -->
			<?php $this->load->view("admin/layouts/_topbar"); ?>

			<!-- sidebar -->
			<?php $this->load->view("admin/layouts/_sidebar"); ?>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Dashboard</h1>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-6 mb-4">
							<div class="card border-left-danger shadow h-80 py-2 bg-primary">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah User</div>
											<div class="h1 mb-0 font-weight-bold text-white"><?= $total_customers; ?></div>
										</div>
										<div><i class="fas fa-users"></i></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 mb-4">
							<div class="card border-left-danger shadow h-80 py-2 bg-warning">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Produk</div>
											<div class="h1 mb-0 font-weight-bold text-white"><?= $total_products; ?></div>
										</div>
										<div><i class="fas fa-shopping-bag"></i></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 mb-4">
							<div class="card border-left-danger shadow h-80 py-2 bg-danger">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Grooming</div>
											<div class="h1 mb-0 font-weight-bold text-white"><?= $total_groomings; ?></div>
										</div>
										<div><i class="far fa-file"></i></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 mb-4">
							<div class="card border-left-danger shadow h-80 py-2 bg-success">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Transaksi</div>
											<div class="h1 mb-0 font-weight-bold text-white"><?= $total_orders; ?></div>
										</div>
										<div><i class="fas fa-credit-card"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- footer -->
			<?php $this->load->view("admin/layouts/_footer"); ?>
		</div>
	</div>

	<!-- scripts -->
	<?php $this->load->view("admin/layouts/_scripts"); ?>
</body>

</html>
