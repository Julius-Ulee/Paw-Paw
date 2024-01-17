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
						<a href="<?= base_url("admin/bank/addnewbank") ?>" class="btn btn-primary btn-lg">Tambah Bank</a>
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
													<th>Logo</th>
													<th>Nama Bank</th>
													<th>No Rekening</th>
													<th>Nama Pemilik</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; ?>
												<?php foreach ($banks as $bank) : ?>
													<tr>
														<td><?= $i++ ?></td>
														<td>
															<img src="<?= base_url("assets/uploads/banks/" . $bank["logo"]) ?>" style="width: 100px; height: 100px; object-fit: cover; object-position: center;">
														</td>
														<td><?= $bank["name"] ?></td>
														<td><?= $bank["number"] ?></td>
														<td><?= $bank["holder"] ?></td>
														<th>
															<a href="<?= base_url("admin/bank/editbank/" . $bank["bank_id"]) ?>" class="btn btn-icon btn-warning">
																<i class="far fa-edit"></i>
															</a>
															<a href="<?= base_url("admin/bank/deletebank/" . $bank["bank_id"]) ?>" class="btn btn-icon btn-danger button-delete">
																<i class="fas fa-trash"></i>
															</a>
														</th>
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
				text: 'Data Customer Berhasil ' + flashData,
				icon: 'success'
			});
		}

		// tombol hapus
		$('.button-delete').on('click', function(e) {

			e.preventDefault();
			const href = $(this).attr('href');

			swal({
				title: "Anda yakin?",
				text: "Data Customer akan dihapus!",
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
