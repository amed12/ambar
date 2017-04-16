<?php
include 'koneksi.php';
$iduser = $_GET['id'];
$coba = mysqli_query($koneksi, "SELECT u.id_user,u.nama_user,u.tanggal_gabung,u.alamat,u.no_telp,u.username,u.password,l.level FROM usr_ambar u,level l WHERE u.id_level=l.id_level AND Id_user='$iduser'");

?>
<br>
<div class="col-md-12">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="glyphicon glyphicon-briefcase"></span>
        Detail Petugas Lapangan
      </h3>
      <a class="btn btn-danger btn-flat pull-right" href="?p=input-pekerja-lap"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a><br>
      <?php while ($d = mysqli_fetch_array($coba)) { ?>
        <table class="table datatable table-bordered table-hover">
          <tr>
            <td><label>ID User</label></td>
            <td><?php echo $d['id_user'] ?></td>
          </tr>
          <tr>
            <td><label>Nama User</label></td>
            <td><?php echo $d['nama_user'] ?></td>
          </tr>
          <tr>
            <td><label>Tanggal Gabung</label></td>
            <td><?php echo $d['tanggal_gabung'];?></td>
          </tr>
          <tr>
            <td><label>Alamat</label></td>
            <td><?php echo $d['alamat'] ?></td>
          </tr>
          <tr>
            <td><label>No Telp</label></td>
            <td><?php echo $d['no_telp'];?></td>
          </tr>
          <tr>
            <td><label>Username</label></td>
            <td><?php echo $d['username'] ?></td>
          </tr>
          <tr>
            <td><label>Password</label></td>
            <td><?php echo $d['password'] ?></td>
          </tr>
          <tr>
            <td><label>Level</label></td>
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
