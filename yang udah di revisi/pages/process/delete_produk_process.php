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
	$tgl = gmdate("Y-m-d");
	$pict = rand(1, 5);
	
	$idProduk = $_GET ['idProduk'];
	$hargaProduk = $_POST ['harga'];
	
	mysqli_query($con,"DELETE FROM produk WHERE idProduk='$idProduk'");
	mysqli_query($con,"INSERT INTO time VALUES ('1','CURRENT_TIMESTAMP')");
	mysqli_query($con,"UPDATE time SET ts=CURRENT_TIMESTAMP WHERE id_time='1'");
	header("location:../menu/table_unit.php");
?>