<?php
	include '../../koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	
	$from = $_POST['from'];
	$to = $_POST['to'];
	header("location:../menu/table_report.php?from=$from&to=$to");
	
?>