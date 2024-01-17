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
                        <h1 class="h3 mb-0 text-gray-800">Detail Grooming</h1>
                    </div>
                    <!-- alert flashdata -->
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <!-- end alert flashdata -->
                    <div class="card" style="border-radius: 20px; background-color: #EDEADE;">
                        <div class="card-body">
                            <b>Nama Customer</b>
                            <p><?= $grooming["customer_name"]; ?></p>
                            <b>Nomor Ponsel Customer</b>
                            <p><?= $grooming["customer_phone"]; ?></p>
                            <b>Alamat Customer</b>
                            <p><?= $grooming["customer_address"]; ?></p>
                            <b>Jenis Peliharaan</b>
                            <p><?= $grooming["pet_type"]; ?></p>
                            <b>Tarif Grooming</b>
                            <p>
                                <?php if ($grooming["pet_type"] == "Kucing") : ?>
                                    IDR. <?= number_format($grooming["cost_for_cat"]) ?>
                                <?php else : ?>
                                    IDR. <?= number_format($grooming["cost_for_dog"]) ?>
                                <?php endif; ?>
                            </p>
                            <b>Status Grooming</b>
                            <p>
                                <?php if ($grooming["grooming_status"] == "Didaftarkan") : ?>
                                    <span class="badge badge-secondary"><?= $grooming["grooming_status"] ?></span>
                                <?php elseif ($grooming["grooming_status"] == "Diterima") : ?>
                                    <span class="badge badge-info"><?= $grooming["grooming_status"] ?></span>
                                <?php elseif ($grooming["grooming_status"] == "Dikerjakan") : ?>
                                    <span class="badge badge-warning"><?= $grooming["grooming_status"] ?></span>
                                <?php else : ?>
                                    <span class="badge badge-success"><?= $grooming["grooming_status"] ?></span>
                                <?php endif; ?>
                            </p>
                            <b>Jenis Paket Grooming</b>
                            <p><?= $grooming["name"]; ?></p>
                            <b>Catatan Customer</b>
                            <p><?= $grooming["notes"] ?></p>
                            <b>Tanggal Masuk</b>
                            <p><?= date('d F Y', strtotime($grooming["date_created"])); ?></p>
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

</body>

</html>