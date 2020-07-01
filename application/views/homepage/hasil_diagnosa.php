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
      <div class="container">
        <div class="row">
          <div class="col-lg-12">

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
  
                <p class="card-text">
                    <section class="call-to-action-area section-gap " style="background-image: -webkit-linear-gradient(0deg, #ffffff 0%, #ffffff 100%) !important; padding:60px 120px;" id="printTable" >
                    <!-- <div class="content" style="padding:10px 40px;"> -->
                        <h2>Hasil Analisis</h2>
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h6 class="box-title">Gejala yang dipilih</h6>
                            </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <table id="tbl-list" class="table table-bordered">
                                    <tr>
                                        <th width="50px" style="background: #67CDFF; color: white">No</th>
                                        <th style="background: #67CDFF; color: white">Gejala</th>
                                    </tr>
                                    <tr>
                                        <?php $i = 1; foreach($listGejala->result() as $value){?>
                                            <tr>
                                                <td width="30px"><?php echo $i++?></td>
                                                <td><?php echo $value->kd_gejala." - ".$value->gejala?></td>
                                            </tr>
                                        <?php }?>
                                    </tr>
                                </table>
                            </div><!--box body-->
                        </div><!--box-->
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h6 class="box-title">Hasil Diagnosa</h6>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="tbl-list" class="table table-bordered">
                                    <tr>
                                        <th width="50px" style="background: #67CDFF; color: white">No</th>
                                        <th style="background: #67CDFF; color: white">Kerusakan</th>
                                        <th style="background: #67CDFF; color: white">Tingkat Kepercayaan</th>
                                    </tr>
                                    <tr>
                                        <?php $i = 1; foreach($listPenyakit as $value){?>
                                            <tr>
                                                <td width="30px"><?php echo $i++?></td>
                                                <td><?php echo $value['kode']." - ".$value['nama']?></td>
                                                <td><?php echo $value['kepercayaan']?> %</td>
                                            </tr>
                                        <?php }?>
                                    </tr>
                                </table>
                            </div><!--box body-->
                        </div><!--box-->

                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h6 class="box-title">Kesimpulan</h6>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <?php if(sizeof($listPenyakit)>0) { ?>
                                    <p>
                                        Berdasarkan hasil analisa, Motor mengalami kerusakan <b><?php echo $listPenyakit[0]['nama'];?></b> dengan tingkat kepercayaan <b><?php echo $listPenyakit[0]['kepercayaan'];?> %</b><br/>
                                        <?php echo $listPenyakit[0]['keterangan'];?>. 
                                        <!-- <p style="font-style: bold; color: red; font-size: 13px;">*Hasil diagnosa ini masih membutuhkan pemeriksaan lebih lanjut yaitu dengan pemeriksaan USG untuk mendapatkan hasil yang lebih akurat.</p> -->
                                    </p>
                                <?php }else{?>
                                    <p>
                                        Kerusakan tidak dapat diprediksi karena tingkat kepercayaan gejala terlalu rendah
                                    </p>
                                <?php }?>
                            </div><!--box body-->
                            <div class="box-footer clearfix">
                                <a class="btn btn-sm btn-flat pull-right" style="background: #67CDFF; color: white;" href="<?php echo site_url()?>homepage/">Deteksi Ulang</a>
                                <button class="btn btn-sm btn-flat pull-right" style="background: #67CDFF; color: white; margin-right:10px;" onclick>Cetak</button> 
                            
                            </div>
                        </div><!--box-->
                    </div>
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


 
                    
                    <script type="text/javascript">
                        function printData()
                        {
                            var
                            divToPrint=document.getElementById('printTable');
                            newWin= window.open("");
                            newWin.document.write(divToPrint.outerHTML);
                            newWin.print();
                            newWin.close();
                        }

                        $('button').on('click',function(){
                            printData();
                        })
                    </script>