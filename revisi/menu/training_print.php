<!DOCTYPE html>
<?php
	include '../../koneksi.php';
	session_start();
	$from = $_SESSION['from'];
	$to = $_SESSION['to'];
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Print Lap | Vstalin Githa</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
	
        <!-- Main content -->
        <section class="invoice">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
			  
                <div class="box-header">
				  <h3>Print Laporan Bulanan Peserta</h3>
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
                      <th style="width: 10px">#</th>
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
						$query = mysqli_query($con, "SELECT trtr.tglMulai, trtr.tglSelesai, trtr.sertifikat, pe.nama, pe.golUsia, titr.tipe, trg.namaTraining, pe.hp1, pe.hp2, pe.telpon, pe.pinBB, pe.kota, pe.provinsi FROM pelanggan pe INNER JOIN transaksi trk ON pe.idPelanggan = trk.Pelanggan_idPelanggan INNER JOIN transaksitraining trtr ON trk.idTransaksi = trtr.Transaksi_idTransaksi INNER JOIN training trg ON trtr.Training_idTraining = trg.idTraining INNER JOIN tipetraining titr ON trg.idTraining = titr.Training_idTraining WHERE trk.datestamp BETWEEN '$from' AND '$to' ORDER BY trk.datestamp ");
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
					<h4>Note : Kredit nilai net dari nilai standard minus diskon (A)</h4>
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
	  
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>