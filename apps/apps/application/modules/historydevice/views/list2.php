<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
        </div>
        <div class="col-5 align-self-center">
        </div>
    </div>
</div>
<h2 class="card-title">
    <left>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Monitoring History Device</left>
</h2>


<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
                        <center> Aquaponics History </center>
                    </h2>
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                    </h3>
                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Time</th>
                                    <th>HWID</th>
                                    <th>Temperature</th>
                                    <th>PH</th>
                                    <th>Light Intensity</th>
                                    <th>Moisture</th>
                                    <th>CO2</th>
                                    <th>O2</th>
                                    <th>Discharge</th>
                                    <th>Minerals</th>
                                    <th>Nutrition Indicator</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $u) { //untuk menampilkan variabel data yang diangkut dari controller
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $u->timestamp ?></td>
                                        <td><?php echo $u->HWID ?></td>
                                        <td><?php echo $u->suhu_tanaman ?></td>
                                        <td><?php echo $u->PH_tanaman ?></td>
                                        <td><?php echo $u->intentitascahaya_tanaman ?></td>
                                        <td><?php echo $u->kelembapan_tanaman ?></td>
                                        <td><?php echo $u->co2_tanaman ?></td>
                                        <td><?php echo $u->o2_tanaman ?></td>
                                        <td><?php echo $u->debit_tanaman ?></td>
                                        <td><?php echo $u->mineral_tanaman ?></td>
                                        <td><?php echo $u->indikatornutrisi_tanaman ?></td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
                        <center> Aquarium History </center>
                    </h2>
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                    </h3>
                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Time</th>
                                    <th>HWID</th>
                                    <th>PH</th>
                                    <th>Temperature</th>
                                    <th>Oxygen</th>
                                    <th>Ammonia</th>
                                    <th>Feed Indicator</th>
                                    <th>Vitamin Indicator</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $u) { //untuk menampilkan variabel data yang diangkut dari controller
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $u->timestamp ?></td>
                                        <td><?php echo $u->HWID ?></td>
                                        <td><?php echo $u->PH_akuarium ?></td>
                                        <td><?php echo $u->suhu_akuarium ?></td>
                                        <td><?php echo $u->oksigen_akuarium ?></td>
                                        <td><?php echo $u->amoniak_akuarium ?></td>
                                        <td><?php echo $u->indikatorpakan_akuarium ?></td>
                                        <td><?php echo $u->indikatorvitamin_akuarium ?></td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
<center>
    <?= anchor('historydevice/', '<button type="button" class="btn btn-success text-center">Back to Monitoring Device</button>'); ?>
</center>

<!--END MODAL ADD-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'csv'
            ]
        });
    });
</script>

<meta http-equiv="refresh" content="5">