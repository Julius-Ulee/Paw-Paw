<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("admin/layouts/_head"); ?>
<link rel="stylesheet" href="<?= base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
<script src="<?= base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->

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
                    <div class="section-header">
                        <h1>Laporan</h1>
                    </div>
                    <!-- alert flashdata -->
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <!-- end alert flashdata -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 mx-auto">
                                    <form action="<?= base_url("laporan/filter") ?>" method="GET">
                                        <div class="form-group">
                                            <label for="reports">Jenis Laporan</label>
                                            <select name="reports" id="reports" class="form-control">
                                                <option value="" disabled selected>Pilih Jenis Laporan</option>
                                                <option value="1">Penjualan</option>
                                                <option value="2">Grooming</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="filter">Filter Berdasarkan</label>
                                            <select name="filter" id="filter" class="form-control">
                                                <option value="" disabled selected>Filter Laporan</option>
                                                <option value="1">Bulan</option>
                                                <option value="2">Tahun</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="form-bulan">
                                            <label for="month">Bulan</label>
                                            <select name="month" id="month" class="form-control">
                                                <option value="" disabled selected>Pilih Bulan</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                        <div class="" id="form-tahun">
                                            <label for="years">Tahun</label>
                                            <select name="years" id="years" class="form-control">
                                                <option value="" disabled selected>Pilih Tahun</option>
                                                <?php foreach ($option_tahun as $year) : ?>
                                                    <option value="<?= $year["tahun"]; ?>"><?= $year["tahun"] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <hr>
                                        <div class="form-action">
                                            <button type="submit" class="btn btn-primary btn-block">Buat Laporan</button>
                                        </div>
                                    </form>
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
    <script src="<?= base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
        const flashData = $('.flash-data').data('flashdata');
        if (flashData) {
            swal({
                title: 'Gagal',
                text: flashData,
                icon: 'error'
            });
        }

        $(document).ready(function() { // Ketika halaman selesai di load

            $('#form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
            $('#filter').change(function() { // Ketika user memilih filter
                if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                    $('#form-bulan').show(); // Tampilkan form tanggal
                    $('#form-tahun').show(); // Sembunyikan form bulan dan tahun
                } else { // Jika filternya 3 (per tahun)
                    $('#form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                    $('#form-tahun').show(); // Tampilkan form tahun
                }

                $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
            })
        })
    </script>
</body>

</html>