<?php
require_once 'koneksi.php';

$nama_user      = $_POST["nama_user"];
$tanggal_gabung = $_POST["tanggal_gabung"];
$alamat         = $_POST["alamat"];
$no_telp        = $_POST["no_telp"];
$username       = $_POST["username"];
$password       = $_POST["password"];
$id_level       = $_POST["id_level"];

$q=mysqli_query($koneksi,"INSERT INTO usr_ambar (nama_user,tanggal_gabung,alamat,no_telp,username,password,id_level) VALUES ('$nama_user','$tanggal_gabung','$alamat','$no_telp','$username','$password','$id_level')"); 

if ($q){
  ?>
  <script language="javascript">
    alert("User Baru berhasil di tambahkan");
    history.back();
  </script>
  <?php } else
  {
   echo"Data Gagal Disimpan";
 }
 ?>