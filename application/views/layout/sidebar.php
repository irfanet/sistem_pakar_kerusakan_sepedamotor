  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">App Name</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User Name & Foto</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="<?php echo site_url('Page_c') ?>" class="nav-link" id="menuDashboard">
              <i class="nav-icon fas fa-home"></i>
              <p> Dashboard </p>
            </a>
          </li>

          <!-- Menu Daerah Aliran Sungai-->
          <li class="nav-item has-treeview" id="menuGejala">
            <a class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Data Gejala
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Gejala') ?>" class="nav-link" id="Gejala">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Gejala</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Gejala/inputForm') ?>" class="nav-link" id="GejalaInput">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Gejala</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu Daerah Aliran Sungai-->
          <li class="nav-item has-treeview" id="menuKerusakan">
            <a class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Data Kerusakan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Kerusakan') ?>" class="nav-link" id="Kerusakan">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Kerusakan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Kerusakan/inputForm') ?>" class="nav-link" id="KerusakanInput">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Kerusakan</p>
                </a>
              </li>
            </ul>
          </li>

             <!-- Menu Daerah Aliran Sungai-->
          <li class="nav-item has-treeview" id="menuCF">
            <a class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                CF Aturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('cf') ?>" class="nav-link" id="cf">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai CF</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('cf/inputForm') ?>" class="nav-link" id="cfInput">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Rules CF</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- <li class="nav-item">
            <a href="<?php echo site_url('CF') ?>" class="nav-link" id="menuCF">
              <i class="nav-icon fas fa-home"></i>
              <p> CF Fakta</p>
            </a>
          </li> -->

          
          <!-- <li class="nav-item">
            <a href="<?php echo site_url('Riwayat') ?>" class="nav-link" id="menuDashboard">
              <i class="nav-icon fas fa-home"></i>
              <p> Riwayat </p>
            </a>
          </li> -->

    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>