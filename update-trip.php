<?php
include_once('koneksi.php');
$id_monitor=$_POST['idmon'];
$supir=$_POST['supir'];
$nopol=$_POST['nopol'];
$supplier=$_POST['supplier'];
$jenis_bak=$_POST['jenis_bak'];
$volume=$_POST['volume'];
$tanggal=$_POST['waktu'];
$perintah="UPDATE monitor SET nama_supir='$supir',nopol_armada='$nopol',jenis_bak='$jenis_bak',volume=$volume,id_supplier=$supplier,waktu_input='$tanggal' WHERE id_monitor='$id_monitor'";
$hasil=mysqli_query($koneksi,$perintah);
if ($hasil)
{
  header("location:index.php?p=data-trip2");
}else
{
  echo("Proses Update Gagal");
}
?>
