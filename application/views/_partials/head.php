<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/img_properties/logoNew.png">
  <title>Pengelola Kas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/summernote/summernote-bs4.min.css">
  <!-- fancybox -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/fancybox/jquery.fancybox.min.css">
  <!-- datatables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/datatables/css/dataTables.bootstrap4.min.css">
  <!-- picture -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/picture.css">
  <!-- morris -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/morris/morris.css">
  
  <style>
    .nav-link.active {
      background-color: #01bf63 !important; 
      color: #ffffff !important; 
    }
    .main-sidebar .nav-sidebar .nav-link:hover {
      background-color: #b7e7c6 !important;
      color: #fff !important;
    }
    .nav-link[data-widget="pushmenu"] {
      color: #fff !important;
      background-color: #01bf63; 
      border-radius: 4px; 
      padding: 8px; 
    }

    .nav-link[data-widget="pushmenu"]:hover {
      background-color: #b7e7c6; 
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  
  <div id="preloader" class="preloader flex-column justify-content-center align-items-center">
    <div class="spinner-border text-success" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  </div>
  <script>
    setTimeout(function(){        
      $('#preloader').fadeOut();
      $('.preloader_img').delay(150).fadeOut('slow'); 
    }, 10000);
  </script>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= site_url('dashboard') ?>" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php
            $avatar = $current_user->avatar ?
            base_url('upload/avatar/' . $current_user->avatar) :
            get_gravatar($current_user->email);
          ?>
          <img src="<?= $avatar ?>" alt="<?= htmlentities($current_user->nama_lengkap, TRUE) ?>" width="30" height="30" class="rounded-circle">
          <span><b><?= htmlentities($current_user->nama_lengkap) ?></b></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a href="<?= site_url('setting') ?>" class="dropdown-item">
            <i class="far fa-fw fa-user"></i> Profile
          </a>
          <a href="<?= site_url('login_controller/logout') ?>" class="dropdown-item">
            <i class="fas fa-fw fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>  
    </ul>

  </nav>
  <!-- /.navbar -->