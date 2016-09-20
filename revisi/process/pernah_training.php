<?php
	include '../../koneksi.php';

	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	
	$q = (string)$_GET['q'];
	
	$no = 1;
	
	//ambil idTransaksi
	$qry = mysqli_query($con,"SELECT DISTINCT trtr.tipe, trg.namaTraining, pe.hp1 
			FROM pelanggan pe INNER JOIN transaksi trk 
			ON pe.idPelanggan = trk.Pelanggan_idPelanggan 
			INNER JOIN transaksitraining trtr ON trk.idTransaksi = trtr.Transaksi_idTransaksi 
			INNER JOIN training trg ON trtr.Training_idTraining = trg.idTraining 
			INNER JOIN tipetraining titr ON trg.idTraining = titr.Training_idTraining 
			WHERE pe.hp1 = '$q'");
	
	while ($pro = mysqli_fetch_assoc($qry)) {	
		echo "<li>".$pro['tipe']." ".$pro['namaTraining']."</li>";
	}
	
?>