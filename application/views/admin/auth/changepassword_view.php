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
								<h4>Reset Password</h4>
							</div>
							<div class="card-body">
								<small><?= $this->session->userdata("reset_email"); ?></small>
								<form method="POST" action="<?= base_url("admin/auth/changepassword"); ?>">
									<div class="form-group">
										<label for="new_password" class="control-label">Password Baru</label>
										<input id="new_password" type="password" class="form-control <?= form_error('new_password') ? 'is-invalid' : ''; ?>" name="new_password" autofocus>
										<?= form_error('new_password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
									</div>
									<div class="form-group">
										<label for="new_password_confirm" class="control-label">Konfirmasi Password</label>
										<input id="new_password_confirm" type="password" class="form-control <?= form_error('new_password_confirm') ? 'is-invalid' : ''; ?>" name="new_password_confirm" autofocus>
										<?= form_error('new_password_confirm', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Reset Password
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
