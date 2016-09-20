<?php
	include '../../koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	
	$from = $_POST['from'];
	header("location:../menu/table_outcome.php?from=$from");
	
?>