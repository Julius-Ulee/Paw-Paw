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
                                            <form action="<?= base_url("kelola-produk/tambah") ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="name" class="font-weight-bold">Nama Produk</label>
                                                    <input type="text" id="name" name="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= set_value("name"); ?>">
                                                    <?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="images">Images</label>
                                                    <input type="file" id="images" name="images" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="stock">Stok Produk</label>
                                                    <input type="number" id="stock" name="stock" class="form-control <?= form_error('stock') ? 'is-invalid' : ''; ?>" value="<?= set_value("stock") ?>">
                                                    <?= form_error('stock', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Harga Jual</label>
                                                    <input type="number" id="price" name="price" class="form-control <?= form_error('price') ? 'is-invalid' : ''; ?>" value="<?= set_value("price") ?>">
                                                    <?= form_error('price', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Deskripsi Produk</label>
                                                    <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_id">Kategori</label>
                                                    <select name="category_id" id="category_id" class="form-control <?= form_error('category_id') ? 'is-invalid' : ''; ?>" value="<?= set_value("price") ?>">
                                                        <option value="" disabled selected>--Pilih Kategori--</option>
                                                        <?php foreach ($categories as $category) : ?>
                                                            <option value="<?= $category["category_id"] ?>"><?= $category["name"] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?= form_error('category_id', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-action">
                                                    <button type="submit" class="btn btn-primary">Tambah Produk</button>
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
