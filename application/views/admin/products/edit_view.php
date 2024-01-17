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
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-7 mx-auto">
											<form action="<?= base_url("kelola-produk/ubah/" . $product["item_id"]) ?>" method="post" enctype="multipart/form-data">
												<div class="form-group">
													<label for="name" class="font-weight-bold">Nama Produk</label>
													<input type="text" id="name" name="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= $product["name"]; ?>">
													<?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
												</div>
												<div class="form-group">
													<label for="slug">Slug</label>
													<input type="text" name="slug" id="slug" class="form-control" disabled value="<?= $product["slug"] ?>">
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-3">
															<label for="images">Image Saat ini</label>
															<img src="<?= base_url("assets/uploads/items/" . $product["images"]) ?>" class="img-fluid">
														</div>
														<div class="col-9 align-self-center">
															<label for="images">Images</label>
															<input type="file" id="images" name="images" class="form-control">
															<small class="text-muted">Kosongkan jika tidak ingin merubah</small>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="stock">Stok Produk</label>
													<input type="number" id="stock" name="stock" class="form-control <?= form_error('stock') ? 'is-invalid' : ''; ?>" value="<?= $product["stock"] ?>">
													<?= form_error('stock', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
												</div>
												<div class="form-group">
													<label for="price">Harga Jual</label>
													<input type="number" id="price" name="price" class="form-control <?= form_error('price') ? 'is-invalid' : ''; ?>" value="<?= $product["price"] ?>">
													<?= form_error('price', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
												</div>
												<div class="form-group">
													<label for="description">Deskripsi Produk</label>
													<textarea class="f0rm-control" name="description" id="description"><?= $product["description"] ?></textarea>
												</div>
												<div class="form-group">
													<label for="category_id">Kategori</label>
													<select name="category_id" id="category_id" class="form-control <?= form_error('category_id') ? 'is-invalid' : ''; ?>" value="<?= set_value("price") ?>">
														<option value="" disabled selected>--Pilih Kategori--</option>
														<?php foreach ($categories as $category) : ?>
															<?php if ($category["category_id"] == $product["category_id"]) : ?>
																<option value="<?= $category["category_id"]; ?>" selected><?= $category["name"]; ?></option>
															<?php else : ?>
																<option value="<?= $category["category_id"]; ?>"><?= $category["name"]; ?></option>
															<?php endif; ?>
														<?php endforeach; ?>
													</select>
													<?= form_error('category_id', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
												</div>
												<div class="form-action">
													<button type="submit" class="btn btn-primary">Update Produk</button>
													<button type="reset" class="btn btn-warning">Reset Form</button>
												</div>
											</form>
										</div>
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
</body>

</html>
