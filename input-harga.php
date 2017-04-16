<?php
error_reporting( ~E_NOTICE ); // avoid notice
require_once 'koneksi.php';
if(isset($_POST['btnInputHarga']))
{
  $tanggal = $_POST['tanggal'];
  $idsup = $_POST['idSupliyer'];
  $harga = $_POST['harga'];
  $iduser = $_SESSION['id_user'];

  // if no error occured, continue ....
  if(!isset($errMSG))
  {
    $queryCek = "SELECT * FROM harga where tanggal_harga='$tanggal' and id_supplier='$idsup'";
    $check = mysqli_fetch_array(mysqli_query($koneksi,$queryCek));
    if (isset($check)) {?>
      <script language="javascript">
      alert("Harga Sudah diinput untuk id supliyer tersebut");
      close();
      </script>
      <?php }else{
        $stmt = "INSERT INTO harga(id_supplier,tanggal_harga,harga_volume)VALUES('$idsup','$tanggal','$harga')";
        if($koneksi->query($stmt)===true)
        {
          $successMSG = "Harga berhasil ditambahkan ...";
          ?>
          <script language="javascript">
          alert("Harga berhasil ditambahkan");
          close();
          </script>
          <?php
        }
        else
        {
          $errMSG = "Error Tambah Harga....";
        }
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
      <h3 class="box-title">Input Harga</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <form class="form-horizontal" action="?p=input-harga" method="post">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" class="form-control" name="iduser" value="<?php echo $iduser?>" />
            <div class="form-group date">
              <label class="col-md-3 control-label">Tanggal</label>
              <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                  <input type="text" name="tanggal" class="form-control datepicker" id="datepicker" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <span class="help-block">Pilih tanggal</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Supplier</label>
              <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-user"></span></span>
                  <select class="form-control select" name="idSupliyer" required>
                    <?php
                    while ($row = mysqli_fetch_array($coba)) {

                      ?>
                      <option value="<?php echo $row['id_supplier']; ?>"><?php echo $row['nama_pemilik']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <span class="help-block">Pilh Nama Suplier</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Harga </label>
              <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-archive"></span></span>
                  <input type="text" class="form-control" name="harga" required/>
                </div>
                <span class="help-block">Tentukan harga per-volume bak</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <button type="reset" class="btn btn-default btn-flat">Reset</button>
        <button type="submit" class="btn btn-success pull-right btn-flat" name="btnInputHarga">Input Harga</button>
      </div><!-- /.box-footer-->
    </form>
  </div><!-- /.box -->
</section><!-- /.content -->
