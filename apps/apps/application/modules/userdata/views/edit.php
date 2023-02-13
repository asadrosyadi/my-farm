<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Change User</h4>
                        <?php
                        echo form_open_multipart('userdata/edit', 'role="form" class="form-horizontal"');
                        echo form_hidden('id', $data['id']);
                        ?>
                        <div class="form-group input-rounded">
                            <label>Name</label>
                            <input type="text" value="<?php echo $data['name'] ?>" class="form-control" name="name">
                        </div>
                        <div class="form-group input-rounded">
                            <label>Email</label>
                            <input type="text" value="<?php echo $data['email'] ?>" class="form-control" name="email">
                        </div>
                        <div class="form-group input-rounded">
                            <label>Image</label>
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/profile/') . $data['image']; ?>" class="card-img">
                            </div>
                        </div>
                        <div class="form-group input-rounded">
                            <label>Change Image</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-rounded">
                            <label>Role Id</label>
                            <select class="form-select" aria-label="role_id" name="role_id">
                                <option value="2">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="form-group input-rounded">
                            <label>Is Active</label>
                            <select class="form-select" aria-label="is_active" name="is_active">
                                <option value="0">Not Active</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                        <div class="form-group input-rounded">
                            <label>Token Hardware</label>
                            <input type="text" value="<?php echo $data['token'] ?>" class="form-control" name="token">
                        </div>
                        <div class="form-group input-rounded">
                            <label>HWID</label>
                            <input type="text" value="<?php echo $data['HWID'] ?>" class="form-control" name="HWID">
                        </div>
                        <div class="form-group input-rounded">
                            <label>Created</label>
                            <?= date('d F Y', $data['date_created']); ?>
                        </div>
                        <div class="form-inline">
                        </div>
                        <div class="form-group" style="text-align:center;">

                            <button type="submit" name="submit" value="submit" class="btn btn-success">Ubah</button>
                            <?= anchor('userdata/', '<button type="button" class="btn btn-info text-center">Back to User Data</button>'); ?>
                        </div>
                        </br>
                        </br>
                        </br>
                </div>
            </div>