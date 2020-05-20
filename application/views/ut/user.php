<?php
$this->load->view("templates_topnav/header");
?>
<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php $this->load->view("ut/sidebar"); ?>
            </div>
            <!-- / END col-md-3 -->
            <!-- COL 9 -->
            <div class="col-lg-9">
                <div class="card card-primary">
                    <div class="card-header bg-info">
                        <strong>DAFTAR MATKUL</strong>
                    </div>
                    <!-- START MENU 1 -->
                    <div class="card-body p-2" style="display: block;">
                        <table class="datatabledong table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Nnama</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($user as $u){ ?>
                                <tr>
                                    <td><?= $u['username'];?></td>
                                    <td><?= $u['nama'];?></td>
                                    <td><?= $u['alamat'];?></td>
                                    <td><?= $u['telp'];?></td>
                                    <td><?= $u['level'];?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!--START MENU 1-->
                </div>
            </div>
            <!-- END col -md 9 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view("templates_topnav/footer");  ?>