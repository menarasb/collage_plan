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
                <div class="card shadow">
                    <div class="card-header bg-info">
                        <strong>Dashboard Admin</strong>
                    </div>
                    <!-- START MENU 1 -->
                    <div class="card-body p-2" style="display: block;">
                        <div class="row">
                            <div class="info-box m-2 bg-red shadow">
                                <span class="info-box-icon bg-pink"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">User Terdaftar</span>
                                    <span class="info-box-number"><?= $jml_user->jml_user?> User</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <div class="info-box m-2 bg-red shadow">
                                <span class="info-box-icon bg-pink"><i class="fas fa-database"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">DB Matakuliah</span>
                                    <span class="info-box-number"><?= $jml_matkul->jml_matkul?> Matkul</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
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