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
                                            <form action="<?= base_url("kelola-admin/ubah/" . $admin["admin_id"]) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="name" class="font-weight-bold">Nama</label>
                                                    <input type="text" id="name" name="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= $admin["name"] ?>">
                                                    <?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <img src="<?= base_url("assets/uploads/avatars/" . $admin["avatar"]) ?>" width="100%">
                                                        </div>
                                                        <div class="col-9 align-self-center">
                                                            <label for="avatar">Avatar</label>
                                                            <input type="file" id="avatar" name="avatar" class="form-control">
                                                            <small class="text-muted">Kosongkan jika tidak ingin merubah</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">E-mail</label>
                                                    <input type="text" id="email" name="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" value="<?= $admin["email"] ?>">
                                                    <?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="role">Hak Akses</label>
                                                    <select name="role" id="role" class="form-control <?= form_error('role') ? 'is-invalid' : ''; ?>">
                                                        <?php if ($admin["role"] == "Admin") : ?>
                                                            <option value="Admin" selected>Admin</option>
                                                            <option value="Staff">Staff</option>
                                                        <?php else : ?>
                                                            <option value="Admin">Admin</option>
                                                            <option value="Staff" selected>Staff</option>
                                                        <?php endif; ?>
                                                    </select>
                                                    <?= form_error('role', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="is_active">Status Akun</label>
                                                    <select name="is_active" id="is_active" class="form-control">
                                                        <?php if ($admin["is_active"] == 1) : ?>
                                                            <option value="1" selected>Aktif</option>
                                                            <option value="0">Nonaktif</option>
                                                        <?php else : ?>
                                                            <option value="1">Aktif</option>
                                                            <option value="0" selected>Nonaktif</option>
                                                        <?php endif; ?>
                                                    </select>
                                                    <?= form_error('role', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-action">
                                                    <button type="submit" class="btn btn-primary">Ubah Admin</button>
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