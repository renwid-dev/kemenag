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
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addUser"<span><i class="feather icon-plus"></i> Add New</span></button> 
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
                                                    <th>Name</th>
                                                    <th>Userame</th>
                                                    <th>email</th>
                                                    <th>level</th>
                                                    <th>Status</th>
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

 <!--/ add user -->
 <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <form id="formAdd" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first-name-icon">Nama</label>
                        <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
                            <div class="form-control-position">
                                <i class="feather icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email-id-icon">Email</label>
                        <div class="position-relative has-icon-left">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <div class="form-control-position">
                                <i class="feather icon-mail"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password-icon">Username</label>
                        <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                            <div class="form-control-position">
                                <i class="feather icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password-icon">Password</label>
                        <div class="position-relative has-icon-left">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <div class="form-control-position">
                                <i class="feather icon-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
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

<!--/ add user -->
<div class="modal fade" id="edtUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <form id="formAdt" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="user_id" class="form-control" name="user_id">
                    <div class="form-group">
                        <label for="first-name-icon">Nama</label>
                        <div class="position-relative has-icon-left">
                            <input type="text" id="name" class="form-control" name="name" placeholder="Nama Lengkap">
                            <div class="form-control-position">
                                <i class="feather icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email-id-icon">Email</label>
                        <div class="position-relative has-icon-left">
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                            <div class="form-control-position">
                                <i class="feather icon-mail"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password-icon">Username</label>
                        <div class="position-relative has-icon-left">
                            <input type="text" id="username" class="form-control" name="username" placeholder="Username">
                            <div class="form-control-position">
                                <i class="feather icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password-icon">Password</label>
                        <div class="position-relative has-icon-left">
                            <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                            <div class="form-control-position">
                                <i class="feather icon-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
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

<?php require_once 'content/footer.php' ?> 

<?php require_once 'content/script.php' ?>

<script type="text/javascript">
    $(document).ready(function () {
        //List user
        $('.tbl-user').DataTable({
            "ajax": "<?php echo site_url('admin/user_list')?>",
            "processing": true,
            "order": [0, "asc"],
        });
        // form add user
        $('#formAdd').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('admin/user_save') ?>',
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
                url: '<?php echo site_url('admin/user_get') ?>',
                data: {id : id},
                dataType: 'json',
                success: function (data) {
                    $('#edtUser').modal('show');
                    $('#user_id').val(data[0].user_id);
                    $('#name').val(data[0].name);
                    $('#email').val(data[0].email);
                    $('#level').val(data[0].level);
                    $('#username').val(data[0].username);
                    $('#status').val(data[0].status);
                },
            })            
        });
        // form edit user
        $('#formAdt').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('admin/user_update') ?>',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('form button').on("click", function(e) {
                        e.preventDefault();
                    }); 
                },
                success: function(data) {
                    if (data == 'success') {
                        toastr.success('Data berhasil di simpan.', 'Success!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
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
                        url: '<?php echo site_url('admin/user_delete') ?>',
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
