<?php require_once  'content/top_head.php' ?> 

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                   
                   <!-- Kesiswaan Chart Start -->
                   <div class="row">
                        <!-- Kesiswaan -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Kesiswaan</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pl-0">
                                        <div class="height-300">
                                            <canvas id="kesiswaan"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                                                <label for="kode-tahun">Kode Tahun</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="xkode" id="kode-tahun">
                                                        <?php foreach ($tahun as $row) : ?>
                                                            <option value="<?php echo $row->kode ?>"><?php echo $row->kode ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </fieldset>
                                                <label for="tahun-pelajaran">Tahun Pelajaran</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="kode" id="tahun-pelajaran">
                                                        <option value=""></option>
                                                    </select>
                                                </fieldset>
                                                <label for="semester">Semester</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" name="semester" id="id_semester">
                                                        <option value=""></option>
                                                    </select>
                                                </fieldset>
                                                
                                                
                                                <fieldset class="form-group">
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- users filter end -->
                        </div>
                        <!-- Kesiswaan -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">GTK</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pl-0">
                                        <div class="height-300">
                                            <canvas id="gtk"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <!-- Kesiswaan Chart End -->
                    
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php require_once  'content/footer.php' ?> 
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url() ?>app-assets/vendors/js/charts/chart.min.js"></script>
<!-- END: Page Vendor JS-->

<?php require_once  'content/script.php' ?>

<script>
$(document).ready(function () {
    var $primary = '#7367F0';
    var $success = '#28C76F';
    var $danger = '#EA5455';
    var $warning = '#FF9F43';
    var $label_color = '#1E1E1E';
    var grid_line_color = '#dae1e7';
    var scatter_grid_color = '#f3f3f3';
    var $scatter_point_light = '#D1D4DB';
    var $scatter_point_dark = '#5175E0';
    var $white = '#fff';
    var $black = '#000';

    var themeColors = [$primary, $success, $danger, $warning, $label_color];

    $.ajax({
        url: "<?php echo site_url('user/dashboard-filter') ?>",
        method: "POST",
        async: false,
        success: function(data) {
            var res = JSON.parse(data);
            console.log(res)
            kesiswaanChart(res['siswa']['label'], res['siswa']['value'], res['siswa']['text']);
            gtkChart(res['gtk']['label'], res['gtk']['value'], res['gtk']['text']);
        }
    });
    
    $(".users-data-filter").click(function () {
        $('#kode-tahun').prop('selectedIndex', 0);
        $('#kode-tahun').change();
        $('#tahun-pelajaran').prop('selectedIndex', 0);
        $('#tahun-pelajaran').change();
        $('#id_semester').prop('selectedIndex', 0);
        $('#id_semester').change();
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

    $('#formFilter').submit(function(e) {
        var kode = $('#kode-tahun').val();
        e.preventDefault();
        $.ajax({
            type: 'POST',
            async: false,
            url: '<?php echo site_url('user/dashboard-filter') ?>',
            data: {kode:kode},
            dataType: "json",
            success: function(data) {
                gtkChart(data['gtk']['label'], data['gtk']['value'], data['gtk']['text']);
            }, 
            error: function (data) {
                toastr.error('Data fail!.', 'Errors!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
            }
        })
    });


    function kesiswaanChart(labels, values, text){
        var ctx = $("#kesiswaan");
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {},
        
            // Chart Options
            options: {
                elements: {
                    rectangle: {
                    borderWidth: 2,
                    borderSkipped: 'left'
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                responsiveAnimationDuration: 500,
                legend: { display: false },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            color: grid_line_color,
                        },
                        scaleLabel: {
                            display: true,
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            color: grid_line_color,
                        },
                        scaleLabel: {
                            display: true,
                        },
                        ticks: {
                            stepSize: 5
                        },
                    }],
                },
                title: {
                    display: true,
                    text: 'Statistik Kesiswaan'
                },
            }

        });

        chart.clear();
        chart.data = {
            labels: labels,
            datasets: [{
                label: "Total Siswa",
                data: values,
                backgroundColor: themeColors,
                borderColor: "transparent"
            }]
        };
        chart.update();
    }

    function gtkChart(labels, values, text){
        var ctx = $("#gtk");
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {},
        
            // Chart Options
            options: {
                elements: {
                    rectangle: {
                    borderWidth: 2,
                    borderSkipped: 'left'
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                responsiveAnimationDuration: 500,
                legend: { display: false },
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            color: grid_line_color,
                        },
                        scaleLabel: {
                            display: true,
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            color: grid_line_color,
                        },
                        scaleLabel: {
                            display: true,
                        },
                        ticks: {
                            stepSize: 2
                        },
                    }],
                },
                title: {
                    display: true,
                    text: text
                },
            }

        });

        chart.clear();
        chart.data = {
            labels: labels,
            datasets: [{
                label: "Total ",
                data: values,
                backgroundColor: themeColors,
                borderColor: "transparent"
            }]
        };
        chart.update();
    }

});
</script>

<?php require_once  'content/end_head.php' ?> 
