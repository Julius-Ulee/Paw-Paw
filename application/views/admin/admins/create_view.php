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
                                            <form action="<?= base_url("kelola-admin/tambah") ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="name" class="font-weight-bold">Nama</label>
                                                    <input type="text" id="name" name="name" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= set_value("name"); ?>">
                                                    <?= form_error('name', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="avatar">Avatar</label>
                                                    <input type="file" id="avatar" name="avatar" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">E-mail</label>
                                                    <input type="text" id="email" name="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" value="<?= set_value("email") ?>">
                                                    <?= form_error('email', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="role">Hak Akses</label>
                                                    <select name="role" id="role" class="form-control <?= form_error('role') ? 'is-invalid' : ''; ?>">
                                                        <option value="" selected disabled>--PILIH HAK AKSES--</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Staff">Staff</option>
                                                    </select>
                                                    <?= form_error('role', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" id="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>">
                                                    <?= form_error('password', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password_confirm">Konfirmasi Password</label>
                                                    <input type="password" id="password_confirm" name="password_confirm" class="form-control <?= form_error('password_confirm') ? 'is-invalid' : ''; ?>">
                                                    <?= form_error('password_confirm', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
                                                </div>
                                                <div class="form-action">
                                                    <button type="submit" class="btn btn-primary">Tambah Admin</button>
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