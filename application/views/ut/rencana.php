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
                <div class="card card-primary shadow">
                    <div class="card-header bg-info">
                        <strong>DAFTAR RENCANA MATA KULIAH</strong>
                        <div class="row float-right">
                            <div class="col-12">
                                <a href="<?= base_url('rencana/add'); ?>" class="btn bg-navy btn-block btn-xs">Tambah Rencana Per Semester</a>
                            </div>
                        </div>
                    </div>
                    <!-- START MENU 1 -->

                    <div class="card-body table-responsive p-2" style="display: block;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Semester</th>
                                    <th>Jumlah Matkul</th>
                                    <th>Jumlah SKS</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_rencana as $lr) { ?>
                                    <tr>
                                        <td>Semester <?= $lr->semester; ?></td>
                                        <td><?= $lr->jml_matkul; ?></td>
                                        <td><?= $lr->jml_sks; ?></td>
                                        <td><a href="<?= base_url('rencana/update/' . $lr->semester . '/show'); ?>" class="btn bg-blue btn-block btn-xs">Detail</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr class="bg-info">
                                    <th>Total</th>
                                    <th><?= $total->jml_matkul; ?></th>
                                    <th colspan="2"><?= $total->jml_sks; ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-body table-responsive p-2" style="display: block;">
                        <table class="datatabledong table table-bordered table-hover" style="margin-top:10px">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Waktu</th>
                                    <th>Semester</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_rencana_all as $lra) { ?>
                                    <tr>
                                        <td><?= $lra->kode; ?></td>
                                        <td><?= $lra->matkul; ?></td>
                                        <td><?= $lra->sks; ?></td>
                                        <td><?= $lra->waktu; ?></td>
                                        <td>Semester <?= $lra->semester; ?></td>
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