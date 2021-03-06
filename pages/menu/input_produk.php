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
	$tgl = date("Y-m-d");
	$pict = rand(1, 5);
	$ipro='active';
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Input Produk | Vstalin Githa</title>
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
	<script>
	function showTraining(str) {
		if (str == "") {
			document.getElementById("cekTraining").innerHTML = "";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("cekTraining").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","../process/pernah_training.php?q="+str,true);
			xmlhttp.send();
		}
	}
	</script>
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
            Input Produk
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
			<form action="../process/input_produk_process.php" method="post">
				<div class="col-md-6">
				  <div class="box box-danger">
					<div class="box-body">
					  <!-- Date dd/mm/yyyy -->
					  <div class="form-group">
						<label>Hari/Tanggal:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <input type="text" class="form-control" value="<?php echo $day." / ".$date ?>" disabled />
						  <input type="text" value="<?php echo $tgl ?>" name="date" hidden="hidden" />
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- phone mask -->
					  <div class="form-group">
						<label>Nama Lengkap:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-user"></i>
						  </div>
						  <input list="nama" type="text" class="form-control" name="name" required autocomplete="off"/>
							<datalist id="nama">
								<?php
									$listNama = mysqli_query($con, "SELECT * FROM pelanggan");
									while ($dataNama = mysqli_fetch_assoc($listNama)) { 
								?>
								<option value="<?php echo $dataNama['nama']?>">
									<?php } ?>
							</datalist>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->
					  <div class="form-group">
						<label>Alamat:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-envelope"></i>
						  </div>
						  <input type="text" class="form-control" name="jalan" placeholder="Jalan" />
						  <input type="text" class="form-control" maxlength="12" name="provinsi" placeholder="Provinsi"/>
						  <input type="text" class="form-control" maxlength="12" name="kota" placeholder="Kota"/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					</div><!-- /.box-body -->
				  </div><!-- /.box -->

				  <div class="box box-info">
					<div class="box-body">
					  <!-- IP mask -->
					  <div class="form-group">
						<label>Handphone:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-phone"></i>
						  </div>
						  <input onkeyup="showTraining(this.value)" type="text" class="form-control" maxlength="12" name="cell1" placeholder="Handphone 1"/>
						  <input type="text" class="form-control" maxlength="12" name="cell2" placeholder="Handphone 2"/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- Color Picker -->
					  <div class="form-group">
						<label>Telpon Rumah / Kantor:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-phone"></i>
						  </div>
						  <input type="text" class="form-control" maxlength="12" name="phone" />
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- Color Picker -->
					  <div class="form-group">
						<label>Email:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa ">@</i>
						  </div>
						  <input type="email" class="form-control" name="email"/>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- Color Picker -->
					  <div class="form-group">
						<label>Pin BBM:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa">bbm</i>
						  </div>
						  <input type="text" class="form-control" maxlength="8" name="bbm" />
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					  <!-- Color Picker -->
					  <div class="form-group">
						<label>Facebook:</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-facebook"></i>
						  </div>
						  <input type="text" class="form-control" name="fb" />
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					</div><!-- /.box-body -->
					<div class="box box-danger">
						<div class="box-header">
							<h3>Info Training yang Pernah Diikuti:</h3>
						</div>
						<div class="box-body">
							<ol id="cekTraining">
							</ol>
						</div>
					</div>
				  </div><!-- /.box -->

				</div><!-- /.col (left) -->
				<div class="col-md-6">
				  <!-- iCheck -->
				  <div class="box box-success">
					<div class="box-header">
					  <h3 class="box-title">Pesanan Produk</h3>
					</div>
				
				  <div class="box-body">
					  <!-- Minimal style -->
					  <!-- checkbox -->
				  <?php
					$no = 0;
					$query = mysqli_query($con, "SELECT * FROM produk ORDER BY namaProduk ASC");
					while($result = mysqli_fetch_assoc($query)) {
						?>
					  <div class="form-group">
						<label class="col-md-6">
						  <input type="checkbox" id="cek" name="produk[]" value="<?php echo $result['idProduk']; ?>-<?php echo $no++; ?>" class="minimal" ></input>
						  <?php echo $result['namaProduk']; ?>
						</label>
						<label style="padding-left:20px">
						  <input style="width:70px" type="number" name="jumlah[]" min="1" placeholder="Jumlah" />
						</label>
						<label style="padding-left:20px">
						  Diskon <input style="width:70px" type="number" name="diskon[]" min="0" placeholder="Rp" />
						</label>
					  </div>
					<?php  } ?>
				  </div><!-- /.box -->

				
				  
				</div><!-- /.col (right) -->
				
					  <div class="box box-default">
					<div class="box-body">
					  <!-- IP mask -->
					
					  <!-- Color Picker -->
					  <div class="form-group">
						<label>Keterangan</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa  fa-comment-o"></i>
						  </div>
						  <input type="text" class="form-control" name="keterangan" />
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

					</div><!-- /.box-body -->
					  <div  class="box-footer">
					  <button type="submit" class="btn btn-primary">Tambah</button>
				  </div>
				  </div><!-- /.box -->
				
				
			</form>
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
