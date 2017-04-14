<?php
include_once('koneksi.php');
$id_monitor=$_GET['id_monitor'];
$hapus="DELETE FROM monitor WHERE id_monitor='$id_monitor'";
$hasil=mysqli_query($koneksi,$hapus);
if ($hasil)
{
  header("location: index.php?p=data-trip2");
}else
{
  echo "<script language='javascript'>alert('Data gagal dihapus!')</script>";
}
?>
