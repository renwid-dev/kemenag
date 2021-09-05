<?php require_once  'content/top_head.php' ?> 
<style> 
    td {
        text-align: center;
        mso-number-format:\@;
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

            <!-- table RA Start-->
            <section id="basic-ra" style="display:none;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                                <div class="dt-buttons btn-group">
                                    <a onclick="fnExcelReport('table-ra')" href="#" class="btn btn-outline-success"><i class="feather icon-download"></i> Export Excel</span></a> 
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                    <table class="table tbl-ra table-striped table-bordered complex-headers" id="table-ra">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%" style="background-color: #FFFF00;" rowspan="2">No</th>
                                                <th style="background-color: #FFFF00;" rowspan="2">Nama Madrasah</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelompok. A</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelompok. B</th>
                                                <th style="background-color: #FFFF00;" rowspan="2">Total</th>
                                            </tr>
                                            <tr class="text-center">
                                                <th style="background-color: #E9967A;">L</th>
                                                <th style="background-color: #E9967A;">P</th>
                                                <th style="background-color: #E9967A;">Jumlah</th>
                                                <th style="background-color: #90EE90;">L</th>
                                                <th style="background-color: #90EE90;">P</th>
                                                <th style="background-color: #90EE90;">Jumlah</th>
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
            <!-- table RA end -->

            <!-- table MI Start-->
            <section id="basic-mi" style="display:none;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                                <div class="dt-buttons btn-group">
                                    <a onclick="fnExcelReport('table-mi')" href="#" class="btn btn-outline-success"><i class="feather icon-download"></i> Export Excel</span></a> 
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                    <table class="table tbl-mi table-striped table-bordered complex-headers" id="table-mi">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%" style="background-color: #FFFF00;" rowspan="2">No</th>
                                                <th style="background-color: #FFFF00;" rowspan="2">Nama Madrasah</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 1</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 2</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 3</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 4</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 5</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 6</th>
                                                <th style="background-color: #FFFF00;" rowspan="2">Total</th>
                                            </tr>
                                            <tr class="text-center">
                                                <th style="background-color: #E9967A;">L</th>
                                                <th style="background-color: #E9967A;">P</th>
                                                <th style="background-color: #E9967A;">Jumlah</th>
                                                <th style="background-color: #90EE90;">L</th>
                                                <th style="background-color: #90EE90;">P</th>
                                                <th style="background-color: #90EE90;">Jumlah</th>
                                                <th style="background-color: #E9967A;">L</th>
                                                <th style="background-color: #E9967A;">P</th>
                                                <th style="background-color: #E9967A;">Jumlah</th>
                                                <th style="background-color: #90EE90;">L</th>
                                                <th style="background-color: #90EE90;">P</th>
                                                <th style="background-color: #90EE90;">Jumlah</th>
                                                <th style="background-color: #E9967A;">L</th>
                                                <th style="background-color: #E9967A;">P</th>
                                                <th style="background-color: #E9967A;">Jumlah</th>
                                                <th style="background-color: #90EE90;">L</th>
                                                <th style="background-color: #90EE90;">P</th>
                                                <th style="background-color: #90EE90;">Jumlah</th>
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
            <!-- table MI end -->

            <!-- table MTs Start-->
            <section id="basic-mts" style="display:none;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                                <div class="dt-buttons btn-group">
                                    <a onclick="fnExcelReport('table-mts')" href="#" class="btn btn-outline-success"><i class="feather icon-download"></i> Export Excel</span></a> 
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                    <table class="table tbl-mts table-striped table-bordered complex-headers" id="table-mts">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%" style="background-color: #FFFF00;" rowspan="2">No</th>
                                                <th style="background-color: #FFFF00;" rowspan="2">Nama Madrasah</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 7</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 8</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 9</th>
                                                <th style="background-color: #FFFF00;" rowspan="2">Total</th>
                                            </tr>
                                            <tr class="text-center">
                                                <th style="background-color: #E9967A;">L</th>
                                                <th style="background-color: #E9967A;">P</th>
                                                <th style="background-color: #E9967A;">Jumlah</th>
                                                <th style="background-color: #90EE90;">L</th>
                                                <th style="background-color: #90EE90;">P</th>
                                                <th style="background-color: #90EE90;">Jumlah</th>
                                                <th style="background-color: #E9967A;">L</th>
                                                <th style="background-color: #E9967A;">P</th>
                                                <th style="background-color: #E9967A;">Jumlah</th>
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
            <!-- table MTs end -->

            <!-- table MA Start-->
            <section id="basic-ma" style="display:none;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                                <div class="dt-buttons btn-group">
                                    <a onclick="fnExcelReport('table-ma')" href="#" class="btn btn-outline-success"><i class="feather icon-download"></i> Export Excel</span></a> 
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                    <table class="table tbl-ma table-striped table-bordered complex-headers" id="table-ma">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%" style="background-color: #FFFF00;" rowspan="2">No</th>
                                                <th style="background-color: #FFFF00;" rowspan="2">Nama Madrasah</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 10</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 11</th>
                                                <th style="background-color: #00FFFF;" colspan="3">Kelas. 12</th>
                                                <th style="background-color: #FFFF00;" rowspan="2">Total</th>
                                            </tr>
                                            <tr class="text-center">
                                                <th style="background-color: #E9967A;">L</th>
                                                <th style="background-color: #E9967A;">P</th>
                                                <th style="background-color: #E9967A;">Jumlah</th>
                                                <th style="background-color: #90EE90;">L</th>
                                                <th style="background-color: #90EE90;">P</th>
                                                <th style="background-color: #90EE90;">Jumlah</th>
                                                <th style="background-color: #E9967A;">L</th>
                                                <th style="background-color: #E9967A;">P</th>
                                                <th style="background-color: #E9967A;">Jumlah</th>
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
            <!-- table MA end -->

        </div>
    </div>
</div>
<!-- END: Content-->


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

    //form data search
    $('#formFilter').submit(function(e) {
        var jenjang = $('#jenjang').val();
        e.preventDefault();
        $.ajax({
            type: 'get',
            url: '<?php echo site_url('admin/rekap-kesfilter') ?>',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                console.log(jenjang);
                if (jenjang == 'RA') {
                    $('#basic-ra').show();
                    $('#basic-mi').hide();
                    $('#basic-mts').hide();
                    $('#basic-ma').hide();

                    $('.tbl-ra').DataTable( {
                        colReorder: {
                            realtime: true
                        },
                        destroy: true,
                        lengthChange: false,
                        searching: false,
                        ordering: false,
                        info: true,
                        paging: false,
                        data: data,
                    });      
                } else if (jenjang == 'MI') {
                    $('#basic-ra').hide();
                    $('#basic-mi').show();
                    $('#basic-mts').hide();
                    $('#basic-ma').hide();
                    $('.tbl-mi').DataTable( {
                        colReorder: {
                            realtime: true
                        },
                        destroy: true,
                        lengthChange: false,
                        searching: false,
                        ordering: false,
                        info: true,
                        paging: false,
                        data: data,
                    });    
                } else if (jenjang == 'MTs') {
                    $('#basic-ra').hide();
                    $('#basic-mi').hide();
                    $('#basic-mts').show();
                    $('#basic-ma').hide();
                    $('.tbl-mts').DataTable( {
                        colReorder: {
                            realtime: true
                        },
                        destroy: true,
                        lengthChange: false,
                        searching: false,
                        ordering: false,
                        info: true,
                        paging: false,
                        data: data,
                    });    
                } else if (jenjang == 'MA') {
                    $('#basic-ra').hide();
                    $('#basic-mi').hide();
                    $('#basic-mts').hide();
                    $('#basic-ma').show();
                    $('.tbl-ma').DataTable( {
                        colReorder: {
                            realtime: true
                        },
                        destroy: true,
                        lengthChange: false,
                        searching: false,
                        ordering: false,
                        info: true,
                        paging: false,
                        data: data,
                    });    
                } 
            }, 
            error: function (data) {
                toastr.error('Data fail!.', 'Errors!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
            }
        })
    });

    function fnExcelReport(tab_id){
        var tab_text="<table border='2px'><tr>";
        var textRange; var j=0;
        tab = document.getElementById(tab_id);

        for (j = 0 ; j < tab.rows.length ; j++){     
            tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        }

        tab_text=tab_text+"</table>";
        tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");
        tab_text= tab_text.replace(/<img[^>]*>/gi,"");
        tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, "");

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE "); 

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)){
            txtArea1.document.open("txt/html","replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus(); 
            sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Submit.xls");
        } else 
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

        return (sa);
    }

</script>

<?php require_once  'content/end_head.php' ?> 
