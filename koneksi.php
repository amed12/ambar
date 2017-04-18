<?php
$db_host = "sql200.ezyro.com";
$db_user = "ezyro_19976047";
$db_pass = "ambarproject";
$db_name = "ezyro_19976047_db_ambar";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die();

if($koneksi){
	// echo "sukses";
} else {
	echo 'Gagal melakukan koneksi ke Database';
}

$waktu=date("Y-m-d");
?>
