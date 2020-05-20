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
                        <strong>TAMBAH RENCANA MATA KULIAH</strong>
                        <div class="row float-right">
                            <div class="col-12">
                                <a href="<?= base_url('rencana/list'); ?>"  class="btn bg-navy btn-block btn-xs">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- START MENU 1 -->
                    <div class="card-body p-3" style="display: block;">
                    <?php if(isset($error)) { echo $error; }; ?>
                        <form action="<?= base_url('rencana/aksi_add'); ?>" method="POST" role="form">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Pilih Semester</label>
                                    <select class="form-control select2" name="semester">
                                        <?php for($x = 1; $x <= 10; $x++){?>
                                        <option value="<?= $x; ?>">Semester <?= $x; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group col-md-7">
                                    <label>Pilih Kode Mata Kuliah</label>
                                    <select class="form-control select2" name="kode">
                                        <?php foreach($kode_matkul as $km){?>
                                        <option value="<?= $km->kode;?>"><?= $km->kode;?>/<?= $km->matkul;?>/<?= $km->sks;?>/<?= $km->waktu;?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Add</button>
                                </div>
                            </div>
                        </form>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Mata Kuliah</th>
                                    <th>Jumlah SKS</th>
                                    <th>Waktu Ujian</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
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