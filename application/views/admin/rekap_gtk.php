<?php require_once  'content/top_head.php' ?> 
<style> 
    td {
        mso-number-format:\@;
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
                                <div class="dt-buttons btn-group">
                                    <a onclick="fnExcelReport()" href="#" class="btn btn-outline-success"><i class="feather icon-download"></i> Export Excel</span></a> 
                                </div>
                            </div>
                            
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">

                                        <table class="table tbl-filter table-striped table-bordered complex-headers" id="table-1">
                                            <thead>
                                                <tr class="text-center">
                                                    <th style="background-color: #FFFF00;" width="5%" rowspan="3">No</th>
                                                    <th style="background-color: #FFFF00;" width="30%" rowspan="3">Nama Madrasah</th>
                                                    <th style="background-color: #FFFF00;" width="30%" rowspan="3">Jenjang</th>
                                                    <th style="background-color: #FFFF00;" width="30%" rowspan="3">Kecamatan</th>
                                                    <th style="background-color: #00FFFF;" width="50%" colspan="9">Guru</th>
                                                    <th style="background-color: #00FFFF;" width="50%" colspan="4">Tendik</th>
                                                    <th style="background-color: #FFFF00;" width="15%" rowspan="3">Total Guru</th>
                                                    <th style="background-color: #FFFF00;" width="15%" rowspan="3">Total Tendik</th>
                                                </tr>
                                                <tr class="text-center">
                                                    <th style="background-color: #E9967A;" colspan="4">PNS</th>
                                                    <th style="background-color: #90EE90;" colspan="5">Honorer</th>
                                                    <th style="background-color: #E9967A;" colspan="2">PNS</th>
                                                    <th style="background-color: #90EE90;" colspan="2">Honorer</th>
                                                </tr>
                                                <tr class="text-center">
                                                    <th style="background-color: #E9967A; width: 10%;">L</th>
                                                    <th style="background-color: #E9967A; width: 10%;">P</th>
                                                    <th style="background-color: #E9967A; width: 10%;">Serti</th>
                                                    <th style="background-color: #E9967A; width: 10%;">Non Serti</th>
                                                    <th style="background-color: #90EE90; width: 10%;">L</th>
                                                    <th style="background-color: #90EE90; width: 10%;">P</th>
                                                    <th style="background-color: #90EE90; width: 10%;">Serti</th>
                                                    <th style="background-color: #90EE90; width: 10%;">Non Serti</th>
                                                    <th style="background-color: #90EE90; width: 10%;">Inpassing</th>
                                                    <th style="background-color: #E9967A; width: 10%;">L</th>
                                                    <th style="background-color: #E9967A; width: 10%;">P</th>
                                                    <th style="background-color: #90EE90; width: 10%;">L</th>
                                                    <th style="background-color: #90EE90; width: 10%;">P</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="background-color: #FFFF00; text-align: center;" colspan="4">Total</th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #00FFFF;"></th>
                                                    <th class="result" style="background-color: #FFFF00;"></th>
                                                    <th class="result" style="background-color: #FFFF00;"></th>
                                                </tr>
                                            </tfoot>
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

<?php require_once 'content/footer.php' ?> 

<?php require_once 'content/script.php' ?>

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
            url: '<?php echo site_url('admin/rekap-gtkfilter') ?>',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                $('.tbl-filter').DataTable( {
                    colReorder: {
                        realtime: true
                    },
                    destroy: true,
                    data: data,
                    lengthChange: false,
                    searching: false,
                    ordering: false,
                    info: true,
                    paging: false,
                    footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(), data;
            
                        // converting to interger to find total
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };
            
                        // computing column Total of the complete result 
                        var col4 = api
                            .column(4)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                            
                        var col5 = api
                            .column(5)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                            
                        var col6 = api
                            .column(6)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                            
                        var col7 = api
                            .column(7)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                            
                        var col8 = api
                            .column(8)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        var col9 = api
                            .column(9)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        var col10 = api
                            .column(10)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        var col11 = api
                            .column(11)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );  
                        
                        var col12 = api
                            .column(12)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                        
                        var col13 = api
                            .column(13)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                        
                        var col14 = api
                            .column(14)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                        
                        var col15 = api
                            .column(15)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        var col16 = api
                            .column(16)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                        
                        var totalGuru = api
                            .column(17)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        var totalTendik = api
                            .column(18)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        // Update footer by showing the total with the reference of the column index 
                        $(api.column(0).footer()).html('Total');
                            $(api.column(4).footer()).html(col4);
                            $(api.column(5).footer()).html(col5);
                            $(api.column(6).footer()).html(col6);
                            $(api.column(7).footer()).html(col7);
                            $(api.column(8).footer()).html(col8);
                            $(api.column(9).footer()).html(col9);
                            $(api.column(10).footer()).html(col10);
                            $(api.column(11).footer()).html(col11);
                            $(api.column(12).footer()).html(col12);
                            $(api.column(13).footer()).html(col13);
                            $(api.column(14).footer()).html(col14);
                            $(api.column(15).footer()).html(col15);
                            $(api.column(16).footer()).html(col16);
                            $(api.column(17).footer()).html(totalGuru);
                            $(api.column(18).footer()).html(totalTendik);
                    },
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
            url: '<?php echo base_url('admin/gtk_tahun') ?>',
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

    function fnExcelReport(){
        var tab_text="<table border='2px'><tr>";
        var textRange; var j=0;
        tab = document.getElementById('table-1');

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
