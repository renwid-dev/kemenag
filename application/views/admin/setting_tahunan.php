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
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard') ?>">Home</a>
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
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addSetting"<span><i class="feather icon-plus"></i> Add New</span></button> 
                </div>
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
                                        <table class="table tbl-user" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode</th>
                                                    <th>Tahun Pelajaran</th>
                                                    <th>Semester</th>
                                                    <th>Tampilkan di user</th>
                                                    <th>Izinkan Edit</th>
                                                    <th width="15%">Action</th>
                                                </tr>
                                            </thead>
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


 <!--/ add setting -->
 <div class="modal fade" id="addSetting" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <form id="formAdd" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Add Setting Tahun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" class="form-control" name="kode" placeholder="Kode">
                    </div>
                    <div class="form-group">
                        <label>Tahun Pelajaran</label>
                        <input type="text" class="form-control" name="tahun_pelajaran" placeholder="Tahun Pelajaran">
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select name="semester" id="semester" class="form-control">
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
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

<!--/ adt setting -->
<div class="modal fade" id="edtSetting" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <form id="formAdt" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Setting Tahun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" class="form-control" name="id">
                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" id="kode" class="form-control" name="kode" placeholder="Kode">
                    </div>
                    <div class="form-group">
                        <label>Tahun Pelajaran</label>
                        <input type="text" id="tahun_pelajaran" class="form-control" name="tahun_pelajaran" placeholder="Tahun Pelajaran">
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select name="semester" id="semester" class="form-control">
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tampilkan di user</label>
                        <select name="akses_user" id="akses_user" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Izinkan edit</label>
                        <select name="akses_izinkan" id="akses_izinkan" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <!-- <div class="tab-pane fade active show" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                        <div class="row">
                            <h6 class="m-1">Aktifitas</h6>
                            <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" name="akses_user" class="custom-control-input" id="akses_user">
                                    <label class="custom-control-label mr-1" for="akses_user"></label>
                                    <span class="switch-label w-100">Tampilkan di user</span>
                                </div>
                            </div>
                            <div class="col-12 mb-1">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" name="akses_izinkan" class="custom-control-input" id="akses_izinkan">
                                    <label class="custom-control-label mr-1" for="akses_izinkan"></label>
                                    <span class="switch-label w-100">Izinkan edit</span>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
    $(document).ready(function () {
        //List user
        $('.tbl-user').DataTable({
            "ajax": "<?php echo site_url('admin/setting_list')?>",
            "processing": true,
            "order": [0, "asc"],
        });
        // form add user
        $('#formAdd').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('admin/setting_save_add') ?>',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('form button').on("click", function(e) {
                        e.preventDefault();
                    }); 
                },
                success: function(data) {
                    if (data == 'success') {
                        toastr.success('Data berhasil di simpan.', 'Slide Down / Slide Up!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                        $('#addUser').modal('hide');
                    }
                    $('#bodyreset').load(location.href + ' #bodyreset');
                }, 
                error: function (data) {
                    toastr.error('Data fail!.', 'Slide Down / Slide Up!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                }
            })
        });
        //get data user
        $('#table-1').on('click', '.edit', function() {
            var id = $(this).data('id');
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('admin/setting_get') ?>',
                data: {id : id},
                dataType: 'json',
                success: function (data) {
                    $('#edtSetting').modal('show');
                    $('#id').val(data[0].id_setting );
                    $('#kode').val(data[0].kode);
                    $('#tahun_pelajaran').val(data[0].tahun_pelajaran);
                    $('#semester').val(data[0].semester);
                    $('#akses_user').val(data[0].akses_user);
                    $('#akses_izinkan').val(data[0].akses_izinkan);
                },
            })            
        });

        // $('#akses_user').click(function(){
        //     var checked = 0;
        //     if (document.querySelector('#akses_user:checked')) {
        //         checked = 1;
        //     }
        //     alert(checked);
        // })
        // $('#akses_izinkan').click(function(){
        //     var checked = 0;
        //     if (document.querySelector('#akses_izinkan:checked')) {
        //         checked = 1;
        //     }
        //     alert(checked);
        // })

        // form edit user
        $('#formAdt').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('admin/setting_save_update') ?>',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('form button').on("click", function(e) {
                        e.preventDefault();
                    }); 
                },
                success: function(data) {
                    if (data == 'success') {
                        toastr.success('Data berhasil di ubah.', 'Success!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                        $('#addUser').modal('hide');
                    }
                    $('#formAdt').load(location.href + ' #bodyreset');
                }, 
                error: function (data) {
                    toastr.error('Data fail!.', 'Errors!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                }
            })
        });
        //hapus user
        $('#table-1').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
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
                        url: '<?php echo site_url('admin/setting_delete') ?>',
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
