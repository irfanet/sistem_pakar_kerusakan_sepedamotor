  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sistem Pakar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php if ($this->session->userdata('id_user') == TRUE) {
            $nama_user = $this->session->userdata('nama');
          } else {
            $nama_user = "User";
          }
          ?>
          <a href="#" class="d-block"><?= $nama_user ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="<?php echo site_url('homepage') ?>" class="nav-link" id="menuDashboard">
              <i class="nav-icon fas fa-home"></i>
              <p> Homepage </p>
            </a>
          </li>

          <li class="nav-header">DATASET</li>
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
          </li>

          <li class="nav-header">CERTAINLY FACTOR</li>
          <!-- Menu Daerah Aliran Sungai-->
          <li class="nav-item has-treeview" id="menuCF">
            <a class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                CF Aturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('cf') ?>" class="nav-link" id="CF">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai CF</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('cf/inputForm') ?>" class="nav-link" id="CFInput">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Rules CF</p>
                </a>
              </li>
            </ul>
          </li>
          </li>

          <li class="nav-header">LAINNYA</li>
          <!-- Menu -->
          <li class="nav-item has-treeview" id="menuUser">
            <a class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('User') ?>" class="nav-link" id="User">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('User/inputForm') ?>" class="nav-link" id="UserInput">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah User</p>
                </a>
              </li>
            </ul>
          </li>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>