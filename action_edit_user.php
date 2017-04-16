<?php
include 'koneksi.php';
$iduser    = $_GET['id'];
$coba = mysqli_query($koneksi, "SELECT u.id_user,u.nama_user,u.tanggal_gabung,u.alamat,u.no_telp,u.username,u.password,l.level FROM usr_ambar u,level l WHERE u.id_level=l.id_level AND Id_user='$iduser'");
$coba2=mysqli_query($koneksi, "SELECT * from level");

while ($ok=mysqli_fetch_array($coba)) {
  $id_user        = $ok['id_user'];
  $nama_user      = $ok['nama_user'];
  $tanggal_gabung = $ok['tanggal_gabung'];
  $alamat         = $ok['alamat'];
  $no_telp        = $ok['no_telp'];
  $username       = $ok['username'];
  $password       = $ok['password'];
}
?>

<?php
if(isset($_POST['save'])){

  $id_user        = $_POST['id_user'];
  $nama_user      = $_POST['nama_user'];
  $tanggal_gabung = $_POST['tanggal_gabung'];
  $alamat         = $_POST['alamat'];
  $no_telp        = $_POST['no_telp'];
  $username       = $_POST['username'];
  $password       = $_POST['password'];


  $update   = mysqli_query($koneksi, "UPDATE usr_ambar SET nama_user='$nama_user',tanggal_gabung='$tanggal_gabung',alamat='$alamat',no_telp='$no_telp',username='$username',password='$password' WHERE id_user = '$iduser'") or die(mysqli_error());

  if($update){
    header("Location: index.php?p=input-pekerja_lap");
  }else{
    echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
  }
}
?>
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
     <div class="box-header with-border">
      <h3 class="box-title"><span class="glyphicon glyphicon-glass "></span> Data Petugas Lapangan</h3>
      <a class="btn" href="index.php?p=input-pekerja_lap"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

      <form class="form-horizontal" method="post" action="">
        <div class="box-body">

          <div class="form-group">
            <label for="id_user" class="col-sm-3 control-label">ID Petugas</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="id_user" placeholder="ID Pegawai Lapangan" disabled="" value="<?php echo $iduser ?>" name="id_user">
            </div>
          </div>

          <div class="form-group">
            <label for="nama" class="col-sm-3 control-label">Nama Petugas</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nama_user" placeholder="Nama Petugas" value="<?php echo $nama_user ?>" name="nama_user">
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-3 control-label">Tanggal Gabung</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="tanggal_gabung" placeholder="Tanggal Gabung" value="<?php echo $tanggal_gabung ?>" name="tanggal_gabung">
            </div>
          </div>

          <div class="form-group">
            <label for="nama" class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="alamat" placeholder="Alamat" value="<?php echo $alamat ?>" name="alamat">
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-3 control-label">No Telp</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp ?>" name="no_telp">
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-3 control-label">Username</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $username ?>" name="username">
            </div>
          </div>
          <div class="form-group">
            <label for="nama" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="password" placeholder="Password" value="<?php echo $password ?>" name="password">
            </div>
          </div>
          <div class="col-sm-8 box-footer pull-right">
            <button type="submit" name="save" onclick="alert('Data Berhasil DiUpdate')" class="btn btn-info">Update</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script src="js-script.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.js"></script>
<script>
  $(function(){
    $('#reset1').click(function(){
      $('#nama_user').val("");
      $('#alamat').val("");
      $('#no_telp').val("");
      $('#username').val("");
      $('#password').val("");
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#datepicker").datepicker({
      autoclose: true,
      dateFormat: 'yy/mm/dd'
    });
  });
</script>
