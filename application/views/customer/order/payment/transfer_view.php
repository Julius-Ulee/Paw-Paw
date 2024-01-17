<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("customer/layouts/_navbar"); ?>
	<!-- Page Content -->
	<div class="container py-5">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
		<div class="row pt-5">
			<div class="col text-center">
				<h2 class="font-weight-bold">Lengkapi Detail Pesanan</h2>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-sm-8 mx-auto">
				<div class="card shadow border-0 text-center text-decoration-none text-muted" style="border-radius: 20px; margin-top: 20px; background-color: #F5F5DC;">
					<div class="card-body">
						<h4 class="font-weight-bold">Transfer</h4>
						<div class="text-center">
							<p>Harap Transfer pembayaran ke rekening berikut : </p>
							<div class="card shadow border-0" style="border-radius: 20px; background-color: #F5F5DC;">
								<div class="card-body">
									<div>
										<?php foreach ($banks as $bank) : ?>
											<div class="row">
												<div class="col-sm-3">
													<img src="<?= base_url("assets/uploads/banks/" . $bank["logo"]) ?>" style="border-radius: 20px; width: 100%; height:100px; object-position: center; object-fit: cover;">
												</div>
												<div class="col-sm-8">
													<h3><?= $bank["name"] ?></h3>
													<p><?= $bank["number"] ?></p>
													<p>A/N : <?= $bank["holder"] ?></p>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<form action="<?= base_url("customer/order/transfer") ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="customer_id" value="<?= $this->session->userdata("customer_id"); ?>">
					<input type="hidden" name="total_payment" value="<?= $this->cart->total(); ?>">
					<div class="card shadow border-0 text-decoration-none text-muted" style="background-color: #F5F5DC; border-radius: 20px; margin-top: 20px;">
						<div class="card-body">
							<div class="text-center">
								<h4 class="font-weight-bold">Upload Bukti Pembayaran</h4>
							</div>
							<div class="form-group">
								<label for="payment_slip">Slip Pembayaran</label>
								<input type="file" name="payment_slip" id="payment_slip" class="form-control form-control-user <?= form_error('payment_slip') ? 'is-invalid' : ''; ?>">
								<?= form_error('payment_slip', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
						</div>
					</div>
					<div class="card shadow border-0 text-decoration-none text-muted" style="background-color: #F5F5DC; border-radius: 20px; margin-top: 20px;">
						<div class="card-body">
							<div class="text-center">
								<h4 class="font-weight-bold">Detail Pengiriman</h4>
							</div>
							<div class="form-group">
								<label for="receipent_name">Nama Penerima</label>
								<input type="text" class="form-control <?= form_error('receipent_name') ? 'is-invalid' : ''; ?>" name="receipent_name" id="receipent_name" placeholder="Nama Penerima" value="<?= $this->session->userdata("name"); ?>">
								<?= form_error('receipent_name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
							<div class="form-group">
								<label for="receipent_phone">Nomor HP Penerima</label>
								<input type="number" class="form-control <?= form_error('receipent_phone') ? 'is-invalid' : ''; ?>" name="receipent_phone" id="receipent_phone" placeholder="Nomor HP Penerima" value="<?= $this->session->userdata("phone"); ?>">
								<?= form_error('receipent_phone', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
							<div class="form-group">
								<label for="receipent_address">Alamat Penerima</label>
								<textarea name="receipent_address" id="receipent_address" rows="4" class="form-control <?= form_error('receipent_address') ? 'is-invalid' : ''; ?>"><?= $this->session->userdata("address"); ?></textarea>
								<?= form_error('receipent_address', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Order Sekarang</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div> <!-- /.container -->


	<!-- Footer -->
	<!-- <?php $this->load->view("customer/layouts/_footer"); ?> -->

	<?php $this->load->view("customer/layouts/_scripts"); ?>

</body>

</html>
