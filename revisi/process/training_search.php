<?php
	include '../../koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	
	$from = $_POST['from'];
	$to = $_POST['to'];
	
?>