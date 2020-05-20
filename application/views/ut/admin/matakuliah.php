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
                        <i class="fas fa-users-cog"></i> <strong>DB Matakuliah</strong>
                        <div class="row float-right">
                            <a href="<?=base_url('admin/export_matkul')?>" class="btn bg-navy btn-block btn-xs"><i class="fa fa-download"></i> Download</a>
                        </div>
                    </div>
                    <!-- START CARD BODY -->
                    <div class="card-body p-2" style="display: block;">
                        <?php if ($this->session->flashdata('flash') == TRUE) : ?>
                            <div class="alert alert-success"><small><i class="fa fa-exclamation-circle"></i> User <strong>Berhasil</strong> ditambah</small></div>
                        <?php elseif ($this->session->flashdata('flash_edit') == TRUE) : ?>
                            <div class="alert alert-success"><small><i class="fa fa-exclamation-circle"></i> User <strong>Berhasil</strong> diedit</small></div>
                        <?php endif; ?>

                        <table class="datatabledong table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Mata Kuliah</th>
                                    <th>Jumlah SKS</th>
                                    <th>Waktu Ujian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($daftar_matkul as $dm) { ?>
                                    <tr>
                                        <td><?= $dm->kode; ?></td>
                                        <td><?= $dm->matkul; ?></td>
                                        <td><?= $dm->sks; ?></td>
                                        <td><?= $dm->waktu; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!--END CARD BODY-->
                    <!-- ========================== MODAL ADD ============================ -->
                    <div class="modal fade" id="add_user">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data" action="<?= base_url('admin/add_user'); ?>" method="POST" class="form-horizontal">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label>Username</label>
                                                    <input name="username" type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Password</label>
                                                    <input name="password" type="password" class="form-control" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>NIM</label>
                                                    <input name="nim" type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Email</label>
                                                    <input name="email" type="email" class="form-control" required>
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <label>Nama</label>
                                                    <input name="nama" type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" name="alamat"></textarea>
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <label>Prodi</label>
                                                    <input name="prodi" type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Telp.</label>
                                                    <input name="telp" type="text" class="form-control">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>User Level</label>
                                                    <select class="form-control select2" name="level_id">
                                                        <?php foreach ($user_level as $ul) : ?>
                                                            <option value="<?= $ul->id; ?>"><?= $ul->level; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="modal-footer justify-content-between p-0">
                                                <button type="button" class="btn btn-default mt-2" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary mt-2">Save changes</button>
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
                    <!-- ========================== MODAL EDIT =============================== -->
                    <div class="modal fade" id="edit-data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" enctype="multipart/form-data" action="<?= base_url('admin/edit_user'); ?>" method="POST" class="form-horizontal">
                                        <input name="id" id="id" hidden>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label>Username</label>
                                                    <input id="username" type="text" class="form-control" disabled>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>NIM</label>
                                                    <input name="nim" id="nim" type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Email</label>
                                                    <input name="email" id="email" type="email" class="form-control" required>
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <label>Nama</label>
                                                    <input name="nama" id="nama" type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" name="alamat" id="alamat"></textarea>
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <label>Prodi</label>
                                                    <input name="prodi" type="text" id="prodi" class="form-control" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Telp.</label>
                                                    <input name="telp" id="telp" type="text" class="form-control">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>User Level</label>
                                                    <select id="level_id" class="form-control select2" name="level_id">
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="modal-footer justify-content-between p-0">
                                                <button type="button" class="btn btn-default mt-2" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary mt-2">Save changes</button>
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
                    <!-- ========================== END MODAL EDIT =========================== -->

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
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)
            var $select = $("#level_id").empty();
            // Isi nilai pada field
            modal.find('#id').attr("value", div.data('id'));
            modal.find('#username').attr("value", div.data('username'));
            modal.find('#nama').attr("value", div.data('nama'));
            modal.find('#alamat').html(div.data('alamat'));
            modal.find('#nim').attr("value", div.data('nim'));
            modal.find('#email').attr("value", div.data('email'));
            modal.find('#prodi').attr("value", div.data('prodi'));
            modal.find('#telp').attr("value", div.data('telp'));
            $('<option />', {
                value: div.data('level_id'),
                text: div.data('level'),
            }).appendTo($select)
            <?php foreach ($user_level as $ul) : ?>
                $('<option />', {
                    value: '<?= $ul->id ?>',
                    text: '<?= $ul->level ?>',
                }).appendTo($select)
            <?php endforeach; ?>
        });
    });
</script>