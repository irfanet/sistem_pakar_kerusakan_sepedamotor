 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Diagnosa Kerusakan <small>Sepeda Motor</small></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Gejala Kerusakan</h5>
  
                <p class="card-text">
                <section id="kontak" class="call-to-action-area section-gap " style="background-image: -webkit-linear-gradient(0deg, #ffffff 0%, #ffffff 100%) !important;" >
                  <div class="container">
                  <?php echo form_open()?>
                    <div class="row d-flex justify-content-center">
                      <div class="menu-content pb-60 col-lg-6">
                        <div class="title text-center">
                          <h2 style="margin-bottom: 0px;">Diagnosa</h2><br>
                          <p>Silahkan pilih gejala - gejala kerusakan yang dirasakan pada kendaraan sepeda motor anda, dengan cara mencetangnya</p>
                        </div>
                      </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                      <div class="col-md-10 col-md-offset-2" >
                        <span style="font-weight: bold;" >Gejala</span><br>
                          <?php
                                    $this->load->model(array('Gejala_model'));
                                    $listGejala = $this->Gejala_model->get_by_kelompok();
                                    foreach($listGejala->result() as $value2){?>
                          <input  class="form-check-input"  type="checkbox" name="gejala[]" value="<?php echo $value2->id?>" > <b><?php echo $value2->kd_gejala."</b> - ".$value2->gejala?> <br>
                        <br>
                        <?php }?>
                      </div>
                    </div>
                    <br>
                    <div class="row d-flex justify-content-center">
                      <div class="col-md-12" style="float: left; padding: 0;">
                        <button type="submit" name="submit" class="btn main-btn" style="background-color: #41C1FF;  border-radius: 0px;">Proses</button>
                      </div>
                    </div>
                  </div>
                  <?php echo form_close()?>
                </section>

                </p>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


                
 