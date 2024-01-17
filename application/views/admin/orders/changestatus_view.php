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
									<form action="<?= base_url("admin/order/changestatus/" . $order["order_id"]) ?>" method="post">
										<div class="form-group">
											<label for="order_status">Status Orderan</label>
											<select name="order_status" id="order_status" class="form-control">
												<?php if ($order["order_status"] == "Masuk") : ?>
													<option value="Masuk" selected>Masuk</option>
													<option value="Diproses">Diproses</option>
													<option value="Diantar">Diantarkan</option>
													<option value="Diterima">Diterima</option>
												<?php elseif ($order["order_status"] == "Diproses") : ?>
													<option value="Masuk" disabled>Masuk</option>
													<option value="Diproses" selected>Diproses</option>
													<option value="Diantar">Diantarkan</option>
													<option value="Diterima">Diterima</option>
												<?php elseif ($order["order_status"] == "Diantar") : ?>
													<option value="Masuk" disabled>Masuk</option>
													<option value="Diproses" disabled>Diproses</option>
													<option value="Diantar" selected>Diantarkan</option>
													<option value="Diterima">Diterima</option>
												<?php else : ?>
													<option value="Masuk" disabled>Masuk</option>
													<option value="Diproses" disabled>Diproses</option>
													<option value="Diantar" disabled>Diantarkan</option>
													<option value="Diterima" selected>Diterima</option>
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
