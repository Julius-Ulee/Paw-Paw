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
													<th>Nama Customer</th>
													<th>Jenis Peliharaan</th>
													<th>Paket</th>
													<th>Biaya</th>
													<th>Status</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php foreach ($groomings as $grooming) : ?>
													<tr>
														<td><?= $i++ ?></td>
														<td><?= date('d F Y', strtotime($grooming["date_created"])) ?></td>
														<td><?= $grooming["customer_name"] ?></td>
														<td><?= $grooming["pet_type"] ?></td>
														<td><?= $grooming["name"] ?></td>
														<td> IDR.
															<?php if ($grooming["pet_type"] == "Kucing") : ?>
																<?= $grooming["cost_for_cat"] ?>
															<?php else : ?>
																<?= $grooming["cost_for_dog"] ?>
															<?php endif; ?>
														</td>
														<td>
															<a href="<?= base_url("admin/grooming/changestatus/" . $grooming["grooming_id"]) ?>">
																<?php if ($grooming["grooming_status"] == "Didaftarkan") : ?>
																	<span class="badge badge-secondary"><?= $grooming["grooming_status"] ?></span>
																<?php elseif ($grooming["grooming_status"] == "Diterima") : ?>
																	<span class="badge badge-info"><?= $grooming["grooming_status"] ?></span>
																<?php elseif ($grooming["grooming_status"] == "Dikerjakan") : ?>
																	<span class="badge badge-warning"><?= $grooming["grooming_status"] ?></span>
																<?php else : ?>
																	<span class="badge badge-success"><?= $grooming["grooming_status"] ?></span>
																<?php endif; ?>
															</a>
														</td>
														<td>
															<a href="<?= base_url("kelola-grooming/detail/" . $grooming["grooming_id"]) ?>" class="btn btn-icon btn-info">
																<i class="far fa-eye"></i>
															</a>
															<a href="<?= base_url("kelola-grooming/hapus/" . $grooming["grooming_id"]) ?>" class="btn btn-icon btn-danger button-delete">
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
