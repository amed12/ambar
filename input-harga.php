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
                       // header("berangkat.php"); // redirects image view page after 5 seconds.
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
<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
<div class="row">
    <div class="col-md-12">
        <section class="content-header">
          <h3>
            Selamat datang <?php echo $namauser;?>
            <small>Apps Ambar</small>
        </h3>

        <ol class="breadcrumb">
          
          <li><a class="edit-record" href="?p=input-harga"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
      </ol>
  </section>

  <section class="content">

    <form class="form-horizontal" action="?p=input-harga" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><strong>Input</strong> Harga</h2>
            </div>
            <div class="panel-body">                                                                        

                <div class="row">

                    <div class="col-md-6">
                        <input type="hidden" class="form-control" name="iduser" value="<?php echo $iduser?>" />
                        <div class="form-group date">                                        
                            <label class="col-md-3 control-label">Tanggal</label>
                            <div class="col-md-9">
                                <div class="input-group date">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="date" name="tanggal" class="form-control datepicker" id="datepicker" value="<?php echo date("Y-m-d"); ?>" readonly>                                    
                                </div>
                                <span class="help-block">Pilih tanggal</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                              <label class="col-md-3 control-label">Suplier</label>
                              <div class="col-md-9">                                                                                            
                                  <select class="form-control select" name="idSupliyer" required>
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

                        <div class="form-group">                                        
                            <label class="col-md-3 control-label">Harga </label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-archive"></span></span>
                                    <input type="text" class="form-control" name="harga" required/>
                                </div>            
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <div class="panel-footer">
        <button type="reset" class="btn btn-default">Reset</button>                   
        <button type="submit" class="btn btn-primary pull-right" name="btnInputHarga">Input Harga</button>
    </div>
</div>
</form>
</section>
</div>
</div>  
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
  $(function () 
  {
    $('#datepicker').datepicker({
      autoclose: true
  });
}
</script>