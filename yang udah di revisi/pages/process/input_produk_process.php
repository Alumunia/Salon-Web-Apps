<?php
	include '../../koneksi.php';
	session_start();
	if(empty($_SESSION['id'])) {
		header("location:../../index.php");
	}

	$nama= $_POST['name'];
	$alamat = $_POST['jalan'];
	$kota= $_POST['kota'];
	$provinsi= $_POST['provinsi'];
	$telpon= $_POST['phone'];
	$hp1= $_POST['cell1'];
	$hp2= $_POST['cell2'];
	$bb= $_POST['bbm'];
	$email= $_POST['email'];
	$fb= $_POST['fb'];
	$ketLain= $_POST['ketLain'];
	$date= gmdate("Y-m-d");
	$time= gmdate("H:m:s");
	$biayaTotal = 0;
	$diskonTotal = 0;
	
	//cek wheteher there's a user entry
	$query = mysqli_query($con, "SELECT * FROM pelanggan WHERE nama = '$nama' AND hp1 = '$hp1'");
	$result = mysqli_fetch_array($query);
	if(empty($result)) {
		mysqli_query($con,	"INSERT INTO `pelanggan`
							VALUES ('','$nama','','$alamat','$kota','$provinsi',
							'$hp1','$hp2','$telpon','$bb','$email','$fb')");
							$idPelanggan = mysqli_insert_id($con);
	} else if ($result) {
		$idPelanggan = $result['idPelanggan'];
	}
	
	//adding to transaction
	
	mysqli_query($con, 	"INSERT INTO `transaksi`(`idTransaksi`, `Pelanggan_idPelanggan`, `pengiriman`, 
						`datestamp`, `timestamp`, `diskonTotal`, `biayaTotal`, `ketLain`) VALUES 
						('','$idPelanggan','','$date','$time','$diskonTotal','$biayaTotal','$ketLain')");
						
	$idTransaksi = mysqli_insert_id($con);	

	$produkArray = $_POST['produk'];
	$jumlahArray = $_POST['jumlah'];
	$diskonArray = $_POST['diskon'];
	
	foreach($produkArray as $index => $oneProduk) {
		foreach($jumlahArray as $key => $oneJumlah) {
			list($one, $two) = explode("-", $oneProduk, 2);
		}
		foreach($diskonArray as $disk => $oneDiskon) {
			list($one, $two) = explode("-", $oneProduk, 2);
		}
			
		mysqli_query($con,	"INSERT INTO `transaksiproduk` VALUES 
			('$one','$idTransaksi','$jumlahArray[$two]','$diskonArray[$two]','')");
		
		$prod1 = mysqli_query($con, "select * from produk where idProduk = '$one'");
		$prod2 = mysqli_fetch_array($prod1);
		$hargaProduk = $prod2['hargaProduk'];
		$biaya = $hargaProduk * $jumlahArray[$two];

		$diskon = $diskonArray[$two];
		
		mysqli_query($con,"update transaksiproduk set biaya = '$biaya', diskon='$diskon' where Produk_idProduk = $one");
		$biayaTotal += $biaya;
		$diskonTotal += $diskon;
	}
	mysqli_query($con,"update transaksi set biayaTotal = '$biayaTotal', diskonTotal = '$diskonTotal' where idTransaksi = $idTransaksi");
	header("location:../menu/alamat_print.php?id=$idPelanggan&id1=$idTransaksi");	

?>