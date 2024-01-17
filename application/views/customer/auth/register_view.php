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
						<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
									</div>
									<?= $this->session->flashdata('message'); ?>
									<form class="user" action="<?= base_url("register") ?>" method="POST">
										<div class="form-group">
											<input type="text" class="form-control form-control-user <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="Nama Lengkap" autofocus>
											<?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<div class="form-group">
											<input type="number" class="form-control form-control-user <?= form_error('phone') ? 'is-invalid' : ''; ?>" id="phone" name="phone" placeholder="Nomor Ponsel" autofocus>
											<?= form_error('phone', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user <?= form_error('address') ? 'is-invalid' : ''; ?>" id="address" name="address" placeholder="Alamat" autofocus>
											<?= form_error('address', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Masukkan E-mail..." autofocus>
											<?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
											<?= form_error('password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user <?= form_error('password_confirm') ? 'is-invalid' : ''; ?>" id="password_confirm" name="password_confirm" placeholder="Konfirmasi Password">
											<?= form_error('password_confirm', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Daftar Sekarang
										</button>
									</form>
									<hr>
									<div class="text-center">
										<span class="small">Sudah punya akun? <a href="<?= base_url("login") ?>">Login</a></span>
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
