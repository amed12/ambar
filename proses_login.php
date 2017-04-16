<?php
include 'koneksi.php';
$usern = $_POST['username'];
$passm = $_POST['password'];


// query untuk mendapatkan record dari username
$hasil = mysqli_query($koneksi, "SELECT * FROM usr_ambar WHERE username = '$usern' and password='$passm'");

$data = mysqli_fetch_array($hasil);
// cek kesesuaian password
if ($usern == $data['username'] && $passm==$data['password'])
{
    // menyimpan username dan level ke dalam session

	session_start();
    $_SESSION['id_user'] = $data['id_user'];  
   	header('location:index.php');
}
else
        {
            // echo "Gagal Login";
            header("location:login.php?pesan=gagal")or die(mysql_error());
        }

?>