<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("customer/layouts/_navbar"); ?>
	<!-- Page Content -->
	<div class="container mt-3">

		<div class="row">

			<div class="col-lg-3">

				<h4 class="my-4 font-weight-bold">Kategori</h4>
				<div class="list-group shadow">
					<?php foreach ($categories as $category) : ?>
						<a href="<?= base_url("kategori/" . $category["category_id"]) ?>" class="list-group-item border-0"><?= $category["name"] ?></a>
					<?php endforeach; ?>
					<a href="<?= base_url("kategori") ?>" class="list-group-item border-0 text-center text-muted">Lihat semua</a>
				</div>

			</div>
			<!-- /.col-lg-3 -->

			<div class="col-lg-9">

				<section class="some-products py-5">
					<div class="row">
						<div class="col-7">
							<h4 class="font-weight-bold"><?= $active_category["name"]; ?></h4>
							<p class="small text-muted">Berikut produk dengan kategori <?= $active_category["name"]; ?></p>
						</div>
					</div>
					<hr>
					<?php if ($products) : ?>
						<div class="row">
							<?php foreach ($products as $product) : ?>
								<div class="col-lg-4 col-md-6 mb-4">
									<div class="card h-100 shadow border-10">
										<a href="<?= base_url("produk/" . $product["slug"]) ?>"><img class="card-img-top" src="<?= base_url("assets/uploads/items/" . $product["images"]) ?>" style="height: 180px; object-fit: cover; object-position: center;"></a>
										<div class="card-body" style="background-color: #F5F5DC;">
											<h5 class="card-title">
												<a href="<?= base_url("produk/" . $product["slug"]) ?>" class="text-primary"><?= $product["name"] ?></a>
											</h5>
											<h6><span class="text-warning font-weight-bold">Rp. <?= number_format($product["price"]) ?></span>
											<span class="col-md-6 float-right text-muted">Stok : <?= $product["stock"] ?> Unit</span></h6>
										</div>
										<div class="card-footer border-top-0 bg-primary">
											<div class="action text-center">
												<a href="<?= base_url("tambah-keranjang/" . $product["item_id"]) ?>" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ffffff" d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg> Add to Cart</a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<!-- /.row -->
						<div class="text-center mb-5">
							<a href="<?= base_url("produk") ?>">Lihat semua produk</a>
						</div>
					<?php else : ?>
						<div class="alert alert-danger">
							Maaf, belum ada produk tersedia untuk saat ini.
						</div>
					<?php endif; ?>
				</section>


			</div>
			<!-- /.col-lg-9 -->

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->

	<!-- Footer -->
	<?php $this->load->view("customer/layouts/_footer"); ?>

	<?php $this->load->view("customer/layouts/_scripts"); ?>

</body>

</html>
