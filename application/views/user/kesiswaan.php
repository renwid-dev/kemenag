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

                                        <?php if ($user[0]->jenjang == 'RA') { ?>
                                        <table class="table tbl-kesiswaan table-striped table-bordered complex-headers" id="table-1">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="5%" rowspan="2">No</th>
                                                    <th rowspan="2">Tahun Pelajaran</th>
                                                    <th rowspan="2">Semester</th>
                                                    <th colspan="2">Kelompok. A</th>
                                                    <th colspan="2">Kelompok. B</th>
                                                    <th colspan="2">Jumlah</th>
                                                    <th rowspan="2">Total</th>
                                                    <th rowspan="2">Action</th>
                                                </tr>
                                                <tr class="text-center">
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <?php } elseif ($user[0]->jenjang == 'MI') { ?>
                                            <table class="table tbl-kesiswaan table-striped table-bordered complex-headers" id="table-1">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="5%" rowspan="2">No</th>
                                                    <th rowspan="2">Tahun Pelajaran</th>
                                                    <th rowspan="2">Semester</th>
                                                    <th colspan="2">Kelas. 1</th>
                                                    <th colspan="2">Kelas. 2</th>
                                                    <th colspan="2">Kelas. 3</th>
                                                    <th colspan="2">Kelas. 4</th>
                                                    <th colspan="2">Kelas. 5</th>
                                                    <th colspan="2">Kelas. 6</th>
                                                    <th colspan="2">Jumlah</th>
                                                    <th rowspan="2">Total</th>
                                                    <th rowspan="2">Action</th>
                                                </tr>
                                                <tr class="text-center">
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <?php } elseif ($user[0]->jenjang == 'MTs') { ?>
                                            <table class="table tbl-kesiswaan table-striped table-bordered complex-headers" id="table-1">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="5%" rowspan="2">No</th>
                                                    <th rowspan="2">Tahun Pelajaran</th>
                                                    <th rowspan="2">Semester</th>
                                                    <th colspan="2">Kelas. 7</th>
                                                    <th colspan="2">Kelas. 8</th>
                                                    <th colspan="2">Kelas. 9</th>
                                                    <th colspan="2">Jumlah</th>
                                                    <th rowspan="2">Total</th>
                                                    <th rowspan="2">Action</th>
                                                </tr>
                                                <tr class="text-center">
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <?php } elseif ($user[0]->jenjang == 'MA') { ?>
                                            <table class="table tbl-kesiswaan table-striped table-bordered complex-headers" id="table-1">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="5%" rowspan="2">No</th>
                                                    <th rowspan="2">Tahun Pelajaran</th>
                                                    <th rowspan="2">Semester</th>
                                                    <th colspan="2">Kelas. 10</th>
                                                    <th colspan="2">Kelas. 11</th>
                                                    <th colspan="2">Kelas. 12</th>
                                                    <th colspan="2">Jumlah</th>
                                                    <th rowspan="2">Total</th>
                                                    <th rowspan="2">Action</th>
                                                </tr>
                                                <tr class="text-center">
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <?php } ?>

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
<div class="modal fade" id="edt_aditional" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <form id="formAdt" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Kesiswaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_kesiswaan" name="id_kesiswaan">
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

                    <?php if ($user[0]->jenjang == 'RA') { ?>
                    <!-- RA Start -->
                    <center><label><b>Kelompok A</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="number" id="kelompok_AL" name="kelompok_AL" class="touchspin-color rakel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="number" id="kelompok_AP" name="kelompok_AP" class="touchspin-color rakel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>                         
                    <center><label><b>Kelompok B</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="number" id="kelompok_BL" name="kelompok_BL" class="touchspin-color rakel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="number" id="kelompok_BP" name="kelompok_BP" class="touchspin-color rakel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Total</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group disabled-touchspin">
                                L <input type="text" id="total_rakel_L" name="total_rakel_L" class="touchspin-color" value="0" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group disabled-touchspin">
                                P <input type="text" id="total_rakel_P" name="total_rakel_P" class="touchspin-color" value="0" readonly/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- RA End -->
                    <?php } elseif ($user[0]->jenjang == 'MI') { ?>
                    <!-- MI Start -->
                    <center><label><b>Kelas 1</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas1_L" name="kelas1_L" class="touchspin-color mikel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas1_P" name="kelas1_P" class="touchspin-color mikel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>                         
                    <center><label><b>Kelas 2</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas2_L" name="kelas2_L" class="touchspin-color mikel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas2_P" name="kelas2_P" class="touchspin-color mikel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Kelas 3</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas3_L" name="kelas3_L" class="touchspin-color mikel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas3_P" name="kelas3_P" class="touchspin-color mikel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Kelas 4</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas4_L" name="kelas4_L" class="touchspin-color mikel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas4_P" name="kelas4_P" class="touchspin-color mikel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Kelas 5</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas5_L" name="kelas5_L" class="touchspin-color mikel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas5_P" name="kelas5_P" class="touchspin-color mikel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Kelas 6</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas6_L" name="kelas6_L" class="touchspin-color mikel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas6_P" name="kelas6_P" class="touchspin-color mikel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Total</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group disabled-touchspin">
                                L <input type="text" id="total_mikel_L" name="total_mikel_L" class="touchspin-color" value="0" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group disabled-touchspin">
                                P <input type="text" id="total_mikel_P" name="total_mikel_P" class="touchspin-color" value="0" readonly/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- MI End -->
                    <?php } elseif ($user[0]->jenjang == 'MTs') { ?>
                    <!-- MTs Start -->
                    <center><label><b>Kelas 7</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas7_L" name="kelas7_L" class="touchspin-color mtkel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas7_P" name="kelas7_P" class="touchspin-color mtkel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Kelas 8</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas8_L" name="kelas8_L" class="touchspin-color mtkel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas8_P" name="kelas8_P" class="touchspin-color mtkel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Kelas 9</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas9_L" name="kelas9_L" class="touchspin-color mtkel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas9_P" name="kelas9_P" class="touchspin-color mtkel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Total</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group disabled-touchspin">
                                L <input type="text" id="total_mtkel_L" name="total_mtkel_L" class="touchspin-color" value="0" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group disabled-touchspin">
                                P <input type="text" id="total_mtkel_P" name="total_mtkel_P" class="touchspin-color" value="0" readonly/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- MTs End -->
                    <?php } elseif ($user[0]->jenjang == 'MA') { ?>
                    <!-- MA Start -->
                    <center><label><b>Kelas 10</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas10_L" name="kelas10_L" class="touchspin-color makel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas10_P" name="kelas10_P" class="touchspin-color makel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Kelas 11</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas11_L" name="kelas11_L" class="touchspin-color makel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas11_P" name="kelas11_P" class="touchspin-color makel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Kelas 12</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                L <input type="text" id="kelas12_L" name="kelas12_L" class="touchspin-color makel_L" value="0" data-bts-button-down-class="btn btn-danger" data-bts-button-up-class="btn btn-danger" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                P <input type="text" id="kelas12_P" name="kelas12_P" class="touchspin-color makel_P" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <center><label><b>Total</b></label></center><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group disabled-touchspin">
                                L <input type="text" id="total_makel_L" name="total_makel_L" class="touchspin-color" value="0" readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group disabled-touchspin">
                                P <input type="text" id="total_makel_P" name="total_makel_P" class="touchspin-color" value="0" readonly/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- MA End -->
                    <?php } ?>

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

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url() ?>app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
<script src="<?php echo base_url() ?>app-assets/js/scripts/forms/number-input.js"></script>
<!-- END: Page Vendor JS-->

<script type="text/javascript">
    $(document).ready(function () {
        //List Kesiswaan
        $('.tbl-kesiswaan').DataTable({
            "ajax": "<?php echo site_url('user/kesiswaan_list')?>",
            "processing": true,
            "order": [0, "asc"],
        });

        //get data kesiswaan
        $('#table-1').on('click', '.edit', function() {
            $("#formAdt")[0].reset();
            var id = $(this).data('id');
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('user/kesiswaan_get') ?>',
                data: {id : id},
                dataType: 'json',
                success: function (data) {
                    
                    $('#edt_aditional').modal('show');
                    $('#id_kesiswaan').val(data[0].id_kesiswaan);
                    $('#tahun_pelajaran').val(data[0].tahun_pelajaran);
                    $('#semester').val(data[0].semester);
                    //RA
                    $('#kelompok_AL').val(data[0].kelompok_AL);
                    $('#kelompok_AP').val(data[0].kelompok_AP);
                    $('#kelompok_BL').val(data[0].kelompok_BL);
                    $('#kelompok_BP').val(data[0].kelompok_BP);
                    $('#total_rakel_L').val(data[0].total_rakel_L);
                    $('#total_rakel_P').val(data[0].total_rakel_P);
                    //MI
                    $('#kelas1_L').val(data[0].kelas1_L);
                    $('#kelas1_P').val(data[0].kelas1_P);
                    $('#kelas2_L').val(data[0].kelas2_L);
                    $('#kelas2_P').val(data[0].kelas2_P);
                    $('#kelas3_L').val(data[0].kelas3_L);
                    $('#kelas3_P').val(data[0].kelas3_P);
                    $('#kelas4_L').val(data[0].kelas4_L);
                    $('#kelas4_P').val(data[0].kelas4_P);
                    $('#kelas5_L').val(data[0].kelas5_L);
                    $('#kelas5_P').val(data[0].kelas5_P);
                    $('#kelas6_L').val(data[0].kelas6_L);
                    $('#kelas6_P').val(data[0].kelas6_P);
                    $('#total_mikel_L').val(data[0].total_mikel_L);
                    $('#total_mikel_P').val(data[0].total_mikel_P);
                    //MTs
                    $('#kelas7_L').val(data[0].kelas7_L);
                    $('#kelas7_P').val(data[0].kelas7_P);
                    $('#kelas8_L').val(data[0].kelas8_L);
                    $('#kelas8_P').val(data[0].kelas8_P);
                    $('#kelas9_L').val(data[0].kelas9_L);
                    $('#kelas9_P').val(data[0].kelas9_P);
                    $('#total_mtkel_L').val(data[0].total_mtkel_L);
                    $('#total_mtkel_P').val(data[0].total_mtkel_P);
                    //MA
                    $('#kelas10_L').val(data[0].kelas10_L);
                    $('#kelas10_P').val(data[0].kelas10_P);
                    $('#kelas11_L').val(data[0].kelas11_L);
                    $('#kelas11_P').val(data[0].kelas11_P);
                    $('#kelas12_L').val(data[0].kelas12_L);
                    $('#kelas12_P').val(data[0].kelas12_P);
                    $('#total_makel_L').val(data[0].total_makel_L);
                    $('#total_makel_P').val(data[0].total_makel_P);
                },
            })            
        });

        // form edit kesiswaan
        $('#formAdt').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('user/kesiswaan_adt') ?>',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(created) {
                    toastr.success('Data berhasil di simpah.', 'Success!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#edt_aditional').modal('hide');
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

    //Auto calculate function start
    $('.rakel_L, .bootstrap-touchspin-down, .bootstrap-touchspin-up').on('click', function() {
        $('#total_rakel_L').val(function () {
            var sum = 0;
            $('.rakel_L').each(function() {
                sum += parseFloat($(this).val());
            });
            if(isNaN(sum)) sum = "";
            return sum;
        });
    });

    $('.rakel_P, .bootstrap-touchspin-down, .bootstrap-touchspin-up').on('click', function() {
        var sum = 0;
        $('.rakel_P').each(function() {
           sum += parseFloat($(this).val());
        });
        if(isNaN(sum)) sum = "";
        $('#total_rakel_P').val(sum);
    });

    $('.mikel_L, .bootstrap-touchspin-down, .bootstrap-touchspin-up').on('click', function() {
        $('#total_mikel_L').val(function () {
            var result = 0;
            $('.mikel_L').each(function() {
                result += parseFloat($(this).val());
            });
            if(isNaN(result)) result = "";
            return result;
        });
    });

    $('.mikel_P, .bootstrap-touchspin-down, .bootstrap-touchspin-up').on('click', function() {
        $('#total_mikel_P').val(function () {
            var result = 0;
            $('.mikel_P').each(function() {
                result += parseFloat($(this).val());
            });
            if(isNaN(result)) result = "";
            return result;
        });
    });
    
    $('.mtkel_L, .bootstrap-touchspin-down, .bootstrap-touchspin-up').on('click', function() {
        $('#total_mtkel_L').val(function () {
            var result = 0;
            $('.mtkel_L').each(function() {
                result += parseFloat($(this).val());
            });
            if(isNaN(result)) result = "";
            return result;
        });
    });

    $('.mtkel_P, .bootstrap-touchspin-down, .bootstrap-touchspin-up').on('click', function() {
        $('#total_mtkel_P').val(function () {
            var result = 0;
            $('.mtkel_P').each(function() {
                result += parseFloat($(this).val());
            });
            if(isNaN(result)) result = "";
            return result;
        });
    });

    $('.makel_L, .bootstrap-touchspin-down, .bootstrap-touchspin-up').on('click', function() {
        $('#total_makel_L').val(function () {
            var result = 0;
            $('.makel_L').each(function() {
                result += parseFloat($(this).val());
            });
            if(isNaN(result)) result = "";
            return result;
        });
    });

    $('.makel_P, .bootstrap-touchspin-down, .bootstrap-touchspin-up').on('click', function() {
        $('#total_makel_P').val(function () {
            var result = 0;
            $('.makel_P').each(function() {
                result += parseFloat($(this).val());
            });
            if(isNaN(result)) result = "";
            return result;
        });
    });
    //Auto calculate function end

</script>

<?php require_once  'content/end_head.php' ?> 
