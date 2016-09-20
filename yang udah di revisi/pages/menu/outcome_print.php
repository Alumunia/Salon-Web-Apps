<!DOCTYPE html>
<?php
	include '../../koneksi.php';
	$from= $_GET['from'];
	
	
	
	
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
				  <h3>Print Laporan Pengeluaran</h3>
					<table>
					  <tr>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td>&nbsp;&nbsp;&nbsp;<?php echo $from ?></td>
					  </tr>
					 
					</table>
                </div><!-- /.box-header -->
				
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                     <th style="width: 10px">No</th>
                      <th>Tanggal</th>
                      <th>Pembelian Barang</th>
                      <th>Jumlah</th>
					  <th>Harga</th>
                      <th>Supplier</th>
                    </tr>
					<?php
						$query = mysqli_query($con,"SELECT * FROM barang WHERE Pengeluaran_tglPengeluaran BETWEEN '$from' AND '$from' ");
						$numbr=0;
						while($hasil = mysqli_fetch_array($query)) {
							?>
							<tr>
								<td style="width: 10px"><?php echo ++$numbr;?></td>
								<td><?php echo $hasil['Pengeluaran_tglPengeluaran']; ?></td>
								<td><?php echo $hasil['namaBarang'] ;?></td>
								<td><?php echo $hasil['jumlahBarang'] ;?></td>
								<td><?php echo "Rp " .$hasil['harga'] ;?></td>
								<td><?php echo $hasil['suplier'];?></td>
							 
							</tr>
							<?php
							$numbr++;
						}
					?>
                  </table>
				
				  <div class="row no-print">
					
				  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
	  
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>