<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_home/_head"); ?>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php $this->load->view("customer/layouts/_home/_sidebar"); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php $this->load->view("customer/layouts/_home/_topbar"); ?>
				<!-- End of Topbar -->
				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Status Grooming</h1>
						<a href="<?= base_url("grooming/register") ?>" class="btn btn-primary shadow-sm"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
						Daftar Grooming Baru</a>
					</div>
					<!-- alert flashdata -->
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
					<!-- end alert flashdata -->
					<div class="card" style="border-radius: 20px; background-color: #EDEADE;">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nama Customer</th>
											<th>Jenis Peliharaan</th>
											<th>Paket Grooming</th>
											<th>Biaya Grooming</th>
											<th>Status</th>
											<th>Tanggal Masuk</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($groomings as $grooming) : ?>
											<tr>
												<td><?= $i++; ?></td>
												<td><?= $grooming["customer_name"]; ?></td>
												<td><?= $grooming["pet_type"]; ?></td>
												<td><?= $grooming["name"] ?></td>
												<td>
													<?php if ($grooming["pet_type"] == "Kucing") : ?>
														IDR. <?= number_format($grooming["cost_for_cat"]) ?>
													<?php else : ?>
														IDR. <?= number_format($grooming["cost_for_dog"]) ?>
													<?php endif; ?>
												</td>
												<td>
													<?php if ($grooming["grooming_status"] == "Didaftarkan") : ?>
														<span class="badge badge-secondary"><?= $grooming["grooming_status"] ?></span>
													<?php elseif ($grooming["grooming_status"] == "Diterima") : ?>
														<span class="badge badge-info"><?= $grooming["grooming_status"] ?></span>
													<?php elseif ($grooming["grooming_status"] == "Dikerjakan") : ?>
														<span class="badge badge-warning"><?= $grooming["grooming_status"] ?></span>
													<?php else : ?>
														<span class="badge badge-success"><?= $grooming["grooming_status"] ?></span>
													<?php endif; ?>
												</td>
												<td><?= date('d F Y', strtotime($grooming["date_created"])) ?></td>
												<td>
													<a href="<?= base_url("grooming/detail/" . $grooming["grooming_id"]) ?>" class="btn btn-info btn-sm">Detail Grooming</a>
													<!-- <a href="<?= base_url("grooming/hapus/" . $grooming["grooming_id"]) ?>" class="btn btn-danger btn-sm button-delete">Hapus</a> -->
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>



				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<?php $this->load->view("customer/layouts/_home/_footer"); ?>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>


	<?php $this->load->view("customer/layouts/_home/_scripts"); ?>
	<script>
		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			Swal.fire({
				title: 'Berhasil',
				text: 'Grooming berhasil ' + flashData,
				icon: 'success'
			});
		}

		// tombol hapus
		$('.button-delete').on('click', function(e) {

			e.preventDefault();
			const href = $(this).attr('href');

			Swal.fire({
				title: 'Kamu yakin?',
				text: "Data grooming kamu akan dihapus!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, hapus'
			}).then((result) => {
				if (result.isConfirmed) {
					document.location.href = href;
				}
			})

		})
	</script>

</body>

</html>
