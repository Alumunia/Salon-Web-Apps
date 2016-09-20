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
	}
	$day = date("l");
	$date = date("j F Y");
	$time = date("H:m:s");
	$tgl = date("Y-m-d");
	$pict = rand(1, 5);
	
		if (!isset($_GET['from'])) {
		$from=$tgl;
		header("location:table_outcome.php?from=$tgl");
		}
		else{
	$from=$_GET['from'];
	}
	
	$ipeng='active';

?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Input Pengeluaran | Vstalin Githa</title>
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
	  <?php
		require 'sidebar.php';
	  ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Pengeluaran (Debit)
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
			
            <div class="col-md-8">
			
              <div class="box box-info">
				<div class="box-header">
							<div class="col-md-4"><h3 class="box-title text-center">Data Pengeluaran</h3></div>
							<div class="col-md-4"></div>
							<div class="col-md-4"></div>
							</div><!-- /.box-header -->
                <div class="box-body">
				  <div class="row">
				   <div class="col-md-6">
					<form action="../process/outcome_process.php" method="post">
						<div class="from-group">
							<label>Filter:</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="date" value="<?php echo $from ?>"class="form-control" name="from" />
								<span class="input-group-btn"> 
								  <input type="submit" class="btn btn-info btn-flat" value="Go!"/>
								</span>
							</div><!-- /.input group -->							
						</div>
					</form>
				   </div>
				
				  </div>					
                </div>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">No</th>
                     
                      <th>Pembelian Barang</th>
                      <th>Jumlah</th>
					  <th>Harga</th>
					  <th >Total</th>
                      <th>Supplier</th>
                    </tr>
					<?php
					$no=1;
$result = mysqli_query($con,"SELECT * FROM barang WHERE Pengeluaran_tglPengeluaran = '$from' ") 
or die(mysqli_error());  
$sum=0;
$sum1=0;
$sum2=0;

    // output data of each row
    while($row = mysqli_fetch_assoc( $result )) {
					?>
                    <tr>
                      <td style="width: 10px"><?php echo $no++;?></td>
                     
                      <td><?php echo $row['namaBarang'] ;?></td>
					   <td><?php echo $row['jumlahBarang'] ;?></td>
                      <td><?php echo "Rp " .number_format($row['harga'],'0',',','.') ;?></td>
                      <td><?php echo "Rp " .number_format($row['harga']*$row['jumlahBarang'],'0',',','.') ;?></td>
                      <td><?php echo $row['suplier'];?></td>
                    </tr>
				
					<?php $sum+=$row['harga'];?>
					<?php $sum1+=$row['jumlahBarang'];?>
					<?php $sum2+=($row['harga']*$row['jumlahBarang']);}?>
					
					<tr>
						<td colspan="2" align="right"><strong>Total</strong></td>
						<td><?php echo $sum1 ;?></td>
						<td></td>
						<td><?php echo "Rp " .number_format( $sum2,'0',',','.') ;?></td>
						
					</tr>
					
                  </table>
				
				   <?php if ($from == $tgl){ ?>
				   <form action="outcome_print.php?from=<?php echo $tgl;?>" method="POST">
				   <?php }
				   else{?>
				   <form action="outcome_print.php?from=<?php echo $from;?>" method="POST">
				   <?php }?>
				   
						<br>
						<div class="row no-print">
							  <div class="col-xs-12">
							  <input type="submit" class="btn btn-primary pull-right btn-lg fa fa-print" value="Print"/>
							  
								<!----<a href="outcome_print.php" target="_blank" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</a>-->
							  </div>
							
						</div>
					</form>
				  
                </div><!-- /.box-body -->
				
              </div><!-- /.box -->
            </div><!-- /.col -->
			
				<div class="col-md-4">
				  <!-- iCheck -->
				  <div class="box box-success">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Input Pengeluaran</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="../process/input_data_outcome.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pembelian Barang</label>
                      <input type="text" required class="form-control" name="namaBarang" id="exampleInputEmail1" placeholder="Nama Barang">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Tanggal</label>
                      <input type="date" required class="form-control" name="date1" id="exampleInputEmail1" value="<?php echo $tgl;?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jumlah</label>
                      <input type="text" required class="form-control" name="jumlah" id="exampleInputPassword1" placeholder="Jumlah">
                    </div>
					 <div class="form-group">
                      <label for="exampleInputPassword1">harga</label>
                      <input type="text" required class="form-control" name="harga" id="exampleInputPassword1" placeholder="Rp">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Supplier</label>
                      <input type="text" required class="form-control" name="suplier"id="exampleInputPassword1" placeholder="Nama Supplier">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                </form>
              </div><!-- /.box -->
				</div><!-- /.col (right) -->
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
