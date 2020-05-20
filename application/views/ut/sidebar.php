<!-- START MENU 1-->
<div class="card shadow">

    <?php if ($this->session->userdata('status_login') == "login") { ?>
        <div class="card-body p-0" style="display: block;">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" style="height:100px;" src="<?php if ($user->file == NULL) : echo base_url('assets/img/default-pp.jpg');
                                                                                                    else : echo base_url('assets/img/' . $user->file);
                                                                                                    endif; ?>">
                </div>
                <p class="profile-username text-center mb-0"><strong><?= $user->nama; ?></strong></p>
                <p class="text-muted text-center"><strong><?php if($user->level_id == '1'):echo $user->level; elseif($user->level_id == '2'): echo $user->prodi; endif;?></strong></p>
                <div class="row">
                    <div class="col-md-6"><a href="<?= base_url('user/user_profil'); ?>" class="btn bg-blue btn-block btn-xs">Profil</a></div>
                    <div class="col-md-6"><a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger btn-block btn-xs">Logout</a></div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="card-header bg-info">
            <strong>LOGIN</strong>
        </div>
        <div class="card-body p-2" style="display: block;">
            <?php if ($this->session->flashdata('flash_login_error') == TRUE) : ?>
                <div class="alert alert-danger"><small><i class="fa fa-exclamation-circle"></i> Username/Password <strong>Salah!</strong></small></div>
            <?php endif; ?>
            <form action="<?= base_url('auth/cek_login'); ?>" method="POST" class="m-2">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>

                <div class="card-footer float-right p-0">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    <?php } ?>
</div>
<!-- END MENU-->
<?php if ($this->session->userdata('status_login') == "login") { ?>
    <!-- START MENU 1-->
    <div class="card shadow">
        <div class="card-header bg-info">
            <strong>Sidebar Menu</strong>
        </div>
        <div class="card-body p-2" style="display: block;">
        <p><b>Demo User</b></p><p>Admin = admin / admin</p><p>User&nbsp; = user / user<br></p>
        </div>
    </div>
    <!-- END MENU-->
<?php } ?>