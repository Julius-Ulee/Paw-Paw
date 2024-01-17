<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_auth/_head"); ?>

<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-6 col-lg-12 col-md-5">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
										<p>
											<small><?= $this->session->userdata("reset_email"); ?></small>
										</p>
									</div>
									<?= $this->session->flashdata('message'); ?>
									<form class="user" action="<?= base_url("customer/auth/changepassword") ?>" method="POST">
										<div class="form-group">
											<input type="password" class="form-control form-control-user <?= form_error('new_password') ? 'is-invalid' : ''; ?>" id="new_password" name="new_password" placeholder="Password Baru..." autofocus>
											<?= form_error('new_password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user <?= form_error('new_password_confirm') ? 'is-invalid' : ''; ?>" id="new_password_confirm" name="new_password_confirm" placeholder="Konfirmaasi Password..." autofocus>
											<?= form_error('new_password_confirm', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Ganti Password
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<?php $this->load->view("customer/layouts/_auth/_scripts"); ?>

</body>

</html>
