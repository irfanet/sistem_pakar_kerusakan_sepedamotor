<?php
$title = "Data Kerusakan";
$controller = "Kerusakan";
?>
      <!-- Tiny MCE -->

      <script src="<?php echo base_url() ?>assets/js_custome/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
      <script>tinymce.init({selector:'textarea'});</script>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo site_url($controller) ?>"><?= $title; ?></a></li>
                    <li class="breadcrumb-item active">Edit <?= $title; ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Form Edit <?= $title; ?></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST">
                    <div class="card-body">

                        <?php
                        foreach ($getData as $showData) {
                        ?>

                            <input type="hidden" name="id" value="<?= $showData->id; ?>" ?>

                            <!-- Form-part input Kode Kerusakan -->
                            <div class="form-group row">
                                <label for="kd_kerusakan" class="col-sm-2 col-form-label">Kode Kerusakan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kd_kerusakan" name="kd_kerusakan" min="0" value="<?= $showData->kd_kerusakan; ?>" placeholder="Kode Kerusakan">
                                </div>
                            </div>

                            <!-- Form-part input Kerusakan -->
                            <div class="form-group row">
                                <label for="kerusakan" class="col-sm-2 col-form-label">Kerusakan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kerusakan" name="kerusakan" step="0.01" min="0" value="<?= $showData->kerusakan; ?>" placeholder="Kerusakan">
                                </div>
                            </div>

                            <!-- Form-part input Penanganan -->
                            <!-- <div class="form-group row">
                                <label for="penanganan" class="col-sm-2 col-form-label">Penanganan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="penanganan" name="penanganan" step="0.01" min="0" value="<?= $showData->penanganan; ?>" placeholder="Penanganan">
                                </div>
                            </div> -->
                                        <!-- Form-part input Kerusakan -->
                            <div class="form-group row">
                            <label for="penanganan" class="col-sm-2 col-form-label">Penanganan</label>
                            <div class="col-sm-10">
                                <textarea class="textarea" id="penanganan" name="penanganan"  placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $showData->penanganan; ?></textarea>
                            </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" class="btn btn-danger float-right">Reset</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->