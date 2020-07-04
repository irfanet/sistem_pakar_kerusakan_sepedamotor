 <?php
  $title = "Data User";
  $controller = "User";
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

             <!-- Form-part input Nama -->
             <div class="form-group row">
               <label for="nama" class="col-sm-2 col-form-label">Nama</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="nama" name="nama" min="0" placeholder="Nama">
               </div>
             </div>

             <!-- Form-part input Username -->
             <div class="form-group row">
               <label for="username" class="col-sm-2 col-form-label">Username</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="username" name="username" step="0.01" min="0" placeholder="Username">
               </div>
             </div>

             
            <!-- Form-part input Username -->
            <div class="form-group row">
               <label for="password" class="col-sm-2 col-form-label">Password</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="password" name="password" step="0.01" min="0" placeholder="Password">
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
                var site_url = "<?php echo site_url('username') ?>";
                var flashMsg = "<?php echo $this->session->flashdata('flashMsg') ?>";
            </script>
    <?php } ?>