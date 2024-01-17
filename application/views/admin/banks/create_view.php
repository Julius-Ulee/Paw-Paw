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
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-7 mx-auto">
											<form action="<?= base_url("admin/bank/addnewbank") ?>" method="post" enctype="multipart/form-data">
												<div class="form-group">
													<label for="name" class="font-weight-bold">Nama Bank</label>
													<input type="text" id="name" name="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= set_value("name"); ?>">
													<?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
												</div>
												<div class="form-group">
													<label for="logo">Logo Bank</label>
													<input type="file" id="logo" name="logo" class="form-control">
												</div>
												<div class="form-group">
													<label for="number">Nomor Rekening</label>
													<input type="number" id="number" name="number" class="form-control <?= form_error('number') ? 'is-invalid' : ''; ?>" value="<?= set_value("number") ?>">
													<?= form_error('number', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
												</div>
												<div class="form-group">
													<label for="holder">Nama Pemilik</label>
													<input type="text" id="holder" name="holder" class="form-control <?= form_error('holder') ? 'is-invalid' : ''; ?>" value="<?= set_value("holder") ?>">
													<?= form_error('holder', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
												</div>
												<div class="form-action">
													<button type="submit" class="btn btn-primary">Tambah Bank</button>
													<button type="reset" class="btn btn-warning">Reset Form</button>
												</div>
											</form>
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
