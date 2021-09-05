<?php require_once  'content/top_head.php' ?> 
<style>
    td {
        text-align: center;
    }
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
                                <li class="breadcrumb-item"><a href="<?= site_url('user/dashboard') ?>">Home</a>
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

                                        <table class="table tbl-gtk table-striped table-bordered complex-headers" id="table-1">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="5%" rowspan="2">No</th>
                                                    <th rowspan="2">Tahun Pelajaran</th>
                                                    <th rowspan="2">Semester</th>
                                                    <th colspan="2">Guru</th>
                                                    <th colspan="2">Tendik</th>
                                                    <th colspan="2">Jumlah</th>
                                                    <th rowspan="2">Total</th>
                                                    <th colspan="2">Action</th>
                                                </tr>
                                                <tr class="text-center">
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>Import</th>
                                                    <th>Edit</th>
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

<!--/ adt setting -->
<div class="modal fade" id="mdl_import" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <form id="formImport" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Import GTK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_tahun" name="id_tahun">
                    <input type="hidden" id="id_gtk" name="id_gtk">
                    <input type="hidden" name="id_lembaga" value="<?php echo $user[0]->id_lembaga ?>">
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Tahun Pelajaran</label>
                            <input type="text" id="tahun_pelajaran" class="form-control" name="tahun_pelajaran" placeholder="Tahun Pelajaran" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Semester</label>
                            <input type="text" id="semester" class="form-control" name="semester" placeholder="Tahun Pelajaran" readonly>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <label for="basicInputFile">Format harus .xls atau .xlsx</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="userfile">
                            <label class="custom-file-label" for="file-import"></label>
                        </div>
                    </fieldset>
                    <br>
                    <p>download format xls/xlsx <a href="<?php echo site_url('assets/format/format-gtk.xlsx') ?>">disini</a></p>
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
<?php require_once  'content/script.php' ?> 

<script type="text/javascript">
    $(document).ready(function () {
        //List Kesiswaan
        $('.tbl-gtk').DataTable({
            "ajax": "<?php echo site_url('user/gtk_list')?>",
            "processing": true,
            "order": [0, "asc"],
        });

        //get data kesiswaan
        $('#table-1').on('click', '.import', function() {
            var id = $(this).data('id');
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('user/gtk_data') ?>',
                data: {id : id},
                dataType: 'json',
                success: function (data) {
                    $('#mdl_import').modal('show');
                    $('#id_tahun').val(data[0].id_setting);
                    $('#id_gtk').val(data[0].id_gtk);
                    $('#tahun_pelajaran').val(data[0].tahun_pelajaran);
                    $('#semester').val(data[0].semester);
                },
            })            
        });

        //Form multipart/data
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        // form edit kesiswaan
        $('#formImport').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('user/gtk_import') ?>',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function(created) {
                    toastr.success('Data berhasil di simpah.', 'Success!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#mdl_import').modal('hide');
                    $('#formAdt').load(location.href + ' #bodyreset');
                }, 
                error: function (data) {
                    toastr.error('Data fail!.', 'Errors!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            })
        });
    
    });
</script>

<?php require_once  'content/end_head.php' ?> 
