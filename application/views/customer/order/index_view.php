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
				<h2 class="font-weight-bold">Pilih Metode Pembayaran</h2>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-sm-8 mx-auto">
				<a href="<?= base_url("customer/order/transfer") ?>">
					<div class="card shadow border-0 text-center text-decoration-none text-muted" style="border-radius: 20px; margin-top: 20px; background-color: #F5F5DC;">
						<div class="card-body">
							<h3><img src="<?= base_url("assets/customer/img/money.png")?>" height="50px">Transfer</h3>
						</div>
					</div>
				</a>
				<a href="<?= base_url("customer/order/cod") ?>">
					<div class="card shadow border-0 text-center text-decoration-none text-muted" style="border-radius: 20px; margin-top: 20px; background-color: #F5F5DC;">
						<div class="card-body">
							<h3><img src="<?= base_url("assets/customer/img/cod.png")?>" height="50px">Bayar di tempat</h3>
						</div>
					</div>
				</a>
			</div>
		</div>

	</div> <!-- /.container -->

	<!-- Footer -->
	<!-- <?php $this->load->view("customer/layouts/_footer"); ?> -->

	<?php $this->load->view("customer/layouts/_scripts"); ?>

</body>

</html>
