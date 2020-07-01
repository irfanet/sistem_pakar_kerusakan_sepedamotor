 <?php
  $title = "Data CF";
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
           <li class="breadcrumb-item active">Tambah <?= $title; ?></li>
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
           <h3 class="card-title">Form Tambah <?= $title; ?></h3>
         </div>
         <!-- /.card-header -->
         <!-- form start -->
         <form class="form-horizontal" method="POST" action="<?php echo site_url($controller . '/inputProses') ?>">
           <div class="card-body">
                            <div id="alertSuccess">
                            </div>

             <!-- Form-part input Kode CF -->
             <div class="form-group row">
                            <label for="kd_kerusakan" class="col-sm-2 col-form-label">Kerusakan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_kerusakan" id="kd_kerusakan" required>
                                    <option value="0">-- Pilih Jenis Kerusakan --</option>
                                    <?php foreach($getKerusakan as $showOpt){ ?>
                                    <option value="<?php echo $showOpt->id ?>"><?php echo $showOpt->kd_kerusakan.' - '.$showOpt->kerusakan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                           <!-- Form-part input Kode CF -->
             <div class="form-group row">
                            <label for="kd_gejala" class="col-sm-2 col-form-label">Gejala</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_gejala" id="kd_gejala" required>
                                    <option value="0">-- Pilih Jenis Gejala --</option>
                                    <?php foreach($getGejala as $showOpt){ ?>
                                    <option value="<?php echo $showOpt->id ?>"><?php echo $showOpt->kd_gejala.' - '.$showOpt->gejala ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

             <!-- Form-part input Nilai MD -->
             <div class="form-group row">
               <label for="md" class="col-sm-2 col-form-label">Nilai MD</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="md" name="md" step="0.01" min="0" placeholder="Nilai MD">
               </div>
             </div>

               <!-- Form-part input Nilai MB -->
  <div class="form-group row">
               <label for="mb" class="col-sm-2 col-form-label">Nilai MB</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="mb" name="mb" step="0.01" min="0" placeholder="Nilai MB">
               </div>
             </div>


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
 <?php if($this->session->flashdata('flashStatus')){ ?>
            <script>
                var flashStatus = "<?php echo $this->session->flashdata('flashStatus') ?>";
                var site_url = "<?php echo site_url('cf') ?>";
                var flashMsg = "<?php echo $this->session->flashdata('flashMsg') ?>";
                console.log(flashStatus);
            </script>
    <?php } ?>