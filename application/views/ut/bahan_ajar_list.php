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
                <div class="card card-primary shadow ">
                    <div class="card-header bg-info">
                        <strong><i class="fa fa-book"></i> Bahan Ajar</strong>
                        <div class="row float-right">
                            <button data-toggle="modal" data-target="#add_bahan_ajar" class="btn bg-navy btn-block btn-xs"><i class="fa fa-plus"></i> Tambah bahan Ajar</button>
                        </div>
                    </div>
                    <!-- START MENU 1 -->

                    <div class="card-body p-2" style="display: block;">
                    <!-- ==== TABLE ======== -->
                        <?php if ($this->session->flashdata('flash_sukses') == TRUE) : ?>
                            <div class="alert alert-success"><small><i class="fa fa-exclamation-circle"></i> Bahan Ajar <strong>Berhasil</strong> ditambahkan</small></div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('flash_hapus') == TRUE) : ?>
                            <div class="alert alert-warning"><small><i class="fa fa-exclamation-circle"></i> Bahan Ajar <strong>Berhasil</strong> dihapus</small></div>
                        <?php endif; ?>
                        <table class="datatabledong table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>KODE</th>
                                    <th>NAMA MATKUL</th>
                                    <th>KETERANGAN</th>
                                    <th>FILE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bahan_ajar as $ba) : ?>
                                    <tr>
                                        <td><?= $ba->kode; ?></td>
                                        <td><?= $ba->matkul; ?></td>
                                        <td><?= $ba->keterangan; ?></td>
                                        <td><?php if ($ba->file == NULL) : ?><a href="" class="btn bg-red btn-sm disabled"><i class="fas fa-cloud-download-alt"> Download</i></a> <?php else : ?><a href="<?= base_url('bahanajar/download/' . $ba->file) ?>" class="btn bg-green btn-sm"><i class="fas fa-cloud-download-alt"> Download</i></a> <?php endif; ?><a href="<?= base_url('bahanajar/delete/' . $ba->id) ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- ==== END TABLE ======== -->
                     <!-- ========================== MODAL ADD ============================ -->
                     <div class="modal fade" id="add_bahan_ajar">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Bahan Ajar</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data" action="<?= base_url('bahanajar/add'); ?>" method="POST" class="form-horizontal">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="form-group col-lg-12">
                                                    <label>Pilih Kode Mata Kuliah</label>
                                                    <select class="form-control select2" name="kode">
                                                        <?php foreach ($kode_matkul as $km) : ?>
                                                            <option value="<?= $km->kode; ?>"><?= $km->kode; ?>/<?= $km->matkul; ?>/<?= $km->sks; ?>/<?= $km->waktu; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-12">
                                                    <label>Keterangan</label>
                                                    <textarea class="form-control" name="keterangan"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-12">
                                                    <label>Upload File</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            <!-- /.box-footer -->
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- ========================== END MODAL ADD ============================ -->                        

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