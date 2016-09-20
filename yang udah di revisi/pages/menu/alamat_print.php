<!DOCTYPE html>
<?php
	include '../../koneksi.php';
$id=$_GET['id'];
$idTransaksi=$_GET['id1'];
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Print Lap | Vstalin Githa</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
	
        <!-- Main content -->
        <section class="invoice">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
			  
                <div class="box-header">
				  <h3>Print Label Alamat</h3>
					<table>
					  <tr>
					  <?php
						$query = mysqli_query($con,"SELECT * FROM pelanggan WHERE idPelanggan='$id' ");
						$numbr=0;
						$hasil = mysqli_fetch_array($query); 
							?>
						<td>Kepada YTH:</td>
						<td>:</td>
						<td>&nbsp;&nbsp;&nbsp;<?php echo $hasil['nama']; ?></td>
					  </tr>
					  <tr>
					  
						<td>Alamat &nbsp;&nbsp;&nbsp;</td>
						<td>:</td>
						<td>&nbsp;&nbsp;&nbsp;<?php echo $hasil['alamat'].", ". $hasil['kota'].", ". $hasil['provinsi'].", ". $hasil['hp1']; ?></td>
						
					  </tr>
					</table>
					
					<table>
					<?php
					$semua = mysqli_query($con, "SELECT namaProduk FROM produk");	
					while ($semua1 = mysqli_fetch_assoc($semua)) {
						echo "<tr><td>(";
						
						$pro = mysqli_query($con,"SELECT DISTINCT pr.namaProduk
						FROM transaksi trans INNER JOIN transaksiproduk tp ON trans.idTransaksi = tp.Transaksi_idTransaksi
						INNER JOIN produk pr ON tp.Produk_idProduk = pr.idProduk
						WHERE trans.idTransaksi='$idTransaksi'");
						while ($pro1 = mysqli_fetch_assoc($pro)) {
						
						$nama = $pro1['namaProduk'];	
						if ($nama == $semua1['namaProduk']) {echo "X";} else {}
							
						}
						echo ")</td>&nbsp<td>".$semua1['namaProduk']."</td></td>";
					} ?>
					</table>
                </div><!-- /.box-header -->
				
             
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
	  
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>