<?php
	include '../../koneksi.php';

	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	$id = $_SESSION['id'];
	
	$user = $_POST['update_user'];
	$pass = $_POST['update_pass'];
	$priv = $_POST['update_priv'];
	
	$real = $_POST['update_real'];
	echo $real." ".$user." ".$pass." ".$priv;
	$query = mysqli_query($con, "UPDATE admin SET username = '$user', password = '$pass', level = '$priv' WHERE username= '$real'");
	
	if($query) {
		header("location:../menu/administrator.php?msg=u");
	} else {
		header("location:../menu/administrator.php?msg=x");
	}
?>
