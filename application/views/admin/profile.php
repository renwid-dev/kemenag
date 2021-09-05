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
                        <h2 class="content-header-title float-left mb-0">Account Settings</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard') ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active"> Profile
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page start -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                    <i class="feather icon-globe mr-50 font-medium-3"></i>
                                    General
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                    <i class="feather icon-lock mr-50 font-medium-3"></i>
                                    Change Password
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                            <form id="#">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <?php if (isset($user[0]->file_user) != "") { ?>
                                                            <img src="<?= base_url('assets/upload/profile/') . $user[0]->file_user ?>" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url() ?>assets/img/avatar.png" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                        <?php } ?>
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                                            <input type="file" id="account-upload" hidden>
                                                            <button id="updateImage" class="btn btn-sm btn-outline-primary ml-50">save</button>
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                size of
                                                                800kB</small></p>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form id="formUpdate">
                                                <div class="row">
                                                    <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id_user') ?>">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-username">Username</label>
                                                                <input type="text" class="form-control" id="account-username" name="username" placeholder="Username" value="<?php echo $user[0]->username ?>" required data-validation-required-message="This username field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-name">Nama</label>
                                                                <input type="text" class="form-control" id="account-name" name="name" placeholder="Name" value="<?php echo $user[0]->name ?>" required data-validation-required-message="This name field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-e-mail">E-mail</label>
                                                                <input type="email" class="form-control" id="account-e-mail" name="email" placeholder="Email" value="<?php echo $user[0]->email ?>" required data-validation-required-message="This email field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form id="formChangePass">
                                                <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id_user') ?>">
                                                <input type="hidden" name="username" value="<?php echo $user[0]->username ?>">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-old-password">Old Password</label>
                                                                <input type="password" class="form-control" id="account-old-password" name="password_old" placeholder="Old Password">
                                                                <?= form_error('password_old', '<small class="text-danger">','</small>') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-new-password">New Password</label>
                                                                <input type="password" id="account-new-password" name="password_new" class="form-control" placeholder="New Password" data-validation-required-message="This field is required">
                                                                <?= form_error('password_new', '<small class="text-danger">','</small>') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-retype-new-password">Retype New
                                                                    Password</label>
                                                                <input type="password" class="form-control" name="confirm_password" id="account-retype-new-password" data-validation-match-match="password_new" placeholder="Confirm Password" data-validation-required-message="Repeat password must match">
                                                                <?= form_error('confirm_password', '<small class="text-danger">','</small>') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- account setting page end -->

        </div>
    </div>
</div>
<!-- END: Content-->
<?php require_once 'content/footer.php' ?> 

<?php require_once 'content/script.php' ?>

<script type="text/javascript">
    //form nultipart data
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    //Upload image
    $(document).on('click','#updateImage',function(e){
        e.preventDefault();
        var file_data = $('#account-upload').prop('files')[0];
        var form_data = new FormData();

        form_data.append('userfile', file_data);
        $.ajax({
            type: 'post',
            url: '<?php echo site_url("admin/profile_upload") ?>',
            data: form_data,
            dataType: 'json', 
            cache: false,
            contentType: false,
            processData: false,
            success: function(data,status){
                if (data.status != 'error') {
                    toastr.success(data.msg, 'Success', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }else{
                    toastr.warning(data.msg, 'Errors', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            }
        });
    });

     // form update profile
     $('#formUpdate').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('admin/profile_update') ?>',
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
                    $('#addUser').modal('hide');
                } else if(data == 'match'){
                    toastr.warning('Password sama dengan yang lama!.', 'Password Sama', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#addUser').modal('hide');
                }
                $('#bodyreset').load(location.href + ' #bodyreset');
            }, 
            error: function (data) {
                toastr.error('Data fail!.', 'Errors!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                setTimeout(function() {
                        window.location.reload();
                    }, 2000);
            }
        });
    });
    
    // form change password profile
    $('#formChangePass').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('admin/change_password') ?>',
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
                } else {
                    toastr.error('Password tidak sama dengan yang lama!.', 'Peringatan!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 3000 });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            }, 
            error: function (data) {
                toastr.error('Data fail!.', 'Errors!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
            }
        });
    });

    //Validation form
    (function(window, document, $) {
        'use strict';
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    })(window, document, jQuery);
</script>

<?php require_once  'content/end_head.php' ?> 