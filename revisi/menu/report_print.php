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
	$from= $_GET['from'];
	$to = $_GET['to'];
	
	
	
	
	
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
				 <div class="box-body">
				<div class="box-header">
				  <h3 class="text-center">Print Laporan Keuangan</h3>
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
				</div>
              
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Transaksi</th>
                        <th style="WIDTH: 3%;">Kredit (B)</th>
                        <th style="WIDTH: 3%;">Debit (C)</th>
                        <th>Keterangan</th>
                      </tr>
					</thead>
					<tbody>
					  <?php
						$number = 1;
						$kredit = 0;
						$debit = 0;
						$query = mysqli_query($con, "SELECT * FROM (SELECT datestamp FROM transaksi UNION SELECT Pengeluaran_tglPengeluaran as datestamp FROM barang ORDER BY datestamp ASC) InnerQuery WHERE datestamp BETWEEN '$from' AND '$to'");
						while ($result = mysqli_fetch_assoc($query)) {
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
									<td></td>
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
									<td></td>
									<td></td>
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
									<td></td>
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
						<td colspan="3" align="right"><strong>Saldo</strong></td>
						<td><strong><?php echo $kredit ?></strong></td>
						<td><strong><?php echo $debit ?></strong></td>
						<td style="background-color: #eee"></td>
					  </tr>
					</tbody>
                  </table>
                </div><!-- /.box-body -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
	  
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>