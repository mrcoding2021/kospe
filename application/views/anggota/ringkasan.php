<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Anggota</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($anggota) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Anggota Eksis</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($anggota) - count($keluar) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Anggota Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($keluar) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Anggota Bulan Lalu</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count($anggota) - count($bulan) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Anggota</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($anggota) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Anggota Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($bulan) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Anggota Bulan Lalu</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count($bulanLalu) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Anggota Keluar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($keluar) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-7 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Perkembangan Anggota KoSPE</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <label for="" class="col-md-2">Tahun</label>
                        <select name="thn" class="col-md-3 thn form-control form-control-sm">
                            <?php $no = 2017;
                            for ($i = 1; $i < 10; $i++) { ?>
                                <option <?= ($no == date('Y')) ? 'selected' : '' ?> value="<?= $no ?>"><?= $no ?></option>
                            <?php $no++;
                            } ?>
                        </select>
                        <a href="#" class="col-md-1 cari btn btn-primary btn-sm">Cari</a>
                        <h5 class="text-right col-md-6">Total Anggota :
                            <span class="total"></span>
                        </h5>
                    </div>
                    <div class="chart-area">
                        <canvas id="anggota"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jenis Kelamin & Usia</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="chart-area">
                                <canvas id="sex"></canvas>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="chart-area">
                                <canvas id="umur"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('asset/admin/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('asset/admin/') ?>vendor/chart.js/Chart.min.js"></script>



<script>
    var thn = '2021'
    var chart = ''
    var jns = ''
    var umur = ''

    $.ajax({
        url: "<?= base_url('anggota/data/') ?>" + thn,
        method: "GET",
        dataType: 'json',
        success: function(data) {
            $('.total').html(data[0].total)
            console.log(data);
            var label = [];
            var value = [];
            for (var i in data) {
                label.push(data[i].bulan);
                value.push(data[i].jumlah);
            }
            var ctx = $('#anggota')
            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Jumlah Anggota :',
                        backgroundColor: 'rgb(252, 116, 101)',
                        borderColor: 'rgb(255, 255, 255)',
                        data: value
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            });
            chart.render();
        }
    });

    $.ajax({
        url: "<?= base_url('anggota/sex/') ?>" + thn,
        method: "GET",
        dataType: 'json',
        success: function(data) {
            console.log(data)
            var value = [];
            for (var i in data) {
                value.push(data[i].jumlah);
            }
            // Pie Chart Example
            var se = document.getElementById("sex");
            jns = new Chart(se, {
                type: 'pie',
                data: {
                    labels: ["laki-Laki", "Prempuan"],
                    datasets: [{
                        data: value,
                        backgroundColor: ['#4e73df', '#ef42f5'],
                        hoverBackgroundColor: ['#2e59d9', '#f5429c'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: true,
                        position: "bottom"
                    },
                },
            });
            jns.render()

        }
    });

    $.ajax({
        url: "<?= base_url('anggota/umur/') ?>" + thn,
        method: "GET",
        dataType: 'json',
        success: function(data) {
            console.log(data)
            var value = [];
            for (var i in data) {
                value.push(data[i].jumlah);
            }

            var umr = document.getElementById("umur");
            umur = new Chart(umr, {
                type: 'pie',
                data: {
                    labels: ["< 23 th", "24-35 th", "36-45 th", "46-60 th", "> 61"],
                    datasets: [{
                        data: value,
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#1935a6', '#30095c'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: true,
                        position: "bottom"
                    },
                },
            });
            umur.render()
        }
    });

    $('.cari').click(function(e) {
        e.preventDefault()
        chart.render();
        chart.destroy();
        var thn = $('.thn').val()
        $.ajax({
            url: "<?= base_url('anggota/data/') ?>" + thn,
            method: "GET",
            dataType: 'json',
            success: function(data) {
                $('.total').html(data[0].total)
                var label = [];
                var value = [];
                for (var i in data) {
                    label.push(data[i].bulan);
                    value.push(data[i].jumlah);
                }
                var ctx = $('#anggota')
                chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        datasets: [{
                            label: 'Jumlah Anggota :',
                            backgroundColor: 'rgb(252, 116, 101)',
                            borderColor: 'rgb(255, 255, 255)',
                            data: value
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                            }
                        },
                        legend: {
                            display: false
                        }
                    }
                });
            }
        });

        jns.render()
        jns.destroy();
        $.ajax({
            url: "<?= base_url('anggota/sex/') ?>" + thn,
            method: "GET",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                var value = [];
                for (var i in data) {
                    value.push(data[i].jumlah);
                }

                // Pie Chart Example
                var se = $("#sex");
                jns = new Chart(se, {
                    type: 'pie',
                    data: {
                        labels: ["laki-Laki", "Prempuan"],
                        datasets: [{
                            data: value,
                            backgroundColor: ['#4e73df', '#ef42f5'],
                            hoverBackgroundColor: ['#2e59d9', '#f5429c'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: true,
                            position: "bottom"
                        },
                    },
                });

            }
        });

        umur.render()
        umur.destroy()
        $.ajax({
            url: "<?= base_url('anggota/umur/') ?>" + thn,
            method: "GET",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                var value = [];
                for (var i in data) {
                    value.push(data[i].jumlah);
                }

                var umr = $("#umur");
                umur = new Chart(umr, {
                    type: 'pie',
                    data: {
                        labels: ["< 23 th", "24-35 th", "36-45 th", "46-60 th", "> 61"],
                        datasets: [{
                            data: value,
                            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#1935a6', '#30095c'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: true,
                            position: "bottom"
                        },
                    },
                });

                // umur.render();
            }
        });
    })
</script>