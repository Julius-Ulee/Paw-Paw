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
						<div class="col-8">
							<div class="card">
								<div class="card-body">
									<form action="<?= base_url("admin/grooming/changestatus/" . $grooming["grooming_id"]) ?>" method="post">
										<div class="form-group">
											<label for="grooming_status">Status Grooming</label>
											<select name="grooming_status" id="grooming_status" class="form-control">
												<?php if ($grooming["grooming_status"] == "Didaftarkan") : ?>
													<option value="Didaftarkan" selected>Didaftarkan</option>
													<option value="Diterima">Diterima</option>
													<option value="Dikerjakan">Dikerjakan</option>
													<option value="Selesai">Selesai</option>
												<?php elseif ($grooming["grooming_status"] == "Diterima") : ?>
													<option value="Didaftarkan" disabled>Didaftarkan</option>
													<option value="Diterima" selected>Diterima</option>
													<option value="Dikerjakan">Dikerjakan</option>
													<option value="Selesai">Selesai</option>
												<?php elseif ($grooming["grooming_status"] == "Dikerjakan") : ?>
													<option value="Didaftarkan" disabled>Didaftarkan</option>
													<option value="Diterima" disabled>Diterima</option>
													<option value="Dikerjakan" selected>Dikerjakan</option>
													<option value="Selesai">Selesai</option>
												<?php else : ?>
													<option value="Didaftarkan" disabled>Didaftarkan</option>
													<option value="Diterima" disabled>Diterima</option>
													<option value="Dikerjakan" disabled>Dikerjakan</option>
													<option value="Selesai" selected>Selesai</option>
												<?php endif; ?>
											</select>
										</div>
										<div class="form-action">
											<button type="submit" class="btn btn-primary">Ubah Status</button>
											<a href="<?= base_url("kelola-grooming") ?>" class="btn btn-warning">Kembali</a>
										</div>
									</form>
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
