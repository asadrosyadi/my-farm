<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"> &nbsp; &nbsp; &nbsp; Indicator of Terrarium</h2>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">

        </div>
    </div>
</div>

<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
    <center> </center>
</h1>
<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
    <center> </center>
</h1>
<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
    <center> </center>
</h1>
<h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
    <center> </center>
</h1>

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Minerals</h4>

                    <canvas id="myChart"></canvas>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
foreach ($data2 as $u) { //untuk menampilkan variabel data yang diangkut dari controller
?>
    <center>
        <?= anchor('historydevice/datagrafik/' . $u->id_user, '<button type="button" class="btn btn-success text-center">Back to Parameter Device</button>'); ?>
    </center>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    $(document).ready(function() {
        tabel();
        window.setInterval(function() {
            tabel();
        }, 5000);
    });
    <?php
    foreach ($data as $u) { //untuk menampilkan variabel data yang diangkut dari controller
    ?>

        function tabel() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>historydevice/grafikjason/' + '<?php echo $u->id_user ?>',
                async: true,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var label = [];
                    var value = [];

                    for (var i in data) {
                        label.push(data[i].timestamp);
                        value.push(data[i].mineral_tanaman2);

                    }
                    // Mulai buat Grafik
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'Minerals (%)',
                                backgroundColor: '#1a8220',
                                borderColor: '#1a8220',
                                data: value
                            }]
                        }
                    });
                }
            });
        }
    <?php } ?>
</script>