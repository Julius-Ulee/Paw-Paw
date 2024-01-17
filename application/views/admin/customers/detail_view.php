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
					<div class="section-header d-flex justify-content-between">
						<h1><?= $page_title; ?></h1>
					</div>
					<!-- alert flashdata -->
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
					<!-- end alert flashdata -->
					<div class="row">
						<div class="col-6">
							<div class="card">
								<div class="card-body">
									<h5>Profil Customer</h5>
									<hr>
									<div class="row">
										<div class="col-3">
											<img src="<?= base_url("assets/uploads/avatars/" . $customer["avatar"]) ?>" class="img-fluid">
										</div>
										<div class="col-9">
											<b>Nama Customer :</b>
											<p><?= $customer["name"] ?></p>
											<b>Nomor HP</b>
											<p><?= $customer["phone"] ?></p>
											<b>Alamat Customer</b>
											<p><?= $customer["address"] ?></p>
											<b>E-mail Customer</b>
											<p><?= $customer["email"] ?></p>
											<b>Status Akun</b>
											<p>
												<?php if ($customer["is_active"] == 1) : ?>
													<span class="badge badge-success">Aktif</span>
												<?php else : ?>
													<span class="badge badge-danger">Nonaktif</span>
												<?php endif; ?>
											</p>
											<b>Bergabung Pada</b>
											<p><?= date('d F Y', strtotime($customer["created_at"])) ?></p>
										</div>
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
