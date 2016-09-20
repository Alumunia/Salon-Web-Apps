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
	$day = gmdate("l");
	$date = gmdate("j F Y");
	$tgl = date("Y-m-d");
	$pict = rand(1, 5);
	
	$nama = $_POST ['namaBarang'];
	$date1 = $_POST ['date1'];
	$jumlah = $_POST ['jumlah'];
	$suplier = $_POST ['suplier'];
	$jumlah = $_POST ['jumlah'];
	$harga = $_POST ['harga'];

	mysqli_query($con,"INSERT INTO pengeluaran VALUES ('$date1','$jumlah','')");
	mysqli_query($con,"INSERT INTO barang VALUES ('','$nama','$harga','$jumlah','','$suplier','$date1')");

	
	header("location:../menu/table_outcome.php");
	
?>