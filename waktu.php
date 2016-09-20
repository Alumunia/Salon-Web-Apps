<?php
	date_default_timezone_set('Asia/Jakarta');
$d = strtotime("08:00");
echo date("H:i")."<br>";

if(date("H:i") > strtotime("08:00")) {
	echo "jam kerja";
} else {
	echo "bukan jam";
}
?>