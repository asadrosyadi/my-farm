<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"> &nbsp; &nbsp; &nbsp; User Data</h2>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">

            <div class="customize-input float-right">
                <button class="btn waves-effect waves-light btn-rounded btn-success text-center" data-toggle="modal" data-target="#ModalaAdd">Add User</button>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="table table-hover">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status User</th>
                                    <th>Token Hardware</th>
                                    <th>HWID</th>
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
                                        <td><?php echo $u->name ?></td>
                                        <td><?php echo $u->email ?></td>
                                        <td> <?php if ($u->role_id == "1") {
                                                    echo "Admin";
                                                } else {
                                                    echo "User";
                                                } ?> </td>
                                        <td> <?php if ($u->is_active == "1") {
                                                    echo "Active";
                                                } else {
                                                    echo "Not Active";
                                                } ?> </td>
                                        <td><?php echo $u->token ?></td>
                                        <td><?php echo $u->HWID ?></td>

                                        <td><?php echo anchor('userdata/datasensor/' . $u->id, '<button type="button" class="btn btn-success text-center">History Device</button>'); ?> <h1> </h1> <?php echo anchor('userdata/datagrafik/' . $u->id, '<button type="button" class="btn btn-info text-center">Parameter Device</button>'); ?> <h1> </h1> <?php echo anchor('userdata/fuzzyrule/' . $u->id, '<button type="button" class="btn btn-secondary text-center">Fuzzy Rule</button>'); ?> <h1> </h1>
                                            <h1> </h1> <?php echo anchor('userdata/fuzzy/' . $u->id, '<button type="button" class="btn btn-warning text-center">Fuzzy</button>'); ?> <?php echo anchor('userdata/edit/' . $u->id, '<button type="button" class="btn btn-primary text-center">User Edit</button>'); ?> <h1> </h1> <?php echo anchor('userdata/hapus/' . $u->id, '<button type="button" class="btn btn-danger text-center">Delete User</button>'); ?>
                                        </td>

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
<!-- MODAL ADD -->
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Add User</h3>
            </div>
            <?php
            echo form_open_multipart('userdata/add', 'role="form" class="form-horizontal"');
            ?>
            <div class="modal-body">


                <div class="form-group">
                    <label class="control-label col-xs-3">Name</label>
                    <div class="col-xs-9">
                        <input type="text" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Email</label>
                    <div class="col-xs-9">
                        <input type="text" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Password</label>
                    <div class="col-xs-9">
                        <input type="text" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Role Id</label>
                    <div class="col-xs-9">
                        <select class="form-select" aria-label="role_id" name="role_id">
                            <option value="2">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Is Active</label>
                    <div class="col-xs-9">
                        <select class="form-select" aria-label="is_active" name="is_active">
                            <option value="0">Not Active</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">HWID</label>
                    <div class="col-xs-9">
                        <input type="text" name="HWID">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-info" id="btn_simpan">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
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