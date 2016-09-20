<?php
	include '../../koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	$tangga = $_POST['tanggal'];
	$barang = $_POST['barang'];
	$jumlah = $_POST['jumlah'];
	$suppli = $_POST['supplier'];
	
	mysqli_query($con, "INSERT INTO `pengeluaran`(`tglPengeluaran`, `totalPengeluaran`, `ketLain`) VALUES ([value-1],[value-2],[value-3])");
?>