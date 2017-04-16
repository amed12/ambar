<?php 
include 'koneksi.php';
$iduser = $_GET['id'];
$coba = mysqli_query($koneksi, "SELECT u.id_user,u.nama_user,u.tanggal_gabung,u.alamat,u.no_telp,u.username,u.password,l.level FROM usr_ambar u,level l WHERE u.id_level=l.id_level AND Id_user='$iduser'");

?>   
<br> 
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="glyphicon glyphicon-briefcase"></span>  Detail Petugas Lapangan</h3>
      <a class="btn" href="?p=input-pekerja_lap"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
      <?php 
      while ($d = mysqli_fetch_array($coba)) {
        ?>
        <table class="table datatable table-bordered table-hover">
          <tr>
            <td>ID User</td>
            <td><?php echo $d['id_user'] ?></td>
          </tr>
          <tr>
            <td>Nama User</td>
            <td><?php echo $d['nama_user'] ?></td>
          </tr>
          <tr>
            <td>Tanggal Gabung</td>
            <td><?php echo $d['tanggal_gabung'];?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><?php echo $d['alamat'] ?></td>
          </tr>
          <tr>
            <td>No Telp</td>
            <td><?php echo $d['no_telp'];?></td>
          </tr>
          <tr>
            <td>Username</td>
            <td><?php echo $d['username'] ?></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><?php echo $d['password'] ?></td>
          </tr>
          <tr>
            <td>Level</td>
            <td><?php echo $d['level'];?></td>
          </tr>
        </table>
        <?php 
      }
      ?>
  </div>
</div>
</div>
<!-- ->format('d/m/Y') -->