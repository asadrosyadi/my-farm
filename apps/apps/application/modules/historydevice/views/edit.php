<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('historydevice/control'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Owner</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="HWID" class="col-sm-2 col-form-label">HWID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="HWID" name="HWID" value="<?= $user['HWID']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Display Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Fertilizer application schedule</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jadwal_pupuk" name="jadwal_pupuk" value="<?= $user['jadwal_pupuk']; ?>">
                    <?= form_error('jadwal_pupuk', '<small class="text-danger pl-3">', '</small>'); ?>
                    <h6>Tulis Hari dan jam peberian pupuk tanaman, contoh : Saturday:19:21 (dalam bahasa inggris dan awali huruf kapital). </h6> </h6>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Fish Feeding Time One</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="waktu_pakan_ikan" name="waktu_pakan_ikan" value="<?= $user['waktu_pakan_ikan']; ?>">
                    <?= form_error('waktu_pakan_ikan', '<small class="text-danger pl-3">', '</small>'); ?>
                    <h6>Tulis jam waktu makan ikan, contoh : 07:30. </h6>
                </div>
            </div>
                        <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Fish Feeding Time Two</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="waktu_pakan_ikan2" name="waktu_pakan_ikan2" value="<?= $user['waktu_pakan_ikan2']; ?>">
                    <?= form_error('waktu_pakan_ikan2', '<small class="text-danger pl-3">', '</small>'); ?>
                     <h6>Tulis jam waktu makan ikan, contoh : 07:30.</h6>
                </div>
            </div>
                        <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Fish Feeding Time Tree</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="waktu_pakan_ikan3" name="waktu_pakan_ikan3" value="<?= $user['waktu_pakan_ikan3']; ?>">
                    <?= form_error('waktu_pakan_ikan3', '<small class="text-danger pl-3">', '</small>'); ?>
                     <h6>Tulis jam waktu makan ikan, contoh : 07:30.</h6>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Fish Vitamin Time</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="waktu_vitamin_ikan" name="waktu_vitamin_ikan" value="<?= $user['waktu_vitamin_ikan']; ?>">
                    <?= form_error('waktu_vitamin_ikan', '<small class="text-danger pl-3">', '</small>'); ?>
                    <h6>Tulis Hari dan jam tanggal peberian vitamin ikan, contoh : Saturday:19:21 (dalam bahasa inggris dan awali huruf kapital).</h6>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>


            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->