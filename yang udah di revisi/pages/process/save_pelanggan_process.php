<?php
	include '../../koneksi.php';

	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}
	$id = $_SESSION['id'];
	$query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$id'");
	$result = mysqli_fetch_array($query);
	if($result['level'] == 1) {
		$level = "Super Admin";
	} else {
		$level = "Administrator";
	}
	$day = gmdate("l");
	$date = gmdate("j F Y");
	$tgl = gmdate("Y-m-d");
	$pict = rand(1, 5);
	
	$idPelanggan = $_GET ['idPelanggan'];
	$nama = $_POST ['nama'];
	$age = $_POST ['age'];
	$alamat = $_POST ['alamat'];
	$kota = $_POST ['kota'];
	$provinsi = $_POST ['provinsi'];
	$hp1 = $_POST ['hp1'];
	$hp2 = $_POST ['hp2'];
	$telpon = $_POST ['telpon'];
	$pinBB = $_POST ['pinBB'];
	$email = $_POST ['email'];
	$fb = $_POST ['fb'];
	
	mysqli_query($con,"UPDATE PELANGGAN SET nama='$nama',golUsia='$age',alamat='$alamat',kota='$kota',provinsi='$provinsi',hp1='$hp1',hp2='$hp2',telpon='$telpon' ,pinBB='$pinBB',email='$email',fb='$fb' WHERE idPelanggan='$idPelanggan'");
	
	header("location:../menu/personaldata.php");
	
?>