<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'koneksi.php';
$coba = mysqli_query($koneksi, "SELECT u.id_user,u.nama_user,u.tanggal_gabung,u.alamat,u.no_telp,u.username,u.password,l.level FROM usr_ambar u,level l WHERE u.id_level=l.id_level AND l.level='petugas'");

$no=1;
?>

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Manajemen Pekerja Lapangan</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="form-group">
        <button data-toggle="modal" data-target="#myModal" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Tambah Pekerja Lapangan</button>
      </div>
      <table id="customers2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
            <th>Tanggal Gabung</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($coba)) { ?>
          <tr>

            <td><?php echo $no++;?></td>
            <td><?php echo $row['nama_user'];?></td>
            <td><?php echo $row['alamat'];?></td>
            <td><?php echo $row['no_telp'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['password'];?></td>
            <td><?php echo $row['level'];?></td>
            <td><?php echo $row['tanggal_gabung'];?></td>
            <td>
              <a href="?p=action-detail-user&&id=<?php echo $row['id_user']; ?>" title="Detail"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a> |
              <a href="?p=action-edit-user&&id=<?php echo $row['id_user'];?>" title="Edit"><span class="glyphicon glyphicon-edit" aria-Hidden="true"></span></a> |
              <a href="action-delete-user.php?id=<?php echo $row['id_user']; ?>" title= "Hapus"><span class="glyphicon glyphicon-trash" onclick="return confirm('Yakin ID User <?php echo $row2['id_user'];?> akan dihapus?')" aria-hidden="true"></span></a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div><!-- /.box-body -->
    <div class="box-footer">
      Contact Support Aplikasi ini : <a href="https://www.facebook.com/GalangArbi"><i class="fa fa-facebook-square"></i></a>
    </div><!-- /.box-footer-->
  </div><!-- /.box -->
</section><!-- /.content -->

<!-- modal input -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah User</h4>
      </div>
      <form role="form" action="action_add_user.php" method="post">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama User</label>
              <input type="text" class="form-control" id="nama_user" placeholder="Nama User" name="nama_user" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Alamat</label>
              <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nomor Telephon</label>
              <input type="text" class="form-control" id="no_telp" placeholder="Nomor Telp" name="no_telp" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="text" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Level</label>
              <select class="form-control" id="id_level" name="id_level">
                <option value="2">Petugas Lapangan</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-flat" onsubmit="return cekform();">Submit</button>
          <button type="reset" class="btn btn-primary btn-flat">Reset</button>
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
          <input type="hidden" class="form-control" id="tanggal_gabung" placeholder="" name="tanggal_gabung" value="<?php echo date("Y-m-d"); ?>">
        </div>
      </form>
    </div>
  </div>
</div>
