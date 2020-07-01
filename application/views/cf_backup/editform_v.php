<?php
$title = "Data CF Fakta";
$controller = "CF";
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

                            <!-- Form-part input CF Fakta -->
                            <div class="form-group row">
                                <label for="cf_fakta" class="col-sm-2 col-form-label">CF Fakta</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="cf_fakta" name="cf_fakta" min="0" value="<?= $showData->cf_fakta; ?>" placeholder="CF Fakta">
                                </div>
                            </div>

                            <!-- Form-part input CF -->
                            <div class="form-group row">
                                <label for="nilai_cf" class="col-sm-2 col-form-label">CF</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nilai_cf" name="nilai_cf" step="0.01" min="0" value="<?= $showData->nilai_cf; ?>" placeholder="CF">
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