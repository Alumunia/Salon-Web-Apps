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
	
	$user = $_POST['user'];
	$query = mysqli_query($con, "DELETE FROM admin WHERE username = '$user'");
	if($query == true) {
		header("location:../menu/administrator.php?msg=dy");
	} else {
		header("location:../menu/administrator.php?msg=dn");
	}
?>