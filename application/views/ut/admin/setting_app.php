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
                        <i class="fas fa-cogs"></i> <strong>Setting Aplikasi</strong>
                    </div>
                    <!-- START MENU 1 -->

                    <div class="card-body p-0" style="display: block;">
                        <div class="card-body">
                            <?php if ($this->session->flashdata('flash') == TRUE) : ?>
                                <div class="alert alert-success"><small><i class="fa fa-exclamation-circle"></i> Perubahan setting aplikasi <strong>Berhasil!</strong></small></div>
                            <?php endif; ?>
                            <form action="<?= base_url('admin/update_setting'); ?>" method="POST" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Main Title</label>
                                    <input type="text" class="form-control" value="<?= $setting->main_title ?>" name="main_title">
                                </div>
                                
                                <div class="form-group">                                  
                                    <label>Upload Logo</label>
                                    <div class="m-3"><img src="<?php if($setting->logo == NULL): echo base_url('assets/img/default-logo.png');  else: echo base_url('assets/img/' . $setting->logo); endif; ?>" width="100px"></div>
                                    <div class="input-group col-md-5">
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer float-right p-0">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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