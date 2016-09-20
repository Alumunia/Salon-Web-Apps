<?php
	include '../../koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	
	$names = $_POST['names'];
	
	

	header("location:../menu/personaldata.php?names=$names");
	
?>