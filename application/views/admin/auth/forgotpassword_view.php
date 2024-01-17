<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("admin/layouts/_auth/_head"); ?>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<?= $this->session->flashdata('message'); ?>
						<div class="card card-primary">
							<div class="card-header">
								<h4>Lupa Password</h4>
							</div>
							<div class="card-body">
								<small>Masukkan Email Untuk Reset Passsword</small>
								<form method="POST" action="<?= base_url("admin/auth/forgotpassword"); ?>">
									<div class="form-group">
										<label for="email" class="control-label">Email</label>
										<input id="email" type="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" name="email" autofocus>
										<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Kirim Reset Password
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="simple-footer">
							Copyright &copy; Paw-Paw Petshop <?= date('Y'); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- scripts -->
	<?php $this->load->view("admin/layouts/_auth/_scripts"); ?>
</body>

</html>
