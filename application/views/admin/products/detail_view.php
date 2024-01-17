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
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="<?= base_url("assets/uploads/items/" . $product["images"]) ?>" class="img-fluid">
                                        </div>
                                        <div class="col-8">
                                            <h5><?= $product["name"] ?></h5>
											<div>
											<?= $product["description"] ?>
											</div>
                                            <!-- <p><?= $product["description"] ?></p> -->
                                            <h5>Harga : IDR. <?= number_format($product["price"]) ?></h5>
                                            <h5>Stok Barang : <?= $product["stock"] ?></h5>
                                            <p>Tanggal Diposting : <?= date('d F Y', strtotime($product["created_at"])) ?></p>
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
