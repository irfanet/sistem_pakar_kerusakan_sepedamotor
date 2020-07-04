 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url('Gejala') ?>" class="nav-link" id="topbarGejala"><b>Data Gejala </b></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url('Kerusakan') ?>" class="nav-link" id="topbarKerusakan"><b>Data Kerusakan </b></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url('CF') ?>" class="nav-link" id="topbarCF"><b>CF Aturan </b></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url('User') ?>" class="nav-link" id="topbarUser"><b>User </b></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
      <?php if($this->session->userdata('id_user')==TRUE){
                $nama_user = $this->session->userdata('nama');
                $status = "Logout";	
              }else{
                $nama_user = "Login";
                $status = "Login";	
              }
              ?>
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <?= $nama_user ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="<?= base_url();?>homepage/<?= $status ?>" class="dropdown-item dropdown-footer"><?= $status ?></a>
        </div>
      </li>
    </ul>
  </nav>