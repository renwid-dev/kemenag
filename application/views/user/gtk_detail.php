<?php require_once  'content/top_head.php' ?> 

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0"><?= $title ?></h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= site_url('user/gtk') ?>">GTK</a>
                                </li>
                                <li class="breadcrumb-item active"><?= $title ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="top">
                <div class="dt-buttons btn-group">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addGtk"><span><i class="feather icon-plus"></i> Add GTK</span></button> 
                </div>
                <a href="<?= site_url('user/gtk') ?>" class="btn btn-outline-warning"><span><i class="fa fa-arrow-circle-left"></i> Kembali</span></a> 
            </div>
            <br>
            <!-- Zero configuration table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table tbl-gtk-detail table-striped table-bordered complex-headers" id="table-1">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Jabatan</th>
                                                    <th>Nama</th>
                                                    <th>J/K</th>
                                                    <th>Status Kepegawaian</th>
                                                    <th>Status Sertifikasi</th>
                                                    <th>Status TPP / Tukin</th>
                                                    <th>Status Inpassing</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($gtk_detail as $row) : ?>
                                                <tr class="text-center">
                                                    <td><?php echo $row->jabatan ?></td>
                                                    <td><?php echo $row->nama ?></td>
                                                    <td><?php echo $row->jk ?></td>
                                                    <td><?php echo $row->status_kepegawaian ?></td>
                                                    <td><?php echo $row->status_sertifikasi ?></td>
                                                    <td><?php echo $row->status_tpp ?></td>
                                                    <td><?php echo $row->status_inpassing ?></td>
                                                    <td>
                                                        <button data-id="<?php echo $row->id_gtk_detail ?>" class="edit btn btn-info btn-sm"><i class="fa fa-pencil"></i></button>
                                                        <button data-id="<?php echo $row->id_gtk_detail ?>" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->

 <!--/ add Data User -->
<div class="modal fade" id="addGtk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <form id="formAdd" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Add GTK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="lembaga_id" name="lembaga_id" value="<?php echo $gtk[0]->lembaga_id ?>">
                    <input type="hidden" id="id_gtk" name="id_gtk" value="<?php echo $gtk[0]->id_gtk ?>">
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <select name="jabatan" class="form-control select2">
                            <option value="Guru">Guru</option>
                            <option value="Tendik">Tendik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jk" class="form-control select2">
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Status Kepegawaian</label>
                                <select name="status_kepegawaian" class="form-control select2">
                                    <option value="PNS">PNS</option>
                                    <option value="Honorer">Honorer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Status Sertifikasi</label>
                                <select name="status_sertifikasi" class="form-control select2">
                                    <option value="Sudah Sertifikasi">Sudah Sertifikasi</option>
                                    <option value="Belum Sertifikasi">Belum Sertifikasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Status TPP / Tukin</label>
                                <select name="status_tpp" class="form-control select2">
                                    <option value="Sudah TPP/Tukin">Sudah TPP/Tukin</option>
                                    <option value="Belum TPP/Tukin">Belum TPP/Tukin</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Status Inpassing</label>
                                <select name="status_inpassing" class="form-control select2">
                                    <option value="Sudah Inpassing">Sudah Inpassing</option>
                                    <option value="Belum Inpassing">Belum Inpassing</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal"><i class="feather icon-x d-block d-lg-none"></i>
                            <span class="d-none d-lg-block">Cancel</span></button>
                    </fieldset>
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div>

 <!--/ Edt Data User -->
 <div class="modal fade" id="edtGtk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <form id="formEdt" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Add GTK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="id_gtk_detail" name="id_gtk_detail">
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <select id="jabatan" name="jabatan" class="form-control select2">
                            <option value="Guru">Guru</option>
                            <option value="Tendik">Tendik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select id="jk" name="jk" class="form-control select2">
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Status Kepegawaian</label>
                                <select id="status_kepegawaian" name="status_kepegawaian" class="form-control select2">
                                    <option value="PNS">PNS</option>
                                    <option value="Honorer">Honorer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Status Sertifikasi</label>
                                <select id="status_sertifikasi" name="status_sertifikasi" class="form-control select2">
                                    <option value="Sudah Sertifikasi">Sudah Sertifikasi</option>
                                    <option value="Belum Sertifikasi">Belum Sertifikasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Status TPP / Tukin</label>
                                <select id="status_tpp" name="status_tpp" class="form-control select2">
                                    <option value="Sudah TPP/Tukin">Sudah TPP/Tukin</option>
                                    <option value="Belum TPP/Tukin">Belum TPP/Tukin</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Status Inpassing</label>
                                <select id="status_inpassing" name="status_inpassing" class="form-control select2">
                                    <option value="Sudah Inpassing">Sudah Inpassing</option>
                                    <option value="Belum Inpassing">Belum Inpassing</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal"><i class="feather icon-x d-block d-lg-none"></i>
                            <span class="d-none d-lg-block">Cancel</span></button>
                    </fieldset>
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'content/footer.php' ?> 

<?php require_once 'content/script.php' ?>

<script type="text/javascript">
$(document).ready(function() {

    $(".tbl-gtk-detail").DataTable({
        responsive: true,
        aLengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
        order: [[1, "asc"]],
        bInfo: false,
        pageLength: 5,
    });

    // form add GTK
    $('#formAdd').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url() ?>user/gtk_save_add',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                }); 
            },
            success: function(data) {
                if (data == 'success') {
                    toastr.success('Data berhasil di simpan.', 'Success', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#addDTuser').modal('hide');
                }
                $('#bodyreset').load(location.href + ' #bodyreset');
            }, 
            error: function (data) {
                toastr.error('Data fail!.', 'Errors!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
            }
        })
    });

    //get data GTK
    $('#table-1').on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('user/gtk_data_detail') ?>',
            data: {id : id},
            dataType: 'json',
            success: function (data) {
                $('#edtGtk').modal('show');
                $('#id_gtk_detail').val(data[0].id_gtk_detail);
                $('#lembaga_id').val(data[0].lembaga_id_d);
                $('#jabatan').val(data[0].jabatan);
                $('#nama').val(data[0].nama);
                $('#jk').val(data[0].jk);
                $('#status_kepegawaian').val(data[0].status_kepegawaian);
                $('#status_sertifikasi').val(data[0].status_sertifikasi);
                $('#status_tpp').val(data[0].status_tpp);
                $('#status_inpassing').val(data[0].status_inpassing);
            },
        })            
    });

    // form edt GTK
    $('#formEdt').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url() ?>user/gtk_save_update',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                }); 
            },
            success: function(data) {
                if (data == 'success') {
                    toastr.success('Data berhasil di simpan.', 'Success', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#addDTuser').modal('hide');
                }
                $('#bodyreset').load(location.href + ' #bodyreset');
            }, 
            error: function (data) {
                toastr.error('Data fail!.', 'Errors!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
            }
        })
    });

    //hapus GTK
    $('#table-1').on('click', '.delete', function() {
    var id = $(this).data('id');
    Swal.fire({
            title: 'Kamu yakin?',
            text: "Untuk menghapus data ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Lanjutkan!',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: '<?php echo site_url('user/gtk_delete') ?>',
                    method: "POST",
                    data: {key : id},
                    dataType: 'json',
                    success: function(data) {
                        toastr.success('Data berhasil di hapus.', 'Success!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    }
                });
            }
        });

    });

    });
</script>

<?php require_once  'content/end_head.php' ?> 
