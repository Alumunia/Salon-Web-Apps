<?php
	include '../../koneksi.php';
	
	$idProduk = $_GET ['idProduk'];
	$namaProduk = $_POST ['nama'];
	$hargaProduk = $_POST ['harga'];
	
	mysqli_query($con,"UPDATE produk SET namaProduk='$namaProduk', hargaProduk='$hargaProduk' WHERE idProduk='$idProduk'");
	header("location:../menu/table_unit.php");
?>