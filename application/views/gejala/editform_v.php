<?php
$title = "Data Gejala";
$controller = "Gejala";
?>
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

                            <!-- Form-part input Kode Gejala -->
                            <div class="form-group row">
                                <label for="kd_gejala" class="col-sm-2 col-form-label">Kode Gejala</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kd_gejala" name="kd_gejala" min="0" value="<?= $showData->kd_gejala; ?>" placeholder="Kode Gejala">
                                </div>
                            </div>

                            <!-- Form-part input Gejala -->
                            <div class="form-group row">
                                <label for="gejala" class="col-sm-2 col-form-label">Gejala</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="gejala" name="gejala" step="0.01" min="0" value="<?= $showData->gejala; ?>" placeholder="Gejala">
                                </div>
                            </div>

                                                        <!-- Form-part input CF Aturan -->
                            <!-- <div class="form-group row">
                                <label for="cf_aturan" class="col-sm-2 col-form-label">CF Aturan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="cf_aturan" name="cf_aturan" step="0.01" min="0" value="<?= $showData->cf_aturan; ?>" placeholder="CF Aturan">
                                </div>
                            </div> -->

                      
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