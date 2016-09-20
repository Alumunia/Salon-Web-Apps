<!DOCTYPE html>
<?php
	include '../../koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	$id = $_SESSION['id'];
	$query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$id'");
	$result = mysqli_fetch_array($query);
	if($result['level'] == 1) {
		$level = "Super Admin";
		$priv = 1;
	} else {
		$level = "Administrator";
		header("location:../../index.php");
	}
	$day = gmdate("l");
	$date = gmdate("j F Y");
	$time = gmdate("H:m:s");
	$tgl = gmdate("Y-m-d");
	$pict = rand(1, 5);
	
		if (!isset($_GET['from']) && !isset($_GET['to'])) {
		$from=$tgl;
		$to=$tgl;
		header("location:table_report.php?from=$tgl&to=$tgl");
		}
		else{
	$from=$_GET['from'];
	$to=$_GET['to'];
	}
$lk='active';
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Lap Keuangan | Vstalin Githa</title>
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
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
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
        <!-- Main content -->
        <section class="content">
		
          <div class="row">
		 
			<!----------------KONTEN TABEL--------------------------------->
			
			    <div class="box">
				   
                <div class="box-header ">
				<div class="text-center">
                <h3 class="box-title  " >Data Laporan Keuangan</h3>
				</div>
				
				<!------------------------------------------------THE BEGINNING OF THE DATE------------------------->
				<br>
		
				<form method="post" action="../process/report_process.php">
				   <!-- Date dd/mm/yyyy -->
					<div class="col-md-3">
					<div class="form-group">
                    <label class="text-left">Dari Tanggal:</label>
                    <div class="input-group">
					<div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" value="<?php echo $from ?>" name="from" class="form-control" />
                    </div><!-- /.input group -->
					</div><!-- /.form group -->
					</div>
				  
				  <!-----THE END OF THE DATE------>
				 
				 
				   <!-- Date dd/mm/yyyy -->
					<div class="col-md-3">
					<div class="form-group">
                    <label class="text-left">Sampai Tanggal:</label>
                    <div class="input-group">
					<div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" value="<?php echo $to ?>" name="to" class="form-control"/>
                    </div><!-- /.input group -->
					</div><!-- /.form group -->
					</div>
				  
				  <!-----THE END OF THE DATE------>
				  
				  <div class="col-md-4">
				   <input type="submit" class="btn btn-info btn-sm fa fa-print" style=" margin-top: 25px;" value="GO!"/>
				  </div>
				  </form>
				  <!-------------------------THE END OF DATE FORM--------------------------->
				  
				
				  
				  
				  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Transaksi</th>
                        <th>Kredit (B)</th>
                        <th>Debit (C)</th>
                      </tr>
					</thead>
					<tbody>
					  <?php
						$number = 1;
						$kredit = 0;
						$debit = 0;
						$query = mysqli_query($con, "SELECT * FROM (SELECT datestamp FROM transaksi UNION SELECT Pengeluaran_tglPengeluaran as datestamp FROM barang ORDER BY datestamp ASC) InnerQuery WHERE datestamp BETWEEN '$from' AND '$to'");
						while ($result = mysqli_fetch_array($query)) {
							$date = $result['datestamp'];
							$qry2 = mysqli_query($con,  "SELECT pr.namaProduk, tp.jumlahProduk, tp.biaya, tp.diskon
														FROM transaksi trans INNER JOIN transaksiproduk tp ON idTransaksi = Transaksi_idTransaksi 
														INNER JOIN produk pr ON Produk_idProduk = idProduk WHERE trans.datestamp = '$date';");
							while($res2 = mysqli_fetch_array($qry2)) {
								?>
								  <tr>
									<td><?php echo $number ?></td>
									<td><?php echo $date?></td>
									<td>Penjualan <?php echo $res2['namaProduk'] ?></td>
									<td></td>
									<td><?php echo $res2['biaya']-$res2['diskon'] ?></td>
									
								  </tr>
								<?php
								$number++;
								$debit += ($res2['biaya']-$res2['diskon']);
							}
							$qry = mysqli_query($con, "SELECT * FROM BARANG where Pengeluaran_tglPengeluaran = '$date' ORDER BY namaBarang ASC");
							while($res = mysqli_fetch_array($qry)) {
								?>
								  <tr>
									<td><?php echo $number ?></td>
									<td><?php echo $date?></td>
									<td>Pembelian <?php echo $res['namaBarang'] ?></td>
									<td><?php echo $res['harga']*$res['jumlahBarang'] ?></td>
									
								  </tr>
								<?php
								$number++;
								$kredit += ($res['harga']*$res['jumlahBarang']);
							}
							$qry1 = mysqli_query($con, "SELECT tr.namaTraining, tipe.tipe, tt.diskon, tt.biaya
														FROM transaksi trans INNER JOIN transaksitraining tt ON trans.idTransaksi = tt.Transaksi_idTransaksi
														INNER JOIN training tr ON tt.Training_idTraining = tr.idTraining
														INNER JOIN tipetraining tipe ON tr.idTraining = tipe.Training_idTraining
														WHERE trans.datestamp = '$date';");
							while($res1 = mysqli_fetch_array($qry1)) {
								?>
								  <tr>
									<td><?php echo $number ?></td>
									<td><?php echo $date?></td>
									<td><?php echo $res1['tipe']." ".$res1['namaTraining'] ?></td>
									<td></td>
									<td><?php echo $res1['biaya']-$res1['diskon'] ?></td>
									
								  </tr>
								<?php
								$number++;
								$debit += ($res1['biaya']-$res1['diskon']);
							}
							?>
								<tr>
									<td colspan="6"></td>
								</tr>
							<?php
						}
					  ?>
					  <tr>
						<td colspan="3" align="right"><strong>Total</strong></td>
						<td><strong><?php echo $kredit ?></strong></td>
						<td><strong><?php echo $debit ?></strong></td>
					  </tr>
					   <tr>
						<td colspan="3" align="right"><strong>Grand Total</strong></td>
						<td colspan="2"><strong><?php echo($kredit - $debit) ?></strong></td>
					  </tr>
					</tbody>
                  </table>
				   <a type="button" class="btn btn-primary" href="report_print.php?from=<?php echo $from ?>&to=<?php echo $to ;?>">Print</a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			<!---------------THE END OF TABEL KONTEN----------------------->
				</div><!-- /.row -->
			  </div>
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
