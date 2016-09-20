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
	
	$nama = $_POST ['namaTraining'];
	$tipe = $_POST ['tipe'];
	$harga = $_POST ['harga'];
	
	//cek nama training
	$qryTraining = mysqli_query($con, "select * from training where namaTraining = '$nama'");
	if ($cekTraining = mysqli_fetch_array($qryTraining)) {
	
		//get idTraining dari Nama Training
		$getId = mysqli_query($con, "select idTraining from training where namaTraining = '$nama'");
		$idTraining = mysqli_fetch_array($getId)['idTraining'];
		
		//cek tipe Training dari nama
		$qryTipe = mysqli_query($con, "select * from tipetraining where Training_idTraining = '$idTraining' and tipe = '$tipe'");
		$cekTipe = mysqli_fetch_array($qryTipe);
		if ($cekTipe) {
			echo "Data sudah ada.";
			?> <script language="javascript">alert("Data sudah ada");</script><?php
			header("location:../menu/table_unit.php");
		} else {
			mysqli_query($con,"INSERT INTO tipetraining VALUES ('$tipe','$harga','$idTraining')");
			header("location:../menu/table_unit.php");
		}
	
	} else {
	
		mysqli_query($con,"INSERT INTO training VALUES ('','$nama')");
		$idTraining=mysqli_insert_id($con);
		mysqli_query($con,"INSERT INTO tipetraining VALUES('$tipe','$harga','$idTraining')");
		mysqli_query($con,"INSERT INTO time VALUES ('2','CURRENT_TIMESTAMP')");
		mysqli_query($con,"UPDATE time SET ts=CURRENT_TIMESTAMP WHERE id_time='2'");
		header("location:../menu/table_unit.php");
	
	}
?>