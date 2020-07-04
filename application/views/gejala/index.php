<?php
$title = "Data Gejala";
$controller = "Gejala";
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <!-- Flashdata -->
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <?php if ($this->session->flashdata('flash')) : ?>
  <?php endif; ?>
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-info card-outline">
          <div class="card-header">
            <?= $title; ?>
            <a href="<?php echo site_url($controller . '/inputForm') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i> Tambah Data</a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead class="text-center">
                <th width="50px">No</th>
                <th>Kode</th>
                <th>Gejala</th>
                <th width="100px">Aksi</th>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($getData as $showData) { ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $showData->kd_gejala; ?></td>
                    <td><?php echo $showData->gejala; ?></td>
                    <td>
                      <a href="<?= base_url($controller); ?>/editForm/<?= $showData->id; ?>" class="btn btn-small btn-warning"><i class="fas fa-edit"></i></a>
                      <!-- <a href="<?= base_url($controller); ?>/deleteData/<?= $showData->id; ?>" class="btn btn-small btn-danger"><i class="fas fa-trash"></i></a> -->
                      <a data-href="<?php echo site_url('gejala/deleteData') ?>" data-item="das" onclick="confirmDel('<?php echo urlencode(base64_encode($showData->id)) ?>')" class="btn btn-small btn-danger" id="delBtn"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>

                <?php
                  $no++;
                } ?>
              </tbody>
              <tfoot class="text-center">
                <th>No</th>
                <th>Kode</th>
                <th>Gejala</th>
                <th>Aksi</th>
              </tfoot>
            </table>

          </div>
        </div><!-- /.card -->
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->