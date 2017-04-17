<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_ambar";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die();

if($koneksi){
	// echo "sukses";
} else {
	echo 'Gagal melakukan koneksi ke Database';
}

$waktu=date("Y-m-d");
?>
