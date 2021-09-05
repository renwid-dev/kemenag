<?php require_once  'content/top_head.php' ?> 
<style> 
    td {text-align: center;}
</style>
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
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addDTuser"><span><i class="feather icon-plus"></i> Add New</span></button> 
                </div>
                <div class="dt-buttons btn-group">
                    <button class="btn btn-outline-info" data-toggle="modal" data-target="#addDTuserImport"><span><i class="feather icon-upload"></i> Import</span></button> 
                </div>
                <div class="dt-buttons btn-group">
                    <a href="<?php echo base_url('admin/data_user_export') ?>" class="btn btn-outline-success"><i class="feather icon-download"></i> Export Excel</span></a> 
                </div>
                <div id="btnGenerate" class="dt-buttons btn-group" style="display:none;">
                    <button class="btn btn-relief-info" data-toggle="modal" data-target="#generate"><i class="feather icon-settings"></i>
                        Generate Tahun Pelajaran
                    </button>
                </div>
            </div>
            <br>
            <!-- Zero configuration table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <form id="formGenerate">
                                        <div class="row col-md-12">
                                             <!--/ add generate setting tahun -->
                                            <div class="modal fade" id="generate" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Generate Tahun Pelajaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">

                                                                    <!-- DataTable starts -->
                                                                    <div class="table-responsive">
                                                                        <table class="table data-list-view">
                                                                            <thead>
                                                                                <tr class="text-center">
                                                                                    <th><input type="checkbox" id="select_all"></th>
                                                                                    <th>Kode</th>
                                                                                    <th>Tahun Ajaran</th>
                                                                                    <th>Semester</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach ($setting_tahun as $row) : ?>
                                                                                    <tr>
                                                                                        <td><input type="checkbox" class="checkstn" name="idx_setting[]" value="<?php echo $row->id_setting ?>" /></td>
                                                                                        <td class="product-name"><?php echo $row->kode ?></td>
                                                                                        <td class="product-category"><?php echo $row->tahun_pelajaran ?></td>
                                                                                        <td class="product-price"><?php echo $row->semester ?></td>
                                                                                    </tr>
                                                                                <?php endforeach; ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- DataTable ends -->

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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table tbl-user" id="table-1">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th><input type="checkbox" id="id_all"></th>
                                                        <th>No</th>
                                                        <th>Jenjang</th>
                                                        <th>Nama Madrasah</th>
                                                        <th>Kecamatan</th>
                                                        <th>Status</th>
                                                        <th>NSM</th>
                                                        <th>NPSN</th>
                                                        <th>Password</th>
                                                        <th width="16%">Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </form>
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

<!--/ Import Data User -->
<div class="modal fade" id="addDTuserImport" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <fieldset class="form-group">
                    <label for="basicInputFile">Format harus .xls atau .xlsx</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file-import">
                        <label class="custom-file-label" for="file-import"></label>
                    </div>
                </fieldset>
                <br>
                <p>download format xls/xlsx <a href="<?php echo site_url('assets/format/format-data-user.xlsx') ?>">disini</a></p>
            </div>
            <div class="modal-footer">
                <fieldset class="form-group position-relative has-icon-left mb-0">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal"><i class="feather icon-x d-block d-lg-none"></i>
                        <span class="d-none d-lg-block">Cancel</span></button>
                </fieldset>
                <fieldset class="form-group position-relative has-icon-left mb-0">
                    <button id="formImport" type="submit" class="btn btn-primary">Save</button>
                </fieldset>
            </div>
        </div>
    </div>
</div>

 <!--/ add Data User -->
 <div class="modal fade" id="addDTuser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Jenjang</label>
                        <select id="add-jenjang" name="jenjang" class="form-control select2">
                            <?php foreach ($jenjang as $key) : ?>
                                <option value="<?= $key->deskripsi ?>"><?= $key->deskripsi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Madrasah</label>
                        <input type="text" class="form-control" id="add-nama_madrasah" name="nama_madrasah" placeholder="Nama Madrasah">
                    </div>
                    <div class="form-group">
                        <label for="">Kecamatan</label>
                        <select id="add-code_kec" name="code_kec" class="form-control select2">
                            <?php foreach ($kecamatan as $key) : ?>
                                <option value="<?= $key->code ?>"><?= $key->kecamatan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select id="add-status" name="status" class="form-control select2">
                            <option value="Swasta">Swasta</option>
                            <option value="Negeri">Negeri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NSM</label>
                        <input type="text" id="add-nsm" class="form-control" name="nsm" placeholder="NSM">
                    </div>
                    <div class="form-group">
                        <label>NPSN</label>
                        <input type="text" id="add-npsn" class="form-control" name="npsn" placeholder="NPSN">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" id="add-password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal"><i class="feather icon-x d-block d-lg-none"></i>
                            <span class="d-none d-lg-block">Cancel</span></button>
                    </fieldset>
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <button id="formAdd" type="submit" class="btn btn-primary">Save</button>
                    </fieldset>
                </div>
        </div>
    </div>
</div>

<!--/ adt Data User -->
<div class="modal fade" id="edtDTuser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="">Jenjang</label>
                        <select id="jenjang" name="jenjang" class="form-control select2">
                            <?php foreach ($jenjang as $key) : ?>
                                <option value="<?= $key->deskripsi ?>"><?= $key->deskripsi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Madrasah</label>
                        <input type="text" id="nama_madrasah" class="form-control" name="nama_madrasah" placeholder="Nama Madrasah">
                    </div>
                    <div class="form-group">
                        <label for="">Kecamatan</label>
                        <select id="code_kec" name="code_kec" class="form-control select2">
                            <?php foreach ($kecamatan as $key) : ?>
                                <option value="<?= $key->code ?>"><?= $key->kecamatan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select id="status" name="status" class="form-control select2">
                            <option value="Swasta">Swasta</option>
                            <option value="Negeri">Negeri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NSM</label>
                        <input id="nsm" type="text" class="form-control" name="nsm" placeholder="NSM">
                    </div>
                    <div class="form-group">
                        <label>NPSN</label>
                        <input id="npsn" type="text" class="form-control" name="npsn" placeholder="NPSN">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="text" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal"><i class="feather icon-x d-block d-lg-none"></i>
                            <span class="d-none d-lg-block">Cancel</span></button>
                    </fieldset>
                    <fieldset class="form-group position-relative has-icon-left mb-0">
                        <button id="formAdt" type="submit" class="btn btn-primary">Save</button>
                    </fieldset>
                </div>
        </div>
    </div>
</div>

<?php require_once 'content/footer.php' ?> 

<?php require_once 'content/script.php' ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#id_all').on('click',function(){
            $('#btnGenerate').show();
            if(this.checked){
                $('#btnGenerate').show();
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                $('#btnGenerate').hide();
                $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click',function(){
            $('#btnGenerate').show();
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#id_all').prop('checked',true);
            }else{
                $('#id_all').prop('checked',false);
            }
        });

        $('#select_all').on('click',function(){
            if(this.checked){
                $('.checkstn').each(function(){
                    this.checked = true;
                });
            }else{
                $('.checkstn').each(function(){
                    this.checked = false;
                });
            }
        });

        $('.checkstn').on('click',function(){
            if($('.checkstn:checked').length == $('.checkstn').length){
                $('#select_all').prop('checked',true);
            }else{
                $('#select_all').prop('checked',false);
            }
        });


        $(".data-list-view").DataTable({
            "responsive": true,
            "processing": true,
            "order": [0, "asc"],
            "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "bSort": false,
            "pageLength": 5,
        });

        // form Generate setting tahun
        $('#formGenerate').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('admin/data_user_generate') ?>',
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
                    }
                }
            });
        });

        //List user
        $('.tbl-user').DataTable({
            "responsive": true,
            "ajax": "<?php echo site_url('admin/data_user_list')?>",
            "processing": true,
            "order": [0, "asc"],
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            "bSort": false,
        });

        //Import data user
        $('#formImport').on('click',function(e){
            e.preventDefault();
            var file_data = $('#file-import').prop('files')[0];
            var form_data = new FormData();

            form_data.append('userfile', file_data);
            $.ajax({
                type: 'post',
                url: '<?php echo site_url("admin/data_user_import") ?>',
                data: form_data,
                dataType: 'json', 
                cache: false,
                contentType: false,
                processData: false,
                success: function(data,message){
                    if (data.message != 'error') {
                        toastr.success('Data berhasil di import!', 'Success', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }else{
                        toastr.warning('Kami tidak mengenali format yang anda upload!', 'Errors', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                }
            });
        });

        // form add user
        $('#formAdd').on('click', function(e) {
            var jenjang = $('#add-jenjang').val();
            var nama_madrasah = $('#add-nama_madrasah').val();
            var code_kec = $('#add-code_kec').val();
            var status = $('#add-status').val();
            var nsm = $('#add-nsm').val();
            var npsn = $('#add-npsn').val();
            var password = $('#add-password').val();

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('admin/data_user_save') ?>',
                data: {jenjang:jenjang, nama_madrasah:nama_madrasah, code_kec:code_kec, status:status, nsm:nsm, npsn:npsn, password:password},
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
                        $('#addUser').modal('hide');
                    } 
                }, 
                error: function (data) {
                    toastr.warning('Silakan input kembali.', 'Data NSM duplicate!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#addUser').modal('hide');
                }
            })
        });

        //get data user
        $('#table-1').on('click', '.edit', function() {
            var id = $(this).data('id');
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('admin/data_user_get') ?>',
                data: {id : id},
                dataType: 'json',
                success: function (data) {
                    $('#edtDTuser').modal('show');
                    $('#id').val(data[0].id_lembaga);
                    $('#jenjang').val(data[0].jenjang);
                    $('#nama_madrasah').val(data[0].nama_madrasah);
                    $('#code_kec').val(data[0].code_kec);
                    $('#status').val(data[0].status);
                    $('#nsm').val(data[0].nsm);
                    $('#npsn').val(data[0].npsn);
                    $('#password').val(data[0].password);
                },
            })            
        });

        // form edit user
        $('#formAdt').on('click', function(e) {
            var id = $('#id').val();
            var jenjang = $('#jenjang').val();
            var nama_madrasah = $('#nama_madrasah').val();
            var code_kec = $('#code_kec').val();
            var status = $('#status').val();
            var nsm = $('#nsm').val();
            var npsn = $('#npsn').val();
            var password = $('#password').val();
            
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('admin/data_user_update') ?>',
                data: {id:id,jenjang:jenjang, nama_madrasah:nama_madrasah, code_kec:code_kec, status:status, nsm:nsm, npsn:npsn, password:password},
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
                        url: '<?php echo site_url('admin/data_user_delete') ?>',
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
