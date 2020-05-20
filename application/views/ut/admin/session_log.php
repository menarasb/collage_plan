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
                        <i class="fas fa-history"></i> <strong>Session Log History</strong>
                    </div>
                    <!-- START MENU 1 -->

                    <div class="card-body p-2" style="display: block;">
                        <table class="datatabledong table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Browser</th>
                                    <th>Platform</th>
                                    <th>Ip Adress</th>
                                    <th>Login Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($session_log as $sl) { ?>
                                    <tr>
                                        <td><?= $sl->username; ?></td>
                                        <td><?= $sl->browser; ?></td>
                                        <td><?= $sl->platform; ?></td>
                                        <td><?= $sl->ip; ?></td>
                                        <td><?= $sl->login_time; ?></td>
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