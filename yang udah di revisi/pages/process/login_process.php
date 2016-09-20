<?php
	include '../../koneksi.php';
	
	$user = $_POST['name'];
	$pass = $_POST['pass'];
	
	$query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'");
	$result = mysqli_fetch_array($query);
	
	if($result) {
		session_start();
		$_SESSION['id'] = $result['username'];
		$_SESSION['level'] = $result['level'];
		
		header("location:../../index.php");
	} else {
		?>
			<script languange="javascript">alert("Username atau Password salah");</script>
			<script> document.location.href='../../index.php';</script>
		<?php
	}
?>