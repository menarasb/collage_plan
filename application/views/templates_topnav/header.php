<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $judul; ?> | <?= $setting->main_title; ?></title>

  <?php $this->load->view("templates_topnav/css"); ?>
</head>

<body class="hold-transition layout-top-nav pace-primary">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light navbar-white border-bottom">
      <div class="container">
        <a href="<?= base_url(); ?>" class="navbar-brand">
          <img src="<?php if($setting->logo == NULL): echo base_url('assets/img/default-logo.png');  else: echo base_url('assets/img/' . $setting->logo); endif; ?>" class="brand-image" style="opacity: .8">
          <span class="brand-text font-weight-light"><?= $setting->main_title; ?></span>
        </a>
      </div>
    </nav>
    <!-- /.navbar -->

    <?php $this->load->view("templates_topnav/breadcrumb"); ?>
    <!-- navbar 2-->
    <?php if ($this->session->userdata('status_login') == "login"): ?>  
    <nav class="navbar navbar-expand navbar-dark-grey bg-abu navbar-dark navbar-shadow menu-border mb-3">
      <div class="container">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <!-- jika user sudah login --> 
        
          <!-- jika status user = 1 / admin -->
          <?php if($this->session->userdata('level_id') == '1'):?>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url('admin'); ?>" class="nav-link <?php if($this->uri->segment(1)=="admin" && $this->uri->segment(2)==NULL){echo "link-active active";} ?>"><i class="fas fa-home"></i> Dashboard </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url('admin/setting_app'); ?>" class="nav-link <?php if($this->uri->segment(1)=="admin" && $this->uri->segment(2)=="setting_app"){echo "link-active active";}?>"><i class="fas fa-cogs"></i> Setting Aplikasi </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url('admin/data_user'); ?>" class="nav-link <?php if($this->uri->segment(1)=="admin" && $this->uri->segment(2)=="data_user"){echo "link-active active";}?>"><i class="fas fa-users-cog"></i> Data User </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url('admin/session_log'); ?>" class="nav-link <?php if($this->uri->segment(1)=="admin" && $this->uri->segment(2)=="session_log"){echo "link-active active";}?>"><i class="fas fa-history"></i> Session Log </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url('admin/matakuliah'); ?>" class="nav-link <?php if($this->uri->segment(1)=="admin" && $this->uri->segment(2)=="matakuliah"){echo "link-active active";}?>"><i class="fas fa-database"></i> DB Mata Kuliah </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url('admin/home_content'); ?>" class="nav-link <?php if($this->uri->segment(1)=="admin" && $this->uri->segment(2)=="home_content"){echo "link-active active";}?>"><i class="fas fa-edit"></i> Home Content </a>
            </li>
          <?php elseif($this->session->userdata('level_id') == '2'):?>
            <!-- jika status user = 2 -->
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url('rencana/dashboard'); ?>" class="nav-link <?php if($this->uri->segment(1)=="rencana" && $this->uri->segment(2)=="dashboard"){echo "active";}?>"><i class="fas fa-home"></i> Dashboard </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url('rencana/daftar_matkul_all'); ?>" class="nav-link <?php if($this->uri->segment(1)=="rencana" && $this->uri->segment(2)=="daftar_matkul_all"){echo "active";}?>"><i class="fas fa-database"></i> Database Mata Kuliah</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url('rencana/list'); ?>" class="nav-link <?php if($this->uri->segment(1)=="rencana" && $this->uri->segment(2)=="list"){echo "active";}?>"><i class="fas fa-pen"></i> Rencana Mata Kuliah</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url('bahanajar/list'); ?>" class="nav-link <?php if($this->uri->segment(1)=="bahanajar" && $this->uri->segment(2)=="list"){echo "active";}?>"><i class="fas fa-download"></i> Bahan Ajar</a>
            </li>
          <?php endif;?>
        
        <!-- end jika user sudah login --> 
        </ul>


      </div>
    </nav>
    <?php endif;?>