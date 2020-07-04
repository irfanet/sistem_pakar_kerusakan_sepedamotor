 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Diagnosa Kerusakan <small>Kendaraan Sepeda Motor</small></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
      <div class="container" id="printHasil">
        <div class="row">
          <div class="col-lg-12">

            <div class="card card-primary card-outline">
              <div class="card-body">
              <h3 class="card-title">
                  <i class="fas fa-wrench"></i>
                  Hasil Diagnosa
                </h3>
  
                <p class="card-text">
                    <!-- <section class="call-to-action-area section-gap " style="background-image: -webkit-linear-gradient(0deg, #ffffff 0%, #ffffff 100%) !important; padding:60px 120px;" id="printTable" > -->
                    <!-- <div class="content" style="padding:10px 40px;"> -->
                        <!-- <h2>Hasil Analisis</h2> -->
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h6 class="box-title">Gejala yang dipilih</h6>
                            </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <table id="tbl-list" class="table table-condensed">
                                    <tr>
                                        <th width="50px" style="background: #007BFF; color: white">No</th>
                                        <th width="150px" style="background: #007BFF; color: white">Kode Gejala</th>
                                        <th style="background: #007BFF; color: white">Gejala</th>
                                    </tr>
                                        <?php $i = 1; foreach($listGejala->result() as $value){?>
                                            <tr>
                                                <td width="30px"><?php echo $i++?></td>
                                                <td><?php echo $value->kd_gejala ?></td>
                                                <td><?php echo $value->gejala?></td>
                                            </tr>
                                        <?php }?>
                                </table>
                            </div><!--box body-->
                        </div><!--box-->
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h6 class="box-title">Kerusakan yang dialami</h6>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="tbl-list" class="table table-condensed"">
                                    <tr>
                                        <th width="50px" style="background: #007BFF; color: white">No</th>
                                        <th width="150px" style="background: #007BFF; color: white">Kode Kerusakan</th>
                                        <th style="background: #007BFF; color: white">Kerusakan</th>
                                        <th style="background: #007BFF; color: white">Tingkat Kepercayaan</th>
                                        <th width="50px" style="background: #007BFF; color: white"></th>
                                    </tr>
                                    <tr>
                                        <?php $i = 1; foreach($listKerusakan as $value){?>
                                            <?php $color = 'danger';
                                            $style='<b>';
                                            if ($i>1){
                                                $color = 'primary';
                                                $style = '';
                                            }
                                            ?>
                                            <tr>
                                                <td width="30px"><?php echo $i++?></td>
                                                <td><?php echo $style.$value['kode'] ?></td>
                                                <td><?php echo $style.$value['kerusakan']?></td>
                                                <td>
                                                <div class="progress">
                                                <div class="progress-bar bg-<?= $color; ?> progress-bar-striped" role="progressbar"
                       aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?= $value['kepercayaan']?>%"></div>
                                                </div>
                                                </td>
                                                <td><span class="badge bg-<?= $color; ?>"><?php echo $value['kepercayaan']?> %</span></td>
                                            </tr>
                                        <?php }?>
                                    </tr>
                                </table>
                            </div><!--box body-->
                        </div><!--box-->

                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h6 class="box-title">Kesimpulan :</h6>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <?php if(sizeof($listKerusakan)>0) { ?>
                                    <p>
                                        Berdasarkan hasil diagnosa, motor anda mengalami kerusakan <b><?php echo $listKerusakan[0]['kerusakan'];?></b> dengan tingkat kepercayaan <b><?php echo $listKerusakan[0]['kepercayaan'];?>%</b>.<br/>
                                        <h6 class="box-title">Solusi :</h6>
                                        <?php echo $listKerusakan[0]['penanganan'];?>. 
                                        <!-- <p style="font-style: bold; color: red; font-size: 13px;">*Hasil diagnosa ini masih membutuhkan pemeriksaan lebih lanjut yaitu dengan pemeriksaan USG untuk mendapatkan hasil yang lebih akurat.</p> -->
                                    </p>
                                <?php }else{?>
                                    <p>
                                        Kerusakan tidak dapat diprediksi karena tingkat kepercayaan gejala terlalu rendah
                                    </p>
                                <?php }?>
                            </div><!--box body-->
                            <div class="box-footer clearfix" id="notPrinted">
                            <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-2">
                            <a href="<?php echo site_url()?>homepage/">
                            <button type="button" class="btn btn-block btn-default"> <i class="fas fa-undo "></i> Deteksi Ulang</button></a>
                            </div>
                            
                            <div class="col-md-2">
                            <button type="button" onclick="printDiv('printHasil')" class="btn btn-block btn-default"> <i class="fas fa-print"></i> Print Hasil</button>
                            </div>
                        </div><!--box-->
                    </div>
                    <!-- </section> -->

                    
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


 
                    
                    <script type="text/javascript">
                      function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
                    </script>