<!-- Core JS Goes here -->
	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

<!-- additional depending on the page needed --> 
	<!-- DataTables -->
	<?php if(in_array('datatables',$assets)){ ?>
		<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

		<!-- sementara -->
		<script>
			$(function () {
				$("#example1").DataTable({
				"responsive": true,
				"autoWidth": false,
				});
				$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
				});
			});
		</script>
	<?php } ?>

	<!-- SweetAlert 2 -->
	<?php if(in_array('sweetalert2',$assets)){ ?>
		<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<?php } ?>

	<!-- Daterange Picker -->
	<?php if(in_array('daterangepicker',$assets)){ ?> 
		<!-- InputMask -->
		<script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
		<!-- date-range-picker -->
		<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script src="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<?php } ?>

	<!-- Fungsi Konfirmasi -->
	<?php if(in_array('konfirm',$assets)){?>
		<script src="<?php echo base_url() ?>assets/pages/f_konfirm.js"></script>
	<?php } ?>

	<!-- fungsi alert -->
	<?php if(in_array('notif', $assets)){ ?>
		<script>
			if(typeof flashStatus !== 'undefined' && flashMsg !== 'undefined'){
				if (flashStatus=='SucessInsert'){
					$("#alertSuccess").append('<div class="alert alert-success text-center" style="opacity: 0.8;" role="alert">'+flashMsg+', <a href="'+site_url+'">Klik untuk melihat data !</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				} else if (flashStatus=='FailedInsert'){
					$("#alertSuccess").append('<div class="alert alert-warning text-center" style="opacity: 0.8;" role="alert">'+flashMsg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				}
			}
		</script>
	<?php } ?>
	  
<!-- additional Page script goes here -->
	<!-- Page Hujan Input -->
	<?php if(in_array('hip',$assets)){ ?>
		<script src="<?php echo base_url() ?>assets/pages/p_hujan_input.js"></script>
	<?php } ?>
	<!-- Page Hujan Edit -->
	<?php if(in_array('hep',$assets)){ ?>
		<script src="<?php echo base_url() ?>assets/pages/p_hujan_edit.js"></script>
	<?php } ?>

	<!-- Page DAS Input -->
	<?php if(in_array('dasip',$assets)){ ?>
		<script src="<?php echo base_url() ?>assets/pages/p_das_input.js"></script>
	<?php } ?>
	<!-- summernote -->
	<?php if(in_array('summernote',$assets)){ ?>
	<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote.min.js"></script>
	<?php } ?>

<!-- SIdebar -->
<script>
	$(document).ready(function(){
		var menu = '<?php echo $menu; ?>';
		switch(menu){
			case 'dashboard':
				$('#menuDashboard').addClass('active')
				break
			case 'MenuGejala':
				$('#menuGejala').addClass('menu-open')
				$('#Gejala').addClass('active')
				$('#menuGejala a:first').addClass('active')
				$('#topbarGejala').addClass('active')
				break
			case 'GejalaInput':
				$('#menuGejala').addClass('menu-open')
				$('#GejalaInput').addClass('active')
				$('#menuGejala a:first').addClass('active')
				$('#topbarGejala').addClass('active')
				break
			case 'MenuKerusakan':
				$('#menuKerusakan').addClass('menu-open')
				$('#Kerusakan').addClass('active')
				$('#menuKerusakan a:first').addClass('active')
				$('#topbarKerusakan').addClass('active')
				break
			case 'KerusakanInput':
				$('#menuKerusakan').addClass('menu-open')
				$('#KerusakanInput').addClass('active')
				$('#menuKerusakan a:first').addClass('active')
				$('#topbarKerusakan').addClass('active')
				break
			case 'MenuCF':
				$('#menuCF').addClass('menu-open')
				$('#CF').addClass('active')
				$('#menuCF a:first').addClass('active')
				$('#topbarCF').addClass('active')
				break
			case 'CFInput':
				$('#menuCF').addClass('menu-open')
				$('#CFInput').addClass('active')
				$('#menuCF a:first').addClass('active')
				$('#topbarCF').addClass('active')
				break
			case 'MenuUser':
				$('#menuUser').addClass('menu-open')
				$('#User').addClass('active')
				$('#menuUser a:first').addClass('active')
				$('#topbarUser').addClass('active')
				break
			case 'UserInput':
				$('#menuUser').addClass('menu-open')
				$('#UserInput').addClass('active')
				$('#menuUser a:first').addClass('active')
				$('#topbarUser').addClass('active')
				break
			default:
				$('#menuDashboard').addClass('active')
				break
			
		}
	})
</script>