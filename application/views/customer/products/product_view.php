<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("customer/layouts/_head"); ?>

<body>

	<!-- Navigation -->
	<?php $this->load->view("customer/layouts/_navbar"); ?>
	<!-- Page Content -->

	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

	<div class="container py-5">

		<div class="row">
			<div class="col">
				<div class="section-title">
					<h3 class="font-weight-bold">Katalog Product</h3>
					<p class="text-muted">Check out our beautifull product</p>
				</div>
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

		<?php else : ?>
			<div class="alert alert-danger">
				Maaf, Data tidak tersedia.
			</div>
		<?php endif; ?>

	</div>
	<!-- /.container -->

	<section class="categories-section bg-light py-5">
		<div class="section-title">
		<div class="container">
			<h3 class="font-weight-bold">Category Product</h3>
			<p class="text-muted">Find the item you want easily from the following categories.</p>
			<hr>
			<?php if ($categories) : ?>
				<div class="row">
					<?php foreach ($categories as $category) : ?>
						<div class="col-sm-3">
							<a href="<?= base_url("kategori/" . $category["category_id"]) ?>">
								<figure class="figure">
									<img src="<?= base_url("assets/uploads/categories/" . $category["image"]) ?>" class="figure-img img-fluid rounded" alt="...">
									<figcaption class="figure-caption text-center font-weight-bold"><?= $category["name"] ?></figcaption>
								</figure>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="text-center">
					<a href="<?= base_url("kategori") ?>">Lihat semua Kategori</a>
				</div>
			<?php else : ?>
				<div class="alert alert-danger">
					Maaf, belum ada kategori yang tersedia
				</div>
			<?php endif; ?>

		</div>
		</div>
	</section>

	<!-- Footer -->
	<?php $this->load->view("customer/layouts/_footer"); ?>

	<?php $this->load->view("customer/layouts/_scripts"); ?>
	<script>
		const flashData = $('.flash-data').data('flashdata');
		if (flashData) {
			Swal.fire({
				title: 'Yeaayy!!!',
				text: 'Item berhasil ' + flashData,
				icon: 'success'
			});
		}
	</script>

</body>

</html>
