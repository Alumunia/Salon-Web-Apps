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
	$day = gmdate("l");
	$date = gmdate("j F Y");
	$time = gmdate("H:m:s");
	$tgl = gmdate("Y-m-d");
	$pict = rand(1, 5);
	
	
$perda='active';
$idPelanggan=$_GET['idPelanggan'];

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
			
			    <div class="box box-warning">
				   
                <div class="box-header ">
				
				<div class="text-center">
                <h3 class="box-title  " >Personal Data </h3>
				</div>
				<!------------------------------------------------THE BEGINNING OF THE DATE------------------------->
				<br>  
                </div><!-- /.box-header -->
                <div class="box-body">
				<!----------------THE BEGINNNING FORM---------------->
					<form action="../process/save_pelanggan_process.php?idPelanggan=<?php echo $idPelanggan ?>" method="post">
					<div class="box-body">
					  <!-- Date dd/mm/yyyy -->
				<?php
$no=1;
$result = mysqli_query($con,"SELECT * FROM pelanggan WHERE idPelanggan='$idPelanggan'") 
or die(mysqli_error());  
$no=1;

// output data of each row
while($row = mysqli_fetch_assoc($result)) {
?>

					  <!-- phone mask -->
					  <div class="form-group">
						<label>Nama Lengkap:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-user"></i>
						  </div>
						  <input type="text"  name="nama" value="<?php echo $row['nama'] ?>" placeholder="Nama " autocomplete="off" class="form-control"/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->
					  
					  <!-- phone mask -->
					  <div class="form-group">
						<label>Golongan Usia:</label>
					  </div><!-- /.form group -->
					  
					  <!-- radio -->
					  <div class="form-group">
						<label>
						  <input type="radio" name="age" class="minimal" value="10-20" <?php if ($row['golUsia']=="10-20"){print "checked";}else{;}?>/>
						  10-20 tahun
						</label>
						<label>
						  <input type="radio" name="age" class="minimal" value="21-30" <?php if ($row['golUsia']=="21-30"){print "checked";}else{;}?>/>
						  21-30 tahun
						</label>
						<label>
						  <input type="radio" name="age" class="minimal" value="31-40"  <?php if ($row['golUsia']=="31-40"){print "checked";}else{;}?>/>
						  31-40 tahun
						</label>
						<label>
						  <input type="radio" name="age" class="minimal" value="41-50"  <?php if ($row['golUsia']=="41-50"){print "checked";}else{;}?>/>
						  41-50 tahun
						</label>
						<label>
						  <input type="radio" name="age" class="minimal" value="51"  <?php if ($row['golUsia']=="51"){print "checked";}else{;}?>/>
						  51 tahun
						</label>
					  </div>
					  
					  <div class="form-group">
						<label>Alamat:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-envelope"></i>
						  </div>
						  <input type="text"    name="alamat" value="<?php echo $row['alamat'] ?>" placeholder="alamat" autocomplete="off" class="form-control"/>
						  <input type="text"    name="kota" value="<?php echo $row['kota'] ?>" placeholder="kota" autocomplete="off" class="form-control"/>
						  <input type="text"    name="provinsi" value="<?php echo $row['provinsi'] ?>" placeholder="provinsi" autocomplete="off" class="form-control"/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					</div><!-- /.box-body -->
				

				  <div class="box box-info">
					<div class="box-body">
					  <!-- IP mask -->
					  <div class="form-group">
						<label>Handphone:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-phone"></i>
						  </div>
						  <input type="text"    name="hp1" value="<?php echo $row['hp1'] ?>" placeholder="Hp1" autocomplete="off" class="form-control"/>
						 <input type="text"    name="hp2" value="<?php echo $row['hp2'] ?>" placeholder="Hp2" autocomplete="off" class="form-control"/>
						 </div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- Color Picker -->
					  <div class="form-group">
						<label>Telpon Rumah / Kantor:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-phone"></i>
						  </div>
						 <input type="text"    name="telpon" value="<?php echo $row['telpon'] ?>" placeholder="Nomor Telepon" autocomplete="off" class="form-control"/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- Color Picker -->
					  <div class="form-group">
						<label>Email:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa ">@</i>
						  </div>
						  <input type="text"    name="email" value="<?php echo $row['email'] ?>" placeholder="Email" autocomplete="off" class="form-control"/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- Color Picker -->
					  <div class="form-group">
						<label>Pin BBM:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa">bbm</i>
						  </div>
						  <input type="text"    name="pinBB" value="<?php echo $row['pinBB'] ?>" placeholder="Pin BBM" autocomplete="off" class="form-control"/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- Color Picker -->
					  <div class="form-group">
						<label>Facebook:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-facebook"></i>
						  </div>
						 <input type="text"    name="fb" value="<?php echo $row['fb'] ?>" placeholder="Facebook" autocomplete="off" class="form-control"/>
						</div><!-- /.input group -->
						
					  </div><!-- /.form group -->
					  
						<?php } ;?>
						<input type="submit" class="btn btn-primary btn-lg pull-right fa fa-print" value="Submit"/>
				  	
					</div><!-- /.box-body -->
					
				</div><!-- /.box -->
			</form>
				  
				  
				  
				  <!---------------------THE END FORM-------------->
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
