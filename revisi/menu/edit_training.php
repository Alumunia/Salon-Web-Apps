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
	} else {
		$level = "Administrator";
	}
	$day = date("l");
	$date = date("j F Y");
	$tgl = date("Y-m-d");
	$pict = rand(1, 5);
	
	$idTraining = $_GET ['idTraining'];
	$tipe = $_GET ['tipe'];
	$qry = mysqli_query($con,"SELECT tr.namaTraining, tipe.tipe, tipe.harga
		FROM tipeTraining tipe INNER JOIN Training tr ON tipe.Training_idTraining = tr.idTraining
		WHERE tr.idTraining = '$idTraining' AND tipe.tipe = '$tipe'");
	
	while($training = mysqli_fetch_assoc($qry)) {
	
	$nama = $training['namaTraining'];
	$tipe = $training['tipe'];
	$harga = $training['harga'];
	}
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Input Training | Vstalin Githa</title>
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
        
		
		  <div class="col-md-6">
			    <div class="box">
				   
                <div class="box-header ">
				<div class="text-center">
                <h3 class="box-title  " >Edit tabel Training</h3>
				</div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
				  <!------------------FORM INPUT---------------------->
				  <div class="row">
				
				  <form method="post" action="../process/edit_training_process.php?idTraining=<?php echo $idTraining ?>&tipe=<?php echo $tipe ?>">
				 	 <div class="col-md-4">
					<div class="form-group">
					<input type="text" disabled name="nama" value="<?php echo $nama;?>" placeholder="Nama Training" autocomplete="off" class="form-control" /> 
					
					</div>
					</div>
					
					<div class="col-md-4">
					<div class="form-group">
					  <input disabled name="tipe" value="<?php echo $tipe?>"class="form-control /">
					</div>
					</div>
					<div class="col-md-4">
					<div class="form-group">
					
					 <input type="number" name="harga" value="<?php echo $harga; ?>" placeholder="Harga Produk" autocomplete="off" class="form-control" />
					</div>
					</div>
					<div class="col-sm-2">
					<button type="submit"  value="submit" class="btn btn-info">Edit</button>
					</div>
					</form>
					</div>
					
					
				  </div>
				  </div>
				  
				  <!------------------THE END OF INPUT------------------>
                   
	
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		 
				
        </section>

        <!-- Main content -->
        
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
