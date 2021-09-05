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
                        <h2 class="content-header-title float-left mb-0"><?php echo isset($detail[0]->nama_madrasah) ? $detail[0]->nama_madrasah : '' ?></h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo base_url() ?>admin/kelembagaan">Kelembagaan</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?php echo $title ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <!-- Form wizard with icon tabs section start -->
            <section id="icon-tabs">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="#" class="icons-tab-steps wizard-circle" enctype="multipart/form-data">
                                        <input type="hidden" name="id_lembaga" value="<?php echo isset($detail[0]->id_lembaga) ? $detail[0]->id_lembaga : '' ?>">
                                        <input type="hidden" name="id_detail" value="<?php echo isset($detail[0]->id_detail) ? $detail[0]->id_detail : '' ?>">
                                        <!-- Profil Umum -->
                                        <h6><i class="step-icon feather icon-home"></i> Profil Umum</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="firstName11">Nama Madrasah </label>
                                                        <input type="text" class="form-control" value="<?php echo isset($detail[0]->nama_madrasah) ? $detail[0]->nama_madrasah : '' ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="lastName11">Jenjang</label>
                                                        <input type="text" class="form-control" value="<?php echo isset($detail[0]->jenjang) ? $detail[0]->jenjang : '' ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="firstName11">Status </label>
                                                        <input type="text" class="form-control" value="<?php echo isset($detail[0]->status) ? $detail[0]->status : '' ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="lastName11">NSM</label>
                                                        <input type="text" class="form-control" value="<?php echo isset($detail[0]->nsm) ? $detail[0]->nsm : '' ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="firstName11">NPSN</label>
                                                        <input type="text" class="form-control" value="<?php echo isset($detail[0]->npsn) ? $detail[0]->npsn : '' ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="lastName11">Kecamatan</label>
                                                        <input type="text" class="form-control" value="<?php echo isset($detail[0]->kecamatan) ? $detail[0]->kecamatan : '' ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="lastName11">Alamat</label>
                                                        <textarea name="alamat" class="form-control" cols="30" rows="3" value="" placeholder="Alamat"><?php echo isset($detail[0]->alamat) ? $detail[0]->alamat : '' ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Perizinan -->
                                        <h6><i class="step-icon feather icon-briefcase"></i> Perizinan</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="firstName11">Nomor SIOP </label>
                                                        <input type="text" name="nomor_siop" class="form-control" value="<?php echo isset($detail[0]->nomor_siop) ? $detail[0]->nomor_siop : '' ?>" placeholder="Nomor Siop">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="lastName11">Tanggal SIOP</label>
                                                        <input type="date" name="tanggal_siop" class="form-control" value="<?php echo isset($detail[0]->tanggal_siop) ? date('Y-m-d', strtotime($detail[0]->tanggal_siop)) : '' ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group d-flex align-items-center pt-md-2">
                                                        <label class="mr-2">Masa Berlaku Siop :</label>
                                                        <fieldset>
                                                            <div class="vs-radio-con">
                                                                <input type="radio" name="type_masa_siop" <?php if (isset($detail[0]->type_masa_siop) == 'date') echo 'checked' ?> value="date">
                                                                <span class="vs-radio">
                                                                    <span class="vs-radio--border"></span>
                                                                    <span class="vs-radio--circle"></span>
                                                                </span>
                                                                <span class="">Date</span>
                                                            </div>
                                                        </fieldset>
                                                        &nbsp;&nbsp;
                                                        <fieldset>
                                                            <div class="vs-radio-con">
                                                                <input type="radio" name="type_masa_siop" <?php if (isset($detail[0]->type_masa_siop) == 'lifetime') echo 'checked' ?> value="lifetime">
                                                                <span class="vs-radio">
                                                                    <span class="vs-radio--border"></span>
                                                                    <span class="vs-radio--circle"></span>
                                                                </span>
                                                                <span class="">Lifetime</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <?php if (isset($detail[0]->type_masa_siop) == 'date') { ?>
                                                        <div id="btnDate" class="desc">
                                                            <input type="date" name="tgl_masa_siop" class="form-control" value="<?php echo isset($detail[0]->tgl_masa_siop) ? date('Y-m-d', strtotime($detail[0]->tgl_masa_siop)) : '' ?>">
                                                        </div>
                                                    <?php } else { ?>
                                                        <div id="btnDate" class="desc" style="display: none;">
                                                            <input type="date" name="tgl_masa_siop" class="form-control" value="">
                                                        </div>
                                                    <?php } ?>
                                                    <br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="lastName11">Akreditasi</label>
                                                        <select name="akreditasi" class="form-control" id="basicSelect">
                                                            <option value="A" <?php if (isset($detail[0]->akreditasi) == 'A') echo 'selected' ?>>A</option>
                                                            <option value="B" <?php if (isset($detail[0]->akreditasi) == 'B') echo 'selected' ?>>B</option>
                                                            <option value="C" <?php if (isset($detail[0]->akreditasi) == 'C') echo 'selected' ?>>C</option>
                                                            <option value="Belum Akreditasi" <?php if (isset($detail[0]->akreditasi) == 'Belum Akreditasi') echo 'selected' ?>>Belum Akreditasi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="firstName11">Nilai Akreditasi</label>
                                                        <input type="text" name="nilai_akreditasi" class="form-control" value="<?php echo isset($detail[0]->nilai_akreditasi) ? $detail[0]->nilai_akreditasi : '' ?>" data-validation-regex-regex="([^a-z]*[A-Z]*)*" data-validation-containsnumber-regex="([^0-9]*[0-9]+)+" data-validation-required-message="The digits field must be numeric and exactly contain 3 digits" maxlength="3" minlength="3" placeholder="Minimal angka 3 digits">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="lastName11">Nomor Akreditasi</label>
                                                        <input type="text" name="nomor_akreditasi" class="form-control" value="<?php echo isset($detail[0]->nomor_akreditasi) ? $detail[0]->nomor_akreditasi : '' ?>" placeholder="Nomor Akreditasi">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="lastName11">Masa Berlaku Akreditasi</label>
                                                        <input type="date" name="masa_akreditasi" class="form-control" value="<?php echo isset($detail[0]->masa_akreditasi) ? date('Y-m-d', strtotime($detail[0]->masa_akreditasi)) : '' ?>">
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <!-- Contact Person -->
                                        <h6><i class="step-icon feather icon-user"></i> Contact Person</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="firstName11">Nama Kamad</label>
                                                        <input type="text" name="nama_kamad" class="form-control" value="<?php echo isset($detail[0]->nama_kamad) ? $detail[0]->nama_kamad : '' ?>" placeholder="Nama kamad">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="lastName11">NIP Kamad</label>
                                                        <input type="text" name="nip_kamad" class="form-control" value="<?php echo isset($detail[0]->nip_kamad) ? $detail[0]->nip_kamad : '' ?>" placeholder="Nip Kamad"> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="lastName11">No. HP Kamad</label>
                                                        <input type="number" name="no_hp_kamad" class="form-control" value="<?php echo isset($detail[0]->no_hp_kamad) ? $detail[0]->no_hp_kamad : '' ?>" placeholder="0813 xxxx xxx">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="firstName11">Nama OP 1</label>
                                                        <input type="text" name="nama_op1" class="form-control" value="<?php echo isset($detail[0]->nama_op1) ? $detail[0]->nama_op1 : '' ?>" placeholder="Nama op 1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="lastName11">NIP OP 1</label>
                                                        <input type="text" name="nip_op1" class="form-control" value="<?php echo isset($detail[0]->nip_op1) ? $detail[0]->nip_op1 : '' ?>" placeholder="nip op 1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="lastName11">No. HP OP 1</label>
                                                        <input type="number" name="no_hp_op1" class="form-control" value="<?php echo isset($detail[0]->no_hp_op1) ? $detail[0]->no_hp_op1 : '' ?>" placeholder="0814 xxxx xxxx">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="firstName11">Nama OP 2</label>
                                                        <input type="text" name="nama_op2" class="form-control" value="<?php echo isset($detail[0]->nama_op2) ? $detail[0]->nama_op2 : '' ?>" placeholder="nama op 2">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="lastName11">NIP OP 2</label>
                                                        <input type="text" name="nip_op2" class="form-control" value="<?php echo isset($detail[0]->nip_op2) ? $detail[0]->nip_op2 : '' ?>" placeholder="nip op 2">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="lastName11">No. HP OP 2</label>
                                                        <input type="number" name="no_hp_op2" class="form-control" value="<?php echo isset($detail[0]->no_hp_op2) ? $detail[0]->no_hp_op2 : '' ?>" placeholder="0815 xxxx xxxx">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Upload Document -->
                                        <h6><i class="step-icon feather icon-image"></i> Upload Document</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="firstName11">Upload Piagam Pendirian </label>
                                                        <div class="custom-file">
                                                            <input type="file" name="file_piagam_pendirian" class="custom-file-input" id="inputGroupFile01">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <?php $path_piagam = pathinfo(isset($detail[0]->file_piagam_pendirian), PATHINFO_EXTENSION) ?>
                                                        <?php if (isset($detail[0]->file_piagam_pendirian)) { ?>
                                                            <?php if ($path_piagam == 'pdf' || $path_piagam == 'PDF') { ?>
                                                                <a href="<?php echo base_url() ?>assets/upload/document/<?php echo isset($detail[0]->file_piagam_pendirian) ? $detail[0]->file_piagam_pendirian : '' ?>">
                                                                    <img src="<?php echo base_url() ?>assets/img/pdf.png" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                                                </a>
                                                            <?php } else { ?>
                                                                <a href="<?php echo base_url() ?>assets/upload/document/<?php echo isset($detail[0]->file_piagam_pendirian) ? $detail[0]->file_piagam_pendirian : '' ?>">
                                                                    <img src="<?php echo base_url() ?>assets/upload/document/<?php echo isset($detail[0]->file_piagam_pendirian) ? $detail[0]->file_piagam_pendirian : '' ?>" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                                                </a>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                           <b style="color: red;">Belum Upload!</b>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="lastName11">Upload Ijin Operasional</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="file_ijin_operasional" class="custom-file-input" id="inputGroupFile01">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="card-body text-center">
                                                    <?php $path_ijin = pathinfo(isset($detail[0]->file_ijin_operasional), PATHINFO_EXTENSION) ?>
                                                        <?php if (isset($detail[0]->file_ijin_operasional)) { ?>
                                                            <?php if ($path_ijin == 'pdf' || $path_ijin == 'PDF') { ?>
                                                                <a href="<?php echo base_url() ?>assets/upload/document/<?php echo isset($detail[0]->file_ijin_operasional) ? $detail[0]->file_ijin_operasional : '' ?>">
                                                                    <img src="<?php echo base_url() ?>assets/img/pdf.png" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                                                </a>
                                                            <?php } else { ?>
                                                                <a href="<?php echo base_url() ?>assets/upload/document/<?php echo isset($detail[0]->file_ijin_operasional) ? $detail[0]->file_ijin_operasional : '' ?>">
                                                                    <img src="<?php echo base_url() ?>assets/upload/document/<?php echo isset($detail[0]->file_ijin_operasional) ? $detail[0]->file_ijin_operasional : '' ?>" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                                                </a>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                           <b style="color: red;">Belum Upload!</b>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="lastName11">Upload Sertikat Akreditasi</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="file_sertikat_akreditasi" class="custom-file-input" id="inputGroupFile01">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="card-body text-center">
                                                    <?php $path_sertikat = pathinfo(isset($detail[0]->file_sertikat_akreditasi), PATHINFO_EXTENSION) ?>
                                                        <?php if (isset($detail[0]->file_sertikat_akreditasi)) { ?>
                                                            <?php if ($path_sertikat == 'pdf' || $path_sertikat == 'PDF') { ?>
                                                                <a href="<?php echo base_url() ?>assets/upload/document/<?php echo isset($detail[0]->file_sertikat_akreditasi) ? $detail[0]->file_sertikat_akreditasi : '' ?>">
                                                                    <img src="<?php echo base_url() ?>assets/img/pdf.png" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                                                </a>
                                                                <?php } else { ?>
                                                                <a href="<?php echo base_url() ?>assets/upload/document/<?php echo isset($detail[0]->file_sertikat_akreditasi) ? $detail[0]->file_sertikat_akreditasi : '' ?>">
                                                                    <img src="<?php echo base_url() ?>assets/upload/document/<?php echo isset($detail[0]->file_sertikat_akreditasi) ? $detail[0]->file_sertikat_akreditasi : '' ?>" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                                                </a>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                           <b style="color: red;">Belum Upload!</b>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <p style="color:red;"><b>Note :</b>
                                                Format upload harus png, jpg, pdf
                                            </p>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Form wizard with icon tabs section end -->

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<?php require_once  'content/footer.php' ?>
<?php require_once  'content/script.php' ?>

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url() ?>app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script> 
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
    	var value = $(this).val(); 
        if (value == 'date') {
            $("#btnDate").show();
        } else {
            $("div.desc").hide();
        }
    });
});

$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});

// Wizard tabs with icons setup
$(".icons-tab-steps").steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: 'Submit'
    },
    onFinished: function (event, currentIndex) {
        event.preventDefault();
        $.ajax({
                type: 'POST',
                url: '<?php echo site_url('admin/kelembagaan-update') ?>',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('form button').on("click", function(event) {
                        event.preventDefault();
                    }); 
                },
                success: function(data) {
                    toastr.success('Data berhasil di simpan.', 'Success!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }, 
                error: function (data) {
                    toastr.error('Data fail!.', 'Yeah gagal boss!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                }
            })
    }
});
</script>
<!-- END: Page JS-->

<?php require_once  'content/end_head.php' ?> 