<?php
	include '../../koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	
	$date = $_POST['date'];
	$time = $_POST['time'];
	
	$name = $_POST['name'];
	$age = $_POST['age'];
	
	$street = $_POST['street'];
	$city = $_POST['city'];
	$prov = $_POST['prov'];
	
	$cell1 = $_POST['cell1'];
	$cell2 = $_POST['cell2'];
	$phone = $_POST['phone'];
	
	$email = $_POST['email'];
	$bbm = $_POST['bbm'];
	$fb = $_POST['fb'];
	
	$class = $_POST['class'];
	$type = $_POST['type'];
	$start = $_POST['startdate'];
	$end = $_POST['enddate'];
	$discount = $_POST['discount'];
	$lokasi = $_POST['lokasi'];
	$sertifikat = $_POST['sertifikat'];
	
	$qr1 = mysqli_query($con, "SELECT * FROM pelanggan WHERE nama = '$name' AND hp1 = '$cell1'");
	$qr2 = mysqli_fetch_array($qr1);
	if(!$qr2) {
		mysqli_query($con, "INSERT INTO `pelanggan` VALUES ('','$name','$age', '$street', '$prov','$city','$cell1','$cell2','$phone','$bbm','$email','$fb')");
		$ktp = mysqli_insert_id($con);
	} else {
		$ktp = $qr2['idPelanggan'];
	}

	mysqli_query($con, "INSERT INTO `transaksi` VALUES ('','$ktp',NULL,'$date','$time',NULL,NULL,NULL)");
	$transid = mysqli_insert_id($con);
	
	foreach($class as $oneKey => $oneClass) {
		foreach($type as $twoKey => $oneType) {
			list($st1, $st2) = explode("-", $oneClass, 2);
		}

		foreach($start as $threeKey => $oneStart) {
			list($st1, $st2) = explode("-", $oneClass, 2);
		}
	
		foreach($end as $fourKey => $oneEnd) {
			list($st1, $st2) = explode("-", $oneClass, 2);		
	
		}

		foreach($discount as $fiveKey => $oneDiscount) {
			list($st1, $st2) = explode("-", $oneClass, 2);
		}
	
		foreach($lokasi as $sixKey => $oneLokasi) {
			list($st1, $st2) = explode("-", $oneClass, 2);
		}

		foreach($sertifikat as $sevenKey => $oneSertifikat) {
			list($st1, $st2) = explode("-", $oneClass, 2);			
		}
		
		mysqli_query($con, "INSERT INTO `transaksitraining` VALUES
			('$st1','$transid','$type[$st2]','$start[$st2]','$end[$st2]','$discount[$st2]','','$lokasi[$st2]','$sertifikat[$st2]')");
		
		$qryHarga = mysqli_query($con, "SELECT harga FROM tipetraining where Training_idTraining='$st1' AND tipe = '$type[$st2]'");
		$hargaTraining = mysqli_fetch_assoc($qryHarga)['harga'];
		
		mysqli_query($con, "UPDATE transaksitraining SET biaya='$hargaTraining' WHERE Transaksi_idTransaksi='$transid' AND Training_idTraining='$st1'");
	}
	
	$qry = mysqli_query($con, "SELECT SUM(diskon) AS discounttot, SUM(biaya) AS costtot FROM transaksitraining WHERE Transaksi_idTransaksi = '$transid'");
	$sks = mysqli_fetch_assoc($qry);
	
	$diskontot = $sks['discounttot'];
	$costtot = $sks['costtot'];
	
	mysqli_query($con, "UPDATE `transaksi` SET `diskonTotal` = '$diskontot', `biayaTotal`='$costtot'");
	
	header("location:../../index.php");
?>