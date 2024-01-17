<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("customer/layouts/_navbar"); ?>
	<!-- Page Content -->
	<div class="container py-5">
		<div class="section-title">
		<div class="row">
			<div class="col">
				<div class="title-page">
					<h3 class="font-weight-bold">Kategori</h3>
					<p class="text-muted">Cari produk yang kamu cari berdasarkan kategori berikut</p>
				</div>
			</div>
		</div>
		</div>

		<hr>


		<?php if ($categories) : ?>
			<div class="row">
				<?php foreach ($categories as $category) : ?>
					<div class="col-6">
						<a href="<?= base_url("kategori/" . $category["category_id"]) ?>" class="text-decoration-none text-dark">
							<div class="card shadow border-0 mb-3" style="max-width: 240px;">
								<div class="row no-gutters">
									<div class="col-md-4">
										<img src="<?= base_url("assets/uploads/categories/" . $category["image"]) ?>" class="card-img" height="100%" width="100%" style="object-fit: cover; object-position: center;">
									</div>
									<div class="col-md-8">
										<div class="card-body" style="background-color: #F5F5DC;">
											<h5 class="card-title"><?= $category["name"] ?></h5>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div class="alert alert-danger">
				Maaf, belum ada produk yang tersedia.
			</div>
		<?php endif; ?>

	</div>
	<!-- /.container -->

	<!-- Footer -->
	<?php $this->load->view("customer/layouts/_footer"); ?>

	<?php $this->load->view("customer/layouts/_scripts"); ?>

</body>

</html>