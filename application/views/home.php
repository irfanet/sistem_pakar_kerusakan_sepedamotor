
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-md-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $dasCount ?></h3>

                <p>Daerah Aliran Sungai Terdata</p>
              </div>
              <div class="icon">
                <i class="fas fa-map-pin"></i>
              </div>
              <a href="<?php echo site_url('Das_c') ?>" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-md-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo (isset($lastHB[0]->hb_rainfall))? $lastHB[0]->hb_rainfall : '-'; ?></h3>
                <p><?php echo (isset($lastHB[0]->hb_date))? 'Curah hujan bulan '.date('F-Y', strtotime($lastHB[0]->hb_date)) : 'Data Tidak Tersedia' ?></p>
              </div>
              <div class="icon">
                <i class="fas fa-cloud-rain"></i>
              </div>
              <a href="<?php echo site_url('Hujan_c/hujanBulanan') ?>" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-md-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo (isset($lastHM[0]->hm_rainfall))? $lastHM[0]->hm_rainfall : '-'; ?></h3>
                <p><?php echo (isset($lastHM[0]->hm_date))? 'Curah hujan '.date('m/Y', strtotime($lastHM[0]->hm_date)) : 'Data Tidak Tersedia' ?></p>
              </div>
              <div class="icon">
                <i class="fas fa-cloud-showers-heavy"></i>
              </div>
              <a href="<?php echo site_url('Hujan_c/hujanMingguan') ?>" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->