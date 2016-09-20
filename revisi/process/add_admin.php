<?php
	include '../../koneksi.php';

	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	$id = $_SESSION['id'];
	$query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$id'");
	$result = mysqli_fetch_array($query);
	if($result['level'] != 1) {
		header("location:../../index.php");
	}
	$user = $_POST['adduser'];
	$pass = $_POST['addpass'];
	$priv = $_POST['privilage'];
	
	$query = mysqli_query($con, "INSERT INTO `admin`(`username`, `password`, `level`) VALUES ('$user','$pass','$priv')");
	if($query == true) {
		header("location:../menu/administrator.php?msg=y");
	} else {
		header("location:../menu/administrator.php?msg=n");
	}
?>