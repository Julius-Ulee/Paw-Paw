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
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped" id="table-1">
											<thead>
												<tr>
													<th>No.</th>
													<th>Tanggal</th>
													<th>Nama Penerima</th>
													<th>Alamat COD</th>
													<th>Total Pembayaran</th>
													<th>Status Orderan</th>
													<th>Informasi</th>
													<th>Slip Pembayaran</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php foreach ($orders as $order) : ?>
													<tr>
														<td><?= $i++ ?></td>
														<td><?= date('d F Y', strtotime($order["order_date"])) ?></td>
														<td><?= $order["receipent_name"] ?></td>
														<td><?= $order["receipent_address"] ?></td>
														<td>Rp. <?= number_format($order["total_payment"]) ?></td>
														<td>
															<?php if ($order["order_status"] == "Masuk") : ?>
																<a href="<?= base_url("admin/order/changestatus/" . $order["order_id"]) ?>" class="badge badge-info"><?= $order["order_status"] ?></a>
															<?php elseif ($order["order_status"] == "Diproses") : ?>
																<a href="<?= base_url("admin/order/changestatus/" . $order["order_id"]) ?>" class="badge badge-warning"><?= $order["order_status"] ?></a>
															<?php elseif ($order["order_status"] == "Diantar") : ?>
																<a href="<?= base_url("admin/order/changestatus/" . $order["order_id"]) ?>" class="badge badge-primary"><?= $order["order_status"] ?></a>
															<?php else : ?>
																<a href="<?= base_url("admin/order/changestatus/" . $order["order_id"]) ?>" class="badge badge-success"><?= $order["order_status"] ?></a>
															<?php endif; ?>
														</td>
														<td>
															<?php if ($order["info"] == "Lunas") : ?>
																<span class="badge badge-success"><?= $order["info"] ?></span>
															<?php else : ?>
																<span class="badge badge-warning"><?= $order["info"] ?></span>
															<?php endif; ?>
														</td>
														<td>
															<?php if ($order["info"] == "Lunas") : ?>
																<img src="<?= base_url("assets/uploads/payments/" . $order["payment_slip"]) ?>" width="200">
															<?php else : ?>
																-
															<?php endif; ?>
														</td>
														<td>
															<a href="<?= base_url("kelola-orderan/detail/" . $order["order_id"]) ?>" class="btn btn-icon btn-info">
																<i class="far fa-eye"></i>
															</a>
															<a href="<?= base_url("kelola-orderan/hapus/" . $order["order_id"]) ?>" class="btn btn-icon btn-danger button-delete">
																<i class="fas fa-trash"></i>
															</a>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
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
	<!-- specified scripts -->
	<script>
		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			swal({
				title: 'Berhasil',
				text: 'Status Grooming Berhasil ' + flashData,
				icon: 'success'
			});
		}

		// tombol hapus
		$('.button-delete').on('click', function(e) {

			e.preventDefault();
			const href = $(this).attr('href');

			swal({
				title: "Anda yakin?",
				text: "Data Admin akan dihapus!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((result) => {
				if (result) {
					document.location.href = href;
				}
			})

		})
	</script>
</body>

</html>
