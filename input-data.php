<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'koneksi.php';
if(isset($_POST['btnsave']))
{

  $namasupir = $_POST['namasupir'];
  $nopol = $_POST['nopol'];
  $jenisbak = $_POST['jenisbak'];
  $volume = $_POST['volume'];
  $idsup = $_POST['idsup'];
  $iduser = $_POST['iduser'];
  $tanggal = $_POST['tanggal'];
  // if no error occured, continue ....
  if(!isset($errMSG))
  {
    $stmt = "INSERT INTO monitor(id_monitor,nama_supir,nopol_armada,jenis_bak,volume,id_supplier,id_user,waktu_input)VALUES(null,'$namasupir','$nopol','$jenisbak','$volume','$idsup','$iduser','$tanggal')";

    if($koneksi->query($stmt)===true)
    {
      $successMSG = "Trip berhasil ditambahkan ...";
      // header("berangkat.php"); // redirects image view page after 5 seconds.
      ?>
      <script language="javascript">
      alert("Trip berhasil di tambahkan");
      close();
      </script>
      <?php
    }
    else
    {
      $errMSG = "error while inserting....";
    }
  }
}
?>


<?php
if(isset($errMSG)){
  ?>
  <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
  </div>
  <?php
}
else if(isset($successMSG)){
  ?>
  <div class="alert alert-success">
    <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
  </div>
  <?php
}

//  $jam=$_GET['jam'];
$coba = mysqli_query($koneksi, "SELECT * FROM supplier");
?>

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h2 class="box-title">Input Data Trip</h2>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <form class="form-horizontal" action="?p=input-data" method="post">
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <input type="hidden" class="form-control" name="iduser" value="<?php echo $iduse?>" />
            <div class="form-group">
              <label class="col-md-3 control-label">Nama Supir</label>
              <div class="col-md-9">
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-user"></span></span>
                  <input type="text" class="form-control" name="namasupir" required/>
                </div>
                <span class="help-block">Ex. John Doe</span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">No Pol</label>
              <div class="col-md-9 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-truck"></span></span>
                  <input type="text" class="form-control" name="nopol" required/>
                </div>
                <span class="help-block">Ex. N 1234 L</span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Jenis Bak</label>
              <div class="col-md-9 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-archive"></span></span>
                  <input type="text" class="form-control" name="jenisbak" required/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Volume</label>
              <div class="col-md-9 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-archive"></span></span>
                  <input type="text" class="form-control" name="volume" required/>
                </div>
                <span class="help-block">Ex. 22</span>
              </div>
            </div>

          </div>
          <div class="col-md-6">

            <div class="form-group">
              <label class="col-md-3 control-label">Suplier</label>
              <div class="col-md-9">
                <select class="form-control select" name="idsup" required>
                  <option value="">Pilih Suplier</option>
                  <?php
                  while ($row = mysqli_fetch_array($coba)) {

                    ?>
                    <option value="<?php echo $row['id_supplier']; ?>"><?php echo $row['nama_pemilik']; ?></option>
                    <?php
                  }
                  ?>
                </select>
                <span class="help-block">Pilh Nama Suplier</span>
              </div>
            </div>

            <div class="form-group date">
              <label class="col-md-3 control-label">Datepicker</label>
              <div class="col-md-9">
                <div class="input-group date">
                  <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                  <input type="text" name="tanggal" class="form-control datepicker" id="datepicker" value="<?php echo date("Y-m-d"); ?>" required>
                </div>
                <span class="help-block">Pilih tanggal</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <button type="reset" class="btn btn-danger btn-flat">Reset</button>
        <button type="submit" class="btn btn-success btn-flat pull-right" name="btnsave">Tambah Trip</button>
      </div>
    </form>
  </div>
</section>
