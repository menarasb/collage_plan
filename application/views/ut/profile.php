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
                    <div class="card-header bg-navy">
                        <strong>User Profile</strong>
                    </div>
                    <!-- START MENU 1 -->
                    <div class="card-body p-2" style="display: block;">
                        <?php if ($this->session->flashdata('success') == TRUE) : ?>
                            <div class="alert alert-success"><small><i class="fa fa-exclamation-circle"></i> Data User <strong>Berhasil</strong> diupdate</small></div>
                        <?php elseif ($this->session->flashdata('sukses_ganti') == TRUE) : ?>
                            <div class="alert alert-success"><small><i class="fa fa-exclamation-circle"></i> Password <strong>Berhasil</strong> diupdate</small></div>
                        <?php elseif ($this->session->flashdata('password_beda') == TRUE) : ?>
                            <div class="alert alert-danger"><small><i class="fa fa-exclamation-circle"></i> Konfirmasi Password <strong>Berbeda</strong>, gagal diupdate</small></div>
                        <?php elseif ($this->session->flashdata('password_lama_salah') == TRUE) : ?>
                            <div class="alert alert-danger"><small><i class="fa fa-exclamation-circle"></i> Password Lama <strong>Salah</strong>, gagal diupdate</small></div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-3">
                                <center><img style="width:100%;" src="<?php if ($user->file == NULL) : echo base_url('assets/img/default-pp.jpg');
                                                                        else : echo base_url('assets/img/' . $user->file);
                                                                        endif; ?>"></center>
                                <div class="nav flex-column nav-tabs mt-2" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#update-profil" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Update Profil</a>
                                    <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#ganti-password" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Ganti Password</a>
                                </div>
                            </div>
                            <div class="col-md-9 border-left">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                    <div class="tab-pane text-left fade show active" id="update-profil" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                        <form action="<?= base_url('user/update_user'); ?>" method="POST" role="form" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="form-group col-lg-5">
                                                    <label>Username</label>
                                                    <input class="form-control" name="id" value="<?= $user->id; ?>" hidden>
                                                    <input class="form-control" name="username" value="<?= $user->username; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-5">
                                                    <label>No. Induk Mahasiswa</label>
                                                    <input class="form-control" name="nim" value="<?= $user->nim; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-5">
                                                    <label>Program Studi</label>
                                                    <input class="form-control" name="prodi" value="<?= $user->prodi; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-8">
                                                    <label>Nama</label>
                                                    <input class="form-control" name="nama" value="<?= $user->nama; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-8">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" name="alamat"><?= $user->alamat; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label>Telp.</label>
                                                    <input class="form-control" name="telp" value="<?= $user->telp; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-4">
                                                    <label>Telp.</label>
                                                    <input class="form-control" name="telp" value="<?= $user->telp; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-12">
                                                    <label>Upload Foto</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input name="old_file" value="<?= $user->file; ?>" hidden>
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row float-right">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="ganti-password" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                        <form action="<?= base_url('user/ganti_password'); ?>" method="POST" role="form" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="form-group col-lg-5">
                                                    <label>Username</label>
                                                    <input class="form-control" name="id" value="<?= $user->id; ?>" hidden>
                                                    <input class="form-control" name="username" value="<?= $user->username; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-5">
                                                    <label>Password Lama</label>
                                                    <input class="form-control" type="password" name="password_lama" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-5">
                                                    <label>Password Baru</label>
                                                    <input class="form-control" type="password" name="password_baru" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-5">
                                                    <label>Password Baru</label>
                                                    <input class="form-control" type="password" name="confirm_password_baru" required>
                                                </div>
                                            </div>
                                            <div class="row float-right">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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