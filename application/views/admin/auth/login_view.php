<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("admin/layouts/_auth/_head"); ?>

<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-6 col-lg-12 col-md-5">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="card-body" style="background-color: #F5F5DC;">
							<?= $this->session->flashdata('message'); ?>
							<div align="center">
								<img src="<?= base_url("assets/customer/img/pet-pet.png")?>" height="100px" widht="100px" alt="logo">
								<h4>Admin Login</h4>
							</div>
							<form method="POST" action="<?= base_url("admin"); ?>">
								<div class="form-group">
									<label for="email" class="control-label">Email</label>
									<input id="email" type="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" name="email" autofocus>
									<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
								</div>

								<div class="form-group">
									<div class="d-block">
										<label for="password" class="control-label">Password</label>
										<div class="float-right">
											<a href="<?= base_url("admin/auth/forgotpassword") ?>" class="text-small">
												Lupa Password?
											</a>
										</div>
									</div>
									<input id="password" type="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" name="password">
									<?= form_error('password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<?php $this->load->view("customer/layouts/_auth/_scripts"); ?>

</body>

</html>
