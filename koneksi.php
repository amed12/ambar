<?php
$db_host = "mysql.idhostinger.com";
$db_user = "u520988298_ambar";
$db_pass = "12345678";
$db_name = "u520988298_ambar";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die();

if($koneksi){
	// echo "sukses";
} else {
	echo 'Gagal melakukan koneksi ke Database';
}

$waktu=date("Y-m-d");
?>
