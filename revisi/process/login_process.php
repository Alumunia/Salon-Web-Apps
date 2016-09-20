<?php
	include '../../koneksi.php';
	
	$user = $_POST['name'];
	$pass = $_POST['pass'];
	
	$query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'");
	$result = mysqli_fetch_array($query);
	
	$m = strtotime("08:00");
	$masuk = date("H:i", $m);
	
	$k = strtotime("20:00");
	$keluar = date("H:i", $k);

	if($result) {
		if($result['level'] != 1) {
			if((date("H:i") >= $masuk) && (date("H:i") <= $keluar)) {
				session_start();
				$_SESSION['id'] = $result['username'];
				$_SESSION['level'] = $result['level'];
				header("location:../../index.php");
			} else {
				?>
					<script languange="javascript">alert("Login hanya bisa dilakukan pada jam kerja");</script>
					<script> document.location.href='../../index.php';</script>
				<?php
			}
		} else if($result['level'] == 1) {
			session_start();
			$_SESSION['id'] = $result['username'];
			$_SESSION['level'] = $result['level'];
			header("location:../../index.php");
		}
	} else {
		?>
			<script languange="javascript">alert("Username atau Password salah");</script>
			<script> document.location.href='../../index.php';</script>
		<?php
	}
?>