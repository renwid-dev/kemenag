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
            <!-- users filter start -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Filters</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                            <li><a data-action=""><i class="feather icon-rotate-cw users-data-filter"></i></a></li>
                            <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="users-list-filter">
                            <form id="formFilter">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-2">
                                        <label for="kode-tahun">Kode Tahun</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" name="xkode" id="kode-tahun">
                                                <option value="">All</option>
                                                <?php foreach ($tahun as $row) : ?>
                                                    <option value="<?php echo $row->kode ?>"><?php echo $row->kode ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-2">
                                        <label for="tahun-pelajaran">Tahun Pelajaran</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" name="kode" id="tahun-pelajaran">
                                                <option value=""></option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-2">
                                        <label for="semester">Semester</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" name="semester" id="id_semester">
                                                <option value=""></option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-2">
                                        <label for="jenjang">Jenjang</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" name="jenjang" id="jenjang">
                                                <option value="">All</option>
                                                <?php foreach ($jenjang as $row) : ?>
                                                    <option value="<?php echo $row->deskripsi ?>"><?php echo $row->deskripsi ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-2">
                                        <label for="kecamatan">Kecamatan</label>
                                        <fieldset class="form-group">
                                            <select class="form-control" name="code_kec" id="kecamatan">
                                                <option value="">All</option>
                                                <?php foreach ($kec as $row) : ?>
                                                    <option value="<?php echo $row->code ?>"><?php echo $row->kecamatan ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-2">
                                        <label></label>
                                        <fieldset class="form-group">
                                            <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- users filter end -->
            <!-- table -->
            <section id="basic-datatable" style="display:none;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            
                            <div class="card-content">
                                <div id="bodyreset" class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table tbl-filter" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Madrasah</th>
                                                    <th>Tahun Pelajaran</th>
                                                    <th>Semester</th>
                                                    <th>Jenjang</th>
                                                    <th>Kecamatan</th>
                                                    <th>Status</th>
                                                    <th width="5%">Action</th>
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
                            <input type="text" id="dataSemester" class="form-control" name="semester" placeholder="Tahun Pelajaran" readonly>
                        </div>
                    </div>

                    <!-- RA Start -->
                    <div id="divRa">
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
                    </div>
                    <!-- RA End -->


                    <!-- MI Start -->
                    <div id="divMi">
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
                    </div>
                    <!-- MI End -->
                    
                    
                    <!-- MTs Start -->
                    <div id="divMts">
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
                    </div>
                    <!-- MTs End -->
                    

                    <!-- MA Start -->
                    <div id="divMa">
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
                    </div>
                    <!-- MA End -->


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

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url() ?>app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
<script src="<?php echo base_url() ?>app-assets/js/scripts/forms/number-input.js"></script>
<!-- END: Page Vendor JS-->

<script type="text/javascript">

    $(".users-data-filter").click(function () {
        $('#kode-tahun').prop('selectedIndex', 0);
        $('#kode-tahun').change();
        $('#tahun-pelajaran').prop('selectedIndex', 0);
        $('#tahun-pelajaran').change();
        $('#id_semester').prop('selectedIndex', 0);
        $('#id_semester').change();
        $('#jenjang').prop('selectedIndex', 0);
        $('#jenjang').change();
        $('#kecamatan').prop('selectedIndex', 0);
        $('#kecamatan').change();
    });

    //form data search
    $('#formFilter').submit(function(e) {
        $('#basic-datatable').show();
        e.preventDefault();
        $.ajax({
            type: 'get',
            url: '<?php echo site_url('admin/kesiswaan_search') ?>',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                $('.tbl-filter').DataTable( {
                    colReorder: {
                        realtime: true
                    },
                    destroy: true,
                    data: data,
                });      
            }, 
            error: function (data) {
                toastr.error('Data fail!.', 'Errors!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
            }
        })
    });

    $('#kode-tahun').on('change', function () {
        var code = $(this).val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url('admin/kesiswaan_tahun') ?>',
            dataType: 'json',
            data: {code: code},
            success: function (data) {
                var option = '';
                var tahun = '';
                var i;

                for (let i = 0; i < data.length; i++) {
                    tahun += "<option value=" + data[i].kode + ">" + data[i].tahun_pelajaran + "</option>";
                    option += "<option value=" + data[i].semester + ">" + data[i].semester + "</option>";
                }

                $('#id_semester').html(option);
                $('#tahun-pelajaran').html(tahun);
            }
        })
    });
    
    //get data kesiswaan
    $('#table-1').on('click', '.edit', function() {
        var id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('admin/kesiswaan_get') ?>',
            data: {id : id},
            dataType: 'json',
            success: function (data) {
                
                $('#edt_aditional').modal('show');
                $('#id_kesiswaan').val(data[0].id_kesiswaan);
                $('#nama_madrasah').val(data[0].nama_madrasah);
                $('#tahun_pelajaran').val(data[0].tahun_pelajaran);
                $('#dataSemester').val(data[0].semester);

                if (data[0].jenjang == 'RA') {
                //RA START
                $('#divRa').show();
                $('#divMi').hide();
                $('#divMts').hide();
                $('#divMa').hide();
                $('#kelompok_AL').val(data[0].kelompok_AL);
                $('#kelompok_AP').val(data[0].kelompok_AP);
                $('#kelompok_BL').val(data[0].kelompok_BL);
                $('#kelompok_BP').val(data[0].kelompok_BP);
                $('#total_rakel_L').val(data[0].total_rakel_L);
                $('#total_rakel_P').val(data[0].total_rakel_P);
                //RA END
                } else if (data[0].jenjang == 'MI') {
                //MI START
                $('#divRa').hide();
                $('#divMi').show();
                $('#divMts').hide();
                $('#divMa').hide();
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
                //MI END
                } else if (data[0].jenjang == 'MTs') {
                //MTs START
                $('#divRa').hide();
                $('#divMi').hide();
                $('#divMts').show();
                $('#divMa').hide();
                $('#kelas7_L').val(data[0].kelas7_L);
                $('#kelas7_P').val(data[0].kelas7_P);
                $('#kelas8_L').val(data[0].kelas8_L);
                $('#kelas8_P').val(data[0].kelas8_P);
                $('#kelas9_L').val(data[0].kelas9_L);
                $('#kelas9_P').val(data[0].kelas9_P);
                $('#total_mtkel_L').val(data[0].total_mtkel_L);
                $('#total_mtkel_P').val(data[0].total_mtkel_P);
                //MTs END
                } else if (data[0].jenjang == 'MA') {
                //MA START
                $('#divRa').hide();
                $('#divMi').hide();
                $('#divMts').hide();
                $('#divMa').show();
                $('#kelas10_L').val(data[0].kelas10_L);
                $('#kelas10_P').val(data[0].kelas10_P);
                $('#kelas11_L').val(data[0].kelas11_L);
                $('#kelas11_P').val(data[0].kelas11_P);
                $('#kelas12_L').val(data[0].kelas12_L);
                $('#kelas12_P').val(data[0].kelas12_P);
                $('#total_makel_L').val(data[0].total_makel_L);
                $('#total_makel_P').val(data[0].total_makel_P);
                //MA END
                }
            },
        })            
    });

    // form edit kesiswaan
    $('#formAdt').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/kesiswaan_update') ?>',
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
                // setTimeout(function() {
                //     window.location.reload();
                // }, 2000);
            }
        })
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
        $('#total_rakel_P').val(function () {
            var sum = 0;
            $('.rakel_P').each(function() {
                sum += parseFloat($(this).val());
            });
            if(isNaN(sum)) sum = "";
            return sum;
        });
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
