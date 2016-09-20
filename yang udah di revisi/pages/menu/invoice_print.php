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
   	<?php
							if(isset($_GET['user']) && !empty($_GET['date'])) {
								$user = $_GET['user'];
								$date = $_GET['date'];
								
								$qryUserId = mysqli_query($con, "SELECT * FROM pelanggan WHERE nama='$user'");
								$userId = mysqli_fetch_array($qryUserId)['idPelanggan'];
								
								$query = mysqli_query($con, "select * from pelanggan where idPelanggan = '$userId'");
								$result = mysqli_fetch_array($query);
								?>
								<div class="box-body">
									<table class="table table-condensed">
										<tr>
											<td>No. Transaksi</td>
											<td>:</td>
											<td>
											<?php
											$qryTransaksi = mysqli_query($con, "select * from Transaksi where datestamp='$date' and Pelanggan_idPelanggan = '$userId'");
												while ($arrayTransaksi = mysqli_fetch_assoc($qryTransaksi)) {
													$idTransaksi = $arrayTransaksi['idTransaksi'];
													echo $idTransaksi.", ";
												}
												?>
											</td>
										</tr>
										<tr>
											<td>Tanggal</td>
											<td>:</td>
											<td><?php echo $date ?></td>
										</tr>
										<tr>
											<td>Pelanggan / No. Telpon</td>
											<td>:</td>
											<td><?php echo $result['nama']." / ".$result['hp1']." / ".$result['hp2']." / ".$result['telpon'] ?></td>
										</tr>
									</table>
								</div>
								<div class="box-body">
								  <table class="table table-bordered">
									<tr>
									  <th style="width: 10px">#</th>
									  <th>Nama Barang / Jasa</th>
									  <th>Quantity</th>
									  <th>Harga (Rp)</th>
									  <th>Discount (Rp)</th>
									  <th>Total (Rp)</th>
									  <th>Keterangan</th>
									</tr>
									<?php
										$numb = 1;
										$sumQuan = 0;
										$sumDisc = 0;
										$sumTotal = 0;
										$qryTransaksi = mysqli_query($con, "select * from Transaksi where datestamp='$date' and Pelanggan_idPelanggan = '$userId'");
										while ($arrayTransaksi = mysqli_fetch_assoc($qryTransaksi)) {
											$idTransaksi = $arrayTransaksi['idTransaksi'];
											$qryProduk = mysqli_query($con, "Select pr.namaProduk, pr.hargaProduk, tp.jumlahProduk, tp.diskon, tp.biaya
												FROM Transaksi tr INNER JOIN TransaksiProduk tp ON tr.idTransaksi = tp.Transaksi_idTransaksi
												INNER JOIN Produk pr ON tp.Produk_idProduk = pr.idProduk
												WHERE tr.idTransaksi = '$idTransaksi' ");
												
											while ($arrayProduk = mysqli_fetch_assoc($qryProduk)) {
												 ?>
												<tr>
												  <td><?php echo $numb ?></td>
												  <td><?php echo $arrayProduk['namaProduk'] ?></td>
												  <td><?php echo $arrayProduk['jumlahProduk'] ?></td>
												  <td>
													<?php echo "Rp ".number_format($arrayProduk['hargaProduk'], 0, ",", ".") ?>
												  </td>
												  <td><?php echo "Rp ".number_format($arrayProduk['diskon'], 0, ",", ".") ?></td>
												  <td><?php echo "Rp ".number_format(($arrayProduk['biaya']-$arrayProduk['diskon']), 0, ",", ".") ?></td>
												  <td></td>
												</tr>
												<?php 
												$numb++;
												$sumQuan += $arrayProduk['jumlahProduk'];
												$sumDisc += $arrayProduk['diskon'];
												$sumTotal += ($arrayProduk['biaya']-$arrayProduk['diskon']);
											}
										}
										$qryTransaksi = mysqli_query($con, "select * from Transaksi where datestamp='$date' and Pelanggan_idPelanggan = '$userId'");
										while ($arrayTransaksi = mysqli_fetch_assoc($qryTransaksi)) {
											$idTransaksi = $arrayTransaksi['idTransaksi'];
											$qryTraining = mysqli_query($con, "SELECT DISTINCT tr.namaTraining, tt.tipe, tt.diskon, tt.biaya, tt.sertifikat
											FROM transaksi trans INNER JOIN transaksitraining tt ON trans.idTransaksi = tt.Transaksi_idTransaksi
											INNER JOIN training tr ON tt.Training_idTraining = tr.idTraining
											INNER JOIN tipetraining tipe ON tr.idTraining = tipe.Training_idTraining
											WHERE trans.idTransaksi = '$idTransaksi'
											");
												
											while ($arrayTraining = mysqli_fetch_assoc($qryTraining)) {
												 ?>
												<tr>
												  <td><?php echo $numb ?></td>
												  <td><?php echo $arrayTraining['tipe']." ".$arrayTraining['namaTraining'] ?></td>
												  <td>1</td>
												  <td><?php echo "Rp ".number_format($arrayTraining['biaya'], "0",",",".") ?></td>
												  <td><?php echo "Rp ".number_format($arrayTraining['diskon'], 0, ",", ".") ?></td>
												  <td><?php echo "Rp ".number_format(($arrayTraining['biaya']-$arrayTraining['diskon']), 0, ",", ".") ?></td>
												  <td><?php echo $arrayTraining['sertifikat'] ?></td>
												</tr>
												<?php 
												$numb++;
												$sumQuan ++;
												$sumDisc += $arrayTraining['diskon'];
												$sumTotal += ($arrayTraining['biaya']-$arrayTraining['diskon']);
											}
										}
										
									?>
										<tr>
											<td colspan="2">Grand Total</td>
											<td><?php echo number_format($sumQuan, 0, ",", ".") ?></td>
											<td style="background-color: #ccc"></td>
											<td><?php echo "Rp ".number_format($sumDisc, 0, ",", ".") ?></td>
											<td><?php echo "Rp ".number_format($sumTotal, 0, ",", ".") ?></td>
											<td style="background-color: #ccc"></td>
										</tr>
									</table>
								</div><!-- /.box-body -->
								<?php
							}
						?>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>