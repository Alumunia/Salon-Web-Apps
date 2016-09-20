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
	
	$idTraining = $_POST['idTraining'];
	$tipe = $_POST['tipe'];
	
	mysqli_query($con,"DELETE FROM tipeTraining WHERE Training_idTraining='$idTraining' AND tipe='$tipe'");
	
	$query1 = mysqli_query($con, "SELECT trg.* FROM training trg LEFT JOIN tipetraining titr ON trg.idTraining = titr.Training_idTraining WHERE titr.Training_idTraining IS NULL");
	if($query1) {
		mysqli_query($con, "DELETE FROM training WHERE idTraining = '$idTraining'");
	}
	mysqli_query($con,"INSERT INTO time VALUES ('2','CURRENT_TIMESTAMP')");
	mysqli_query($con,"UPDATE time SET ts=CURRENT_TIMESTAMP WHERE id_time='2'");
	
	header("location:../menu/table_unit.php");
?>

