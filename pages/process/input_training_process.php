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
	
	$idTraining = $_GET ['idTraining'];
	$qry = mysqli_query($con,"SELECT tipetraining.tipe, training.namaTraining, tipetraining.harga FROM tipetraining JOIN training ON tipetraining.Training_idTraining = training.idTraining WHERE training.idTraining = '$idTraining'");
	$produk = mysqli_fetch_assoc($qry);
	
	
	
	
	
	
	$nama = $_POST ['namaTraining'];
	$tipe = $_POST ['tipe'];
	$harga = $_POST ['harga'];
	
	mysqli_query($con,"INSERT INTO training VALUES ('','$nama')");
	$idTraining=mysqli_insert_id($con);
	mysqli_query($con,"INSERT INTO tipetraining VALUES('$tipe','$harga','$idTraining')");
	header("location:../menu/table_unit.php");
?>