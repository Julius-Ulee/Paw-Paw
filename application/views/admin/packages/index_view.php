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

                <!-- Begin Page Content -->
                <section class="section">
                    <div class="section-header d-flex justify-content-between">
                        <h1><?= $page_title; ?></h1>
                        <a href="javascript:void(0)" class="btn btn-primary btn-lg showCreateModal" onclick="addPackage()">Tambah Paket Grooming</a>
                    </div>
                    <!-- alert flashdata -->
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <!-- end alert flashdata -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="tablePackages" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="50">No. </th>
                                                    <th width="250">Nama Paket</th>
                                                    <th width="250">Slug</th>
                                                    <th>Deskripsi Paket</th>
                                                    <th width="150">Tarif Kucing</th>
                                                    <th width="150">Tarif Anjing</th>
                                                    <th width="120">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Table generate from ajax -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("admin/layouts/_footer"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Modal here -->
    <!-- Modal Update -->
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" id="form">
                    <input type="hidden" value="" name="package_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Tambah Paket Grooming</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Paket</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug akan digenerate otomatis" disabled>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cost_for_cat">Biaya Pelayanan untuk Kucing</label>
                            <input type="number" name="cost_for_cat" id="cost_for_cat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cost_for_dog">Biaya Pelayanan untuk Anjing</label>
                            <input type="number" name="cost_for_dog" id="cost_for_dog" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php $this->load->view("admin/layouts/_scripts"); ?>

    <!-- ajax -->
    <!-- ajax -->
    <script>
        let saveMethod;
        let table;
        let baseUrl = '<?= base_url() ?>';

        $(document).ready(function() {
            //datatables
            table = $('#tablePackages').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= base_url('paket-grooming/ajaxlist') ?>",
                    "type": "POST"
                },

                //Set column definition initialisation properties.
                "columnDefs": [{
                        "targets": [-1], //last column
                        "orderable": false, //set not orderable
                    },
                    {
                        "targets": [-2], //2 last column (photo)
                        "orderable": false, //set not orderable
                    },
                ],

            });

            //set input/textarea/select event when change value, remove class error and remove text help block 
            $("input").change(function() {
                $(this).removeClass('has-error');
                $(this).next().empty();
            });

        });

        function addPackage() {
            saveMethod = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-control').removeClass('is-invalid'); // clear error class
            $('.invalid-feedback').empty(); // clear error string
            $('#modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text('Tambah Paket Grooming'); // Set Title to Bootstrap modal title

        }

        function editPackage(id) {
            saveMethod = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-control').removeClass('is-invalid'); // clear error class
            $('.invalid-feedback').empty(); // clear error string

            // load data from ajax
            $.ajax({
                url: "<?= base_url('paket-grooming/ajaxedit') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="package_id"]').val(data.package_id);
                    $('[name="name"]').val(data.name);
                    $('[name="slug"]').val(data.slug);
                    $('[name="description"]').val(data.description);
                    $('[name="cost_for_cat"]').val(data.cost_for_cat);
                    $('[name="cost_for_dog"]').val(data.cost_for_dog);
                    $('#modal_form').modal('show'); // show bootstrap modal
                    $('.modal-title').text('Ubah Paket Grooming'); // Set Title to Bootstrap modal title

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal({
                        title: 'Error',
                        text: 'Gagal mendapatkan data dari AJAX',
                        icon: 'error'
                    });
                }
            });
        }

        function reloadTable() {
            table.ajax.reload(null, false); //reload datatable ajax 
        }

        function save() {
            $('#btnSave').text('Memproses...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable 
            let url;

            if (saveMethod == 'add') {
                url = "<?= base_url('paket-grooming/ajaxadd') ?>";
            } else {
                url = "<?= base_url('paket-grooming/ajaxupdate') ?>";
            }

            // ajax adding data to database

            var formData = new FormData($('#form')[0]);
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {

                    if (data.status) //if success close modal and reload ajax table
                    {

                        if (saveMethod == 'add') {
                            $('#modal_form').modal('hide');
                            swal({
                                title: 'Berhasil',
                                text: 'Kategori berhasil ditambahkan',
                                icon: 'success'
                            });
                        } else {
                            $('#modal_form').modal('hide');
                            swal({
                                title: 'Berhasil',
                                text: 'Kategori berhasil diubah',
                                icon: 'success'
                            });
                        }

                        reloadTable();
                    } else {
                        // for (let i = 0; i < data.inputerror.length; i++) {
                        // 	$('[form-control="' + data.inputerror[i] + '"]').parent().addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class
                        // 	$('[form-control="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        // }
                        swal({
                            title: 'Gagal',
                            text: 'Lengkapi semua form',
                            icon: 'error'
                        });
                    }
                    $('#btnSave').text('Simpan'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal({
                        title: 'Gagal',
                        text: 'Kategori gagal ditambahkan',
                        icon: 'error'
                    });
                    $('#btnSave').text('Simpan'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 

                }
            });
        }

        function deletePackage(id) {
            swal({
                title: "Anda yakin?",
                text: "Data Kategori akan dihapus!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    $.ajax({
                        url: "<?= base_url('paket-grooming/ajaxdelete') ?>/" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            //if success reload ajax table
                            $('#modal_form').modal('hide');
                            reloadTable();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal(
                                'Deleted!',
                                'Your file has been deleted.',
                                'error'
                            )
                        }
                    });
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
    </script>


</body>

</html>