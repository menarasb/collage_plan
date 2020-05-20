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
                        <i class="fas fa-edit"></i> <strong>Home Page Content</strong>
                        <div class="row float-right">
                        </div>
                    </div>
                    <!-- START CARD BODY -->
                    <div class="card-body">
                        <?php if ($this->session->flashdata('flash') == TRUE) : ?>
                            <div class="alert alert-success"><small><i class="fa fa-exclamation-circle"></i> Perubahan setting aplikasi <strong>Berhasil!</strong></small></div>
                        <?php endif; ?>
                        <form action="<?= base_url('admin/update_home_content'); ?>" method="POST" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label></label>
                                <input name="id" value="1" hidden>
                                <textarea class="textarea" name="post"><?= $content->content; ?></textarea>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer float-right p-0">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!--END CARD BODY-->

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