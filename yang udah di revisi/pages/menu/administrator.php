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
	$pass = $result['password'];
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
	$admin='active'
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administrator | Vstalin Githa</title>
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
			<div class="col-md-12">
				<?php
						if(isset($_GET['msg'])) {
							if($_GET['msg'] == "y") {
								?>
								  <div class="box box-success box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title">Message</h3>
									  <div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
									  </div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
									  Administrator baru telah ditambahkan
									</div><!-- /.box-body -->
								  </div><!-- /.box -->
								<?php
							} else if($_GET['msg'] == "n") {
								?>
								  <div class="box box-danger box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title">Message</h3>
									  <div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
									  </div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
									  Gagal menambahkan Administrator baru
									</div><!-- /.box-body -->
								  </div><!-- /.box -->
								<?php
							} else if($_GET['msg'] == "u") {
								?>
								  <div class="box box-success box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title">Message</h3>
									  <div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
									  </div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
									  Profil telah di-<i>update</i>
									</div><!-- /.box-body -->
								  </div><!-- /.box -->
								<?php
							} else if($_GET['msg'] == "x") {
								?>
								  <div class="box box-danger box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title">Message</h3>
									  <div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
									  </div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
									  Gagal update profil
									</div><!-- /.box-body -->
								  </div><!-- /.box -->
								<?php
							} else if($_GET['msg'] == "dy") {
								?>
								  <div class="box box-success box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title">Message</h3>
									  <div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
									  </div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
									  Administrator baru berhasil dihapus
									</div><!-- /.box-body -->
								  </div><!-- /.box -->
								<?php
							} else if($_GET['msg'] == "dn") {
								?>
								  <div class="box box-danger box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title">Message</h3>
									  <div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
									  </div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
									  Gagal menghapus Administrator
									</div><!-- /.box-body -->
								  </div><!-- /.box -->
								<?php
							}
						}
				?>
			</div>
		  </div>
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Edit Username / Password</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="../process/update_profile.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
					  <div class="input-group">
						<span class="input-group-addon">@</span>
						<input type="text" class="form-control" name="username" placeholder="<?php echo $id ?>">
					  </div>
                    </div>
                    <div class="form-group">
					  <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input type="password" class="form-control" name="password" value="<?php echo $pass ?>" placeholder="Password">
					  </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                  </div>
                </form>
              </div><!-- /.box -->
          </div>   <!-- /.row -->
          <div class="col-md-6">
			<?php
				if($result['level'] == 1) {
					?>
					  <div class="box box-danger">
						<div class="box-header">
						  <h3 class="box-title">Tambah Administrator</h3>
						</div>
						<form role="form" action="../process/add_admin.php" method="post" >
							<div class="box-body">
								<div class="form-group">
								  <div class="input-group">
									<span class="input-group-addon">@</span>
									<input type="text" class="form-control" name="adduser" placeholder="Username">
								  </div>
								</div>
								<div class="form-group">
								  <div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" class="form-control" name="addpass" placeholder="Password">
								  </div>
								</div>
								<div class="form-group">
								  <label></label>
								  <select name="privilage" class="form-control">
									<option value="NULL" selected>Administrator</option>
									<option value="1">Super Admin</option>
								  </select>
								</div>
							</div><!-- /.box-body -->
						  <div class="box-footer">
							<button type="submit" class="btn btn-primary">Tambah</button>
						  </div>
						</form>
					  </div><!-- /.box -->
					<?php
				}
			?>
			  </div>
		  </div><!-- /.row -->
		  <div class="row">
			  <div class="col-md-12">
				<div class="box box-success">
				  <div class="box-header">
					<h3 class="box-title">Daftar Administrator</h3>
				  </div><!-- /.box-header -->
				  <div class="box-body">
					<table class="table table-bordered">
					  <tr>
						<th>#</th>
						<th>Username</th>
						<th colspan="3">Hak Akses</th>
					  </tr>
					  <?php
						$num = 1;
						$query = mysqli_query($con, "SELECT * FROM admin WHERE username != '$id'");
						while($hasil = mysqli_fetch_array($query)) {
							?>
							  <tr>
								<td><?php echo $num ?></td>
								<td><?php echo $hasil['username'] ?></td>
								<td>
								  <?php
									if($hasil['level'] == 1) {
										echo "Super Admin";
									} else {
										echo "Administrator";
									}
								  ?>
								</td>
								<td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-whatever="<?php echo $hasil['username'] ?>">Edit</button></td>
								<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-whatever="<?php echo $hasil['username'] ?>">Hapus</button></td>
							  </tr>
							<?php
							$num++;
						}
						
					  ?>
					</table>
					<!-- Modal -->
					<div id="editModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Data Admin</h4>
						  </div>
						  <form action="../process/update_profile_orang.php" method="post">
						  <div class="modal-body">
							<div class="form-group">
							  <div class="input-group">
								<span class="input-group-addon">@</span>
								<input type="text" class="form-control" name="update_user" placeholder="New Username" required />
							  </div>
							</div>
							<div class="form-group">
							  <div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" name="update_pass" placeholder="New Password" required />
							  </div>
							</div>
							<div class="form-group">
							  <label>Hak Akses</label>
							  <select name="update_priv" class="form-control">
								<option value="NULL" selected>Administrator</option>
								<option value="1">Super Admin</option>
							  </select>
							</div>
						  </div>
						  <div class="modal-footer">
							<input type="text" name="update_real" hidden="hidden"/>
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Edit</button>
						  </div>
						  </form>
						</div>
					  </div>
					</div><!-- Modal -->
					
					<!-- Modal -->
					<div id="deleteModal" tabindex="-1" class="modal fade" role="dialog">
					  <div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Hapus Admin</h4>
						  </div>
						  <div class="modal-body">
							<p>Apakah anda yakin untuk menghapus "<strong></strong>"?</p>
						  </div>
						  <div class="modal-footer">
							<form action="../process/delete_admin.php" method="post">
							  <input type="text" name="user" hidden="hidden"/>
							  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							  <button type="submit" class="btn btn-danger">Hapus</button>
							</form>
						  </div>
						</div>
					  </div>
					</div><!-- Modal -->	
					
				  </div><!-- Box-body -->
				</div><!-- Box-body Success -->
			  </div><!-- Col-md-12 -->
			  </div><!-- Row -->
        </section><!-- /.content -->
		</div><!-- Content wrapper -->
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
	<script>
	$('#deleteModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget)
	  var recipient = button.data('whatever')
	  var modal = $(this)
	  modal.find('.modal-body p strong').text(recipient)
	  modal.find('.modal-footer form input').val(recipient)
	})    
	</script>
	<script>
	$('#editModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget)
	  var recipient = button.data('whatever')
	  var modal = $(this)
	  modal.find('.modal-title').text('Edit @' + recipient)
	  modal.find('.modal-footer input').val(recipient)
	})    
	</script>
  </body>
</html>
