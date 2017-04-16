<?php
include_once('koneksi.php');
$iduser=$_GET['id'];
$hapus="DELETE FROM usr_ambar WHERE id_user='$iduser'";
$hasil=mysqli_query($koneksi,$hapus);
if ($hasil)
{
  header("location: index.php?p=input-pekerja_lap");
}else
{
  echo "<script language='javascript'>alert('Data gagal dihapus!')</script>";
}
?>

