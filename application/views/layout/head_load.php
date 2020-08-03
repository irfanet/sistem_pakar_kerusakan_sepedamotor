<!-- Core CSS / JS goes here -->

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- additional depending on the page needed -->
  <!-- ION icon -->
  <?php if(in_array('ion',$assets)){ ?>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <?php } ?> 
  
  <!-- DataTables -->
  <?php if(in_array('datatables',$assets)){ ?> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <?php } ?>

  <!-- SweetAlert2 -->
  <?php if(in_array('sweetalert2',$assets)){ ?> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <?php } ?>

  <!-- Daterange Picker -->
  <?php if(in_array('daterangepicker',$assets)){ ?> 
    <!-- daterangepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <?php } ?>
    <!-- summernote -->
    <?php if(in_array('summernote',$assets)){ ?> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote.min.css">
    <?php } ?>


<!-- Page Style Script goes here -->