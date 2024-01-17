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
                        <a href="<?= base_url("kelola-admin/tambah") ?>" class="btn btn-primary btn-lg">Tambah Admin</a>
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
                                                    <th>Avatar</th>
                                                    <th>Nama</th>
                                                    <th>E-mail</th>
                                                    <th>Hak Akses</th>
                                                    <th>Status Akun</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($admins as $admin) : ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td>
                                                            <img src="<?= base_url("assets/uploads/avatars/" . $admin["avatar"]) ?>" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center;">
                                                        </td>
                                                        <td><?= $admin["name"] ?></td>
                                                        <td><?= $admin["email"] ?></td>
                                                        <td><?= $admin["role"] ?></td>
                                                        <td>
                                                            <?php if ($admin["is_active"] == 1) : ?>
                                                                <span class="badge badge-success">Aktif</span>
                                                            <?php else : ?>
                                                                <span class="badge badge-danger">Nonaktif</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        
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
                text: 'Data Admin Berhasil ' + flashData,
                icon: 'success'
            });
        }

        // tombol hapus
        $('.button-delete').on('click', function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            swal({
                title: "Anda yakin?",
                text: "Data Admin akan dihapus!",
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