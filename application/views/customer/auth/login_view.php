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
						<div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Silahkan Login!</h1>
									</div>
									<?= $this->session->flashdata('message'); ?>
									<form class="user" action="<?= base_url("login") ?>" method="POST">
										<div class="form-group">
											<input type="text" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Masukkan E-mail..." autofocus>
											<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
											<?= form_error('password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck">
												<label class="custom-control-label" for="customCheck">Biarkan Masuk</label>
											</div>
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Login
										</button>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="<?= base_url("customer/auth/forgotpassword") ?>">Lupa Password?</a>
									</div>
									<div class="text-center">
										<a class="small" href="<?= base_url("register") ?>">Buat Akun Baru!</a>
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
