<?php
	include '../../koneksi.php';

	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	
	$q = (string)$_GET['q'];
	
	$no = 1;
	
	//ambil idTransaksi
	$qry = mysqli_query($con,"SELECT DISTINCT pr.namaProduk, pel.hp1
	FROM pelanggan pel INNER JOIN transaksi trans ON idPelanggan = Pelanggan_idPelanggan
	INNER JOIN transaksiproduk tp ON trans.idTransaksi = tp.Transaksi_idTransaksi
	INNER JOIN produk pr ON tp.Produk_idProduk = pr.idProduk
	WHERE pel.hp1 ='$q'");
	
	while ($pro = mysqli_fetch_assoc($qry)) {	
		echo '<table>';
		echo '<tr><td>'.$no++.'.&nbsp </td><td>'.$pro['namaProduk'].'</td></tr>';
		echo '</table>';
	}
	
?>