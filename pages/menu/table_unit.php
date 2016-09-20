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
$ehs='active';

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
    <!-- DATA TABLES -->
    <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

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
		<div class="col-md-6">
		<div class="box box-info">
		<div class="box-header">
		<div class="text-center">
		<h3 class="box-title  " >Input Produk</h3>
		</div>
		<div class="col-md-12">
		
							<?php
						$result123 = mysqli_query($con,"SELECT * FROM time WHERE id_time='1'") 
						or die(mysqli_error());  
						// output data of each row	
						($row123 = mysqli_fetch_assoc( $result123 )) 
						?>
							<p class="text-danger" style=" margin-top: 10px;">Terahkir di edit pada : <?php echo $row123['ts'];?></p>
							
							</div>
							
		 <form class="form-inline" role="form" method="post" action="../process/add_produk_process.php">
					<div class="col-md-4">
					<div class="form-group">
					<input type="text" autocomplete="off" required name="nama" class="form-control" placeholder="Nama" />
					</div>
					</div>
					<div class="col-md-4">
					<div class="form-group">
				
					<input type="number" min="0" required name="harga" class="form-control"  placeholder="Harga">
					</div>
					</div>
					<div class="col-md-4">
					
					<button type="submit" value="submit" class="btn btn-info">Input</button>
					</div>
					</form>
		</div>
		</div>
		
		
		</div>	
		
		<div class="col-md-6">
		<div class="box box-info">
		<div class="box-header">
		<div class="text-center">
		<h3 class="box-title  " >input Training</h3>
		</div>
		<div class="col-md-12">
							<?php
						$result1234 = mysqli_query($con,"SELECT * FROM time WHERE id_time='2'") 
						or die(mysqli_error());  
						// output data of each row	
						($row1234 = mysqli_fetch_assoc( $result1234 )) 
						?>
							<p class="text-danger" style=" margin-top: 10px;">Terahkir di edit pada : <?php echo $row1234['ts'];?></p>
							
							
							</div>
					<form class="form-inline" role="form" method="post" action="../process/add_training_process.php">
					 <div class="col-sm-3">
				<div class="form-group">
					
					<input type="text" list="trainingan" autocomplete="off" required name="namaTraining" class="form-control"  placeholder="Jenis" />
					<datalist id="trainingan">
						<?php
							$query = mysqli_query($con, "SELECT * FROM training");
							while($result = mysqli_fetch_array($query)) {
								?>
								<option value="<?php echo $result['namaTraining']?>">
								<?php
							}
						?>
					</datalist>
					</div>
					</div>
					
					<div class="col-sm-3">
					<div class="form-group">
				
					<select name="tipe" required class="form-control">
					<option selected disabled value="">-tipe-</option>
					<option value="Kelas">Kelas</option>
					<option value="Private">Private</option>
					<option value="Khusus">Khusus</option>
					
					</select>
					</div>
					</div>
					<div class="col-sm-3">
					<div class="form-group">
					
					<input type="number" min = "0" required name="harga" class="form-control" placeholder="Harga">
					</div>
					</div>
					<div class="col-sm-2">
					
					<button type="submit"  value="submit" class="btn btn-info">Input</button>
					</div>
					</form>
		
		
		
		</div>
		</div>
		</div>
		
		
		</div>
          <div class="row">
			<div class="col-md-6">
			
			<!----------------KONTEN TABEL--------------------------------->
			
			    <div class="box box-warning">
				   
                <div class="box-header ">
				
				<div class="text-center">
               
				</div>
			
				<!------------------------------------------------THE BEGINNING OF THE DATE------------------------->
				<br>  
                </div><!-- /.box-header -->
						<div style="font-size:12px">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-stripped">
                    <thead>
                      <tr >
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Action</th>
                      </tr>
					</thead>
					<tbody>
		<?php
$no=1;
$result = mysqli_query($con,"SELECT * FROM produk") 
or die(mysqli_error());  


// output data of each row
while($row = mysqli_fetch_assoc( $result )) {
  
?>
	
				   <tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $row['namaProduk'] ?></td>
						<td><?php echo "Rp " . number_format($row['hargaProduk'],'0',',','.'); ?></td>
						<td><a type="button" href="../process/delete_produk_process.php?idProduk=<?php echo $row['idProduk'] ?>" class="btn btn-danger btn-sm">Hapus</a> </td>

					</tr>
					<?php }
				
  
?>


				
					</tbody>
                  </table> 
				  </div>
				  </div>
              </div><!-- /.box -->
			<!---------------THE END OF TABEL KONTEN----------------------->
				</div><!-- /.col-md-6 -->
					<div class="col-md-6">
			<!----------------KONTEN TABEL--------------------------------->
			
			    <div class="box box-warning">
				   
                <div class="box-header ">
				
				<div class="text-center">
               
				</div>
			
				<!------------------------------------------------THE BEGINNING OF THE DATE------------------------->
				<br>  
                </div><!-- /.box-header -->
						<div style="font-size:12px">
                <div class="box-body">
                  <table id="example11" class="table table-bordered table-stripped">
                    <thead>
                      <tr >
                           <th>No</th>
                        <th>Produk</th>
                        <th>Biaya</th>
                        <th>Action</th>
                      </tr>
					</thead>
					<tbody>
				<?php
$no=1;
$hasil = mysqli_query($con,"SELECT `idTraining`,`namaTraining`,`harga`,`tipe` FROM `training` JOIN `tipetraining` ON `idTraining` = `Training_idTraining` order by tipe ASC") 
or die(mysqli_error());  


// output data of each row
while($baris = mysqli_fetch_assoc( $hasil )) {
  
?>
	
					 <tr>
<td><?php echo $no++; ?></td>
<td><?php echo $baris['tipe'] ?> <?php echo $baris['namaTraining'] ?></td>
<td><?php echo "Rp " . number_format($baris['harga'],'0',',','.'); ?></td>
<td><a type="button" href="../process/delete_training_process.php?idTraining=<?php echo $baris['idTraining'] ?>&&tipe=<?php echo $baris['tipe'] ?>" class="btn btn-danger btn-sm">Hapus</a> </td>

</tr>
					<?php }
					
  
?>

					</tbody>
                  </table> 
				  </div>
				  </div>
              </div><!-- /.box -->
			<!---------------THE END OF TABEL KONTEN----------------------->
				</div><!-- /.col-md-6 -->
				</div>
			 <!-- Modal -->
          <div id="deleteProduk" tabindex="-1" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Hapus Produk</h4>
              </div>
              <div class="modal-body">
              <p>Apakah anda yakin untuk menghapus ?</p>
              </div>
              <div class="modal-footer">
              <form action="../process/delete_produk_process.php" method="post">
                <input type="text" name="idProduk" hidden="hidden"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
              </div>
            </div>
            </div>
          </div><!-- Modal -->  
          <div id="deleteTraining" tabindex="-1" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Hapus Training</h4>
              </div>
              <div class="modal-body">
              <p>Apakah anda yakin untuk menghapus "<strong></strong>"?</p>
              </div>
              <div class="modal-footer">
              <form action="../process/delete_training_process.php" method="post">
                <input type="text" name="idTraining" hidden="hidden"/>
                <label><input type="text" name="tipe" hidden="hidden"/></label>
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
              </div>
            </div>
            </div>
          </div><!-- Modal -->  

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
	    <!-- jQuery 2.1.3 -->
    <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
		$("#example11").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
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
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
  </body>
</html>
