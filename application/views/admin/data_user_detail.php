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
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/data_user') ?>">Data User</a>
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
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addDTuser"><span><i class="feather icon-plus"></i> Add Tahun Pelajaran</span></button> 
                </div>
                <a href="<?= site_url('admin/data_user') ?>" class="btn btn-outline-warning"><span><i class="fa fa-arrow-circle-left"></i> Kembali</span></a> 
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
                                        <table class="table table-list" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>Kode</th>
                                                    <th>Jenjang</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th>Semester</th>
                                                    <th width="5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($list_kesiswaan as $row) : ?>
                                                <tr>
                                                    <td><?php echo $row->kode ?></td>
                                                    <td><?php echo $row->jenjang_lembaga ?></td>
                                                    <td><?php echo $row->tahun_pelajaran ?></td>
                                                    <td><?php echo $row->semester ?></td>
                                                    <td>
                                                    <button data-id="<?php echo $row->id_kesiswaan ?>" class="hapus btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>    
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
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->

 <!--/ add Data User -->
 <div class="modal fade" id="addDTuser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <form id="formAdd" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Add Tahun Pelajaran</h5>
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
                                        <tr>
                                            <th><input type="checkbox" id="select_all"></th>
                                            <th>Kode</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($setting_tahun as $row) : ?>
                                            <tr>
                                                <input type="hidden" name="id_lembaga[]" value="<?php echo $lembaga[0]->id_lembaga ?>">
                                                <input type="hidden" name="jenjang[]" value="<?php echo $lembaga[0]->jenjang ?>">
                                                <td><input type="checkbox" class="checkbox" name="id_setting[]" value="<?php echo $row->id_setting ?>" /></td>
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
            </form>
        </div>
    </div>
</div>


<?php require_once 'content/footer.php' ?> 

<?php require_once 'content/script.php' ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });

    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });

    $(".data-list-view").DataTable({
        // responsive: false,
        aLengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
        select: {
        style: "multi"
        },
        order: [[1, "asc"]],
        // bInfo: false,
        // targets: 'no-sort',
        bSort: false,
        pageLength: 5,
    });
 
    $(".table-list").DataTable({
        responsive: true,
        aLengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
        select: {
        style: "multi"
        },
        order: [[1, "asc"]],
        // bInfo: false,
        pageLength: 5,
    });

    // form add user
    $('#formAdd').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url() ?>admin/data_user_addDetail',
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
                    url: '<?php echo site_url('admin/data_user_deleteDetail') ?>',
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
