<!DOCTYPE html>
<?php
	include '../../koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	
	if(!isset($_POST['from']) || !isset($_POST['to'])) {
		header("location:lap_training_search.php");
	} else {
		$from = $_POST['from'];
		$to = $_POST['to'];
		
		$_SESSION['from'] = $from;
		$_SESSION['to'] = $to;
	}
	
	$id = $_SESSION['id'];
	$query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$id'");
	$result = mysqli_fetch_array($query);
	if($result['level'] == 1) {
		$level = "Super Admin";
		$priv = 1;
	} else {
		$level = "Administrator";
	}
	$day = date("l");
	$date = date("j F Y");
	$time = date("H:m:s");
	$tgl = date("Y-m-d");
	$pict = rand(1, 5);
		$lpt='active';
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Lap Training | Vstalin Githa</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../../plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Color Picker -->
    <link href="../../plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
    <!-- Bootstrap time Picker -->
    <link href="../../plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../plugins/iCheck/all.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <a href="../../index.php" class="logo"><b>Vstalin Githa</b> Salon</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
			  <li class="header">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="dropdown-toggle" data-toggle="dropdown"><?php echo $day." / ".$date ?></span>
                </a>
			  </li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../../dist/img/avatar<?php echo $pict ?>.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">@<?php echo $id ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../../dist/img/avatar<?php echo $pict ?>.png" class="img-circle" alt="User Image" />
                    <p>
                      @<?php echo $id ?>
                      <small><?php echo $level ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="../../logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
	  <?php
		require 'sidebar.php';
	  ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Print Laporan Bulanan Peserta
          </h1>
        </section>
		
        <!-- Main content -->
        <section class="invoice">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
			  
                <div class="box-header">
					<table>
					  <tr>
						<td>Dari</td>
						<td>:</td>
						<td>&nbsp;&nbsp;&nbsp;<?php echo $from ?></td>
					  </tr>
					  <tr>
						<td>Sampai&nbsp;&nbsp;&nbsp;</td>
						<td>:</td>
						<td>&nbsp;&nbsp;&nbsp;<?php echo $to ?></td>
					  </tr>
					</table>
                </div><!-- /.box-header -->
				
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Tanggal Training</th>
                      <th>Nama Peserta</th>
                      <th>Golongan Usia</th>
                      <th>Jenis Training</th>
                      <th>No HP / Telepon</th>
                      <th>Pin BBM</th>
                      <th>Kota / Provinsi</th>
                      <th>No. Sertifikat</th>
                    </tr>
					<?php
						$query = mysqli_query($con, "SELECT DISTINCT trtr.tglMulai, trtr.tglSelesai, trtr.sertifikat, pe.nama, pe.golUsia, trtr.tipe, trg.namaTraining, pe.hp1, pe.hp2, pe.telpon, pe.pinBB, pe.kota, pe.provinsi FROM pelanggan pe INNER JOIN transaksi trk ON pe.idPelanggan = trk.Pelanggan_idPelanggan INNER JOIN transaksitraining trtr ON trk.idTransaksi = trtr.Transaksi_idTransaksi INNER JOIN training trg ON trtr.Training_idTraining = trg.idTraining INNER JOIN tipetraining titr ON trg.idTraining = titr.Training_idTraining WHERE trk.datestamp BETWEEN '$from' AND '$to' ORDER BY trk.datestamp ");
						$numbr = 1;
						while($hasil = mysqli_fetch_array($query)) {
							?>
							<tr>
							  <th style="width: 10px"><?php echo $numbr ?></th>
							  <th><?php echo $hasil['tglMulai']." - ".$hasil['tglSelesai'] ?></th>
							  <th><?php echo $hasil['nama'] ?></th>
							  <th><?php echo $hasil['golUsia']." tahun" ?></th>
							  <th><?php echo $hasil['tipe']." ".$hasil['namaTraining'] ?></th>
							  <th><?php echo $hasil['hp1']." / ".$hasil['hp2']." / ".$hasil['telpon'] ?></th>
							  <th><?php echo $hasil['pinBB'] ?></th>
							  <th><?php echo $hasil['kota']." / ".$hasil['provinsi'] ?></th>
							  <th><?php echo $hasil['sertifikat']?></th>
							  <th></th>
							</tr>
							<?php
							$numbr++;
						}
					?>
                  </table>
				<div class="box-footer">
				</div>
				  <div class="row no-print">
					<div class="col-xs-12">
					  <a href="training_print.php" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</a>
					</div>
				  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		</div><!-- /.content-wrapper -->
      <?php
		require 'footer.php';
	  ?>
    </div><!-- ./wrapper -->


    <!-- jQuery 2.1.3 -->
    <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="../../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="../../plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js" type="text/javascript"></script>
    <!-- Page script -->
    <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>

  </body>
</html>
