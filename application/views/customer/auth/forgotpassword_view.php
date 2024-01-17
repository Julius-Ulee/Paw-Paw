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
						<div class="row" style="background-color: #F5F5DC;">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Lupa Password</h1>
										<p>Masukkan Email kamu untuk melakukan reset password</p>
									</div>
									<?= $this->session->flashdata('message'); ?>
									<form class="user" action="<?= base_url("customer/auth/forgotpassword") ?>" method="POST">
										<div class="form-group">
											<input type="text" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Masukkan E-mail..." autofocus>
											<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Kirim Link Reset Password
										</button>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="<?= base_url("login") ?>">Kembali Ke Login?</a>
									</div>
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
