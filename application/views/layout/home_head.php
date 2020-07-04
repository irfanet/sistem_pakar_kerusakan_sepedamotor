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

  <title>SP | Diagnosa Kerusakan</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css" media="all">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css" media="all">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" media="all">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-white">
    <div class="container">
      <a href="<?= base_url() ?>homepage/login" class="navbar-brand">
        <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Sistem Pakar</span>
      </a>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
      <?php if($this->session->userdata('id_user')==TRUE){
                $nama_user = $this->session->userdata('nama')." - Dashboard";
                $url = base_url()."gejala";	
              }else{
                $nama_user = "Login";
                $url = base_url()."homepage/login";		
              }
              ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= $url ?>" class="nav-link"><i class="fas fa-user"></i> <?= $nama_user ?></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

 