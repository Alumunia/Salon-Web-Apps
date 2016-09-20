<?php
	include '../../koneksi.php';

	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	$id = $_SESSION['id'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	if(!empty($user)) {
		$qr1 = mysqli_query($con, "UPDATE `admin` SET `username`='$user' WHERE username = '$id'");
		$_SESSION['id'] = $user;
	}
	if(!empty($pass)) {
		$qr2 = mysqli_query($con, "UPDATE `admin` SET `password`='$pass' WHERE username = '$id'");
	}
	if($qr1 == true || $qr2 == true) {
		header("location:../menu/administrator.php?msg=u");
	} else {
		header("location:../menu/administrator.php?msg=x");
	}
?>
