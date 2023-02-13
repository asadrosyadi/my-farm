<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"> &nbsp; &nbsp; &nbsp; Your Device</h2>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">

        </div>
    </div>
</div>

<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
    <center> Indicator of Aquaponics </center>
</h3>
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
<?php
foreach ($data as $u) { //untuk menampilkan variabel data yang diangkut dari controller
?>

    <div class="row">

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>
                        <h4 class="card-title">Temperature</h4>
                        <input data-plugin="knob" data-width="150" data-height="150" data-min="15" data-max="50" data-fgColor="#cc0000" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $u->suhu_tanaman ?>" />
                    </div>
                    <center>
                        <?= anchor('userdata/suhutanaman/' . $u->id_user, '<button type="button" class="btn btn-success text-center">Realtime Graph</button>'); ?>
                    </center>
                </div>
            </div>
        </div>


        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>

                        <div <h1 class="small font-weight-bold">Light Intensity <span class="float-right"><?php echo $u->intentitascahaya_tanaman ?></span></h1>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $u->intentitascahaya_tanaman ?>" aria-valuenow="80" aria-valuemin="0" aria-valuemax="1"></div>
                            </div>
                            <?= anchor('userdata/lightintensity/' . $u->id_user, '<h8 class="card-title">Realtime Graph</h8>'); ?>
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

                        <div <h4 class="small font-weight-bold">Moisture <span class="float-right"><?php echo $u->kelembapan_tanaman ?></span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $u->kelembapan_tanaman ?>" aria-valuenow="60" aria-valuemin="0" aria-valuemax="1"></div>
                            </div>
                            <?= anchor('userdata/moisture/' . $u->id_user, '<h8 class="card-title">Realtime Graph</h8>'); ?>
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

                        <div <h4 class="small font-weight-bold">Minerals <span class="float-right"><?php echo $u->mineral_tanaman ?></span></h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $u->mineral_tanaman ?>" aria-valuenow="100" aria-valuemin="0" aria-valuemax="1"></div>
                            </div>
                            <h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
                                <center> </center>
                            </h1>
                            <h1 class="page-title text-truncate text-dark font-weight-medium mb-1">
                                <center> </center>
                            </h1>
                            <?= anchor('userdata/minerals/' . $u->id_user, '<h8 class="card-title">Realtime Graph</h8>'); ?>
                        </div>

                        <br>
                        <h1 class="small font-weight-bold">Nutrition Indicator <span class="float-right"><?php echo $u->indikatornutrisi_tanaman ?></span></h1>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $u->indikatornutrisi_tanaman ?>" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>
                        <h4 class="card-title">CO2</h4>
                        <input data-plugin="knob" data-width="150" data-height="150" data-min="100" data-max="2500" data-fgColor="#826644" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $u->co2_tanaman ?>" />
                    </div>
                    <center>
                        <?= anchor('userdata/co2tanaman/' . $u->id_user, '<button type="button" class="btn btn-success text-center">Realtime Graph</button>'); ?>
                    </center>
                </div>
            </div>
        </div>


    </div>

    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>

    <div class="row">

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>
                        <h4 class="card-title">O2</h4>
                        <input data-plugin="knob" data-width="150" data-height="150" data-min="100" data-max="2500" data-fgColor="#000080" data-angleOffset="-125" data-linecap="round" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $u->o2_tanaman ?>" />
                    </div>
                    <center>
                        <?= anchor('userdata/o2tanaman/' . $u->id_user, '<button type="button" class="btn btn-success text-center">Realtime Graph</button>'); ?>
                    </center>
                </div>
            </div>
        </div>


        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>
                        <h4 class="card-title">Discharge</h4>
                        <input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="1" data-fgColor="#477979" data-angleOffset="-125" data-linecap="round" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $u->debit_tanaman ?>" />
                    </div>
                    <center>
                        <?= anchor('userdata/discharge/' . $u->id_user, '<button type="button" class="btn btn-success text-center">Realtime Graph</button>'); ?>
                    </center>
                </div>
            </div>
        </div>


        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>
                        <h4 class="card-title">PH </h4>
                        <input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="14" data-fgColor="#006400" data-angleOffset="-125" data-linecap="round" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $u->PH_tanaman ?>" />
                    </div>
                    <center>
                        <?= anchor('userdata/ph/' . $u->id_user, '<button type="button" class="btn btn-success text-center">Realtime Graph</button>'); ?>
                    </center>
                </div>
            </div>
        </div>

    </div>





    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>

    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> Indicator of Aquarium </center>
    </h3>
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

    <div class="row">

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>
                        <h4 class="card-title">PH</h4>
                        <input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="14" data-fgColor="#A0522D" data-cursor="true" data-thickness=".3" value="<?php echo $u->PH_akuarium ?>" />
                    </div>
                    <center>
                        <?= anchor('userdata/phakuarium/' . $u->id_user, '<button type="button" class="btn btn-success text-center">Realtime Graph</button>'); ?>
                    </center>
                </div>
            </div>
        </div>


        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>
                        <h4 class="card-title">Temperature</h4>
                        <input data-plugin="knob" data-width="150" data-height="150" data-min="15" data-max="50" data-fgColor="#cc0000" data-angleOffset="-125" data-angleArc="250" data-rotation=clockwise data-displayPrevious=true value="<?php echo $u->suhu_akuarium ?>" />
                    </div>
                    <center>
                        <?= anchor('userdata/suhuakuarium/' . $u->id_user, '<button type="button" class="btn btn-success text-center">Realtime Graph</button>'); ?>
                    </center>
                </div>
            </div>
        </div>


        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>
                        <h4 class="card-title">Oxygen</h4>
                        <input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="10" data-fgColor="#000080" data-cursor="true" data-thickness=".3" value="<?php echo $u->oksigen_akuarium ?>" />
                    </div>
                    <center>
                        <?= anchor('userdata/oxygen/' . $u->id_user, '<button type="button" class="btn btn-success text-center">Realtime Graph</button>'); ?>
                    </center>
                </div>
            </div>
        </div>

    </div>

    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>
    <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">
        <center> </center>
    </h2>

    <div class="row">

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>
                        <h4 class="card-title">Ammonia</h4>
                        <input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="0.012" data-fgColor="#B8860B" data-cursor="true" data-linecap="round" data-thickness=".3" value="<?php echo $u->amoniak_akuarium ?>" />
                    </div>
                    <center>
                        <?= anchor('userdata/ammonia/' . $u->id_user, '<button type="button" class="btn btn-success text-center">Realtime Graph</button>'); ?>
                    </center>
                </div>
            </div>
        </div>


        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>
                        <h4 class="card-title">Feed Indicator</h4>
                        <input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="100" data-fgColor="#008080" data-displayPrevious=true value="<?php echo $u->indikatorpakan_akuarium ?>" />
                    </div>
                </div>
            </div>
        </div>


        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" style="text-align:center;">
                        </br>
                        <h4 class="card-title">Vitamin Indicator </h4>
                        <input data-plugin="knob" data-width="150" data-height="150" data-min="0" data-max="100" data-fgColor="#006400" data-linecap="round" data-displayPrevious=true value="<?php echo $u->indikatorvitamin_akuarium ?>" />
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php } ?>

<div>
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

    <center>

    </center>

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
</div>
<center>
    <?= anchor('userdata/', '<button type="button" class="btn btn-success text-center">Back to User Data</button>'); ?>
</center>
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

<script>
    $(function() {
        $('[data-plugin="knob"]').knob();
    });
</script>

<meta http-equiv="refresh" content="5">