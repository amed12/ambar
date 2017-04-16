<?php
session_start();
include 'koneksi.php';
if (empty($_SESSION['id_user'])){
  header("location:login.php");
}
error_reporting(E_ALL & ~E_NOTICE);
ob_start();
$p=htmlentities($_GET['p']);
$iduser=$_SESSION['id_user'];

$coba = mysqli_query($koneksi, "SELECT * FROM usr_ambar u,level l WHERE u.id_level = l.id_level AND id_user = $iduser");
$row = mysqli_fetch_array($coba);

$namauser=$row['nama_user'];
$iduse=$row['id_user'];
$kategori=$row['kategori'];
$hariini = date('Y-m-d');
$tgl = date('d-m-Y');
$hari = date('l');
?>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Pengeluaran</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="form-group">
        <div class="col-md-1">
          <p>Tampilkan Berdasarkan</p>
        </div>
        <div class="col-md-2">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
            <input type="text" class="form-control datepicker" name="tanggalPengeluaran" id="tanggalPengeluaran" value="<?php echo $hariini;?>">
          </div>
        </div>
        <div class="col-md-2">
          <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-user"></span></span>
            <select class="form-control select" name="supliyer_Bayar" id="supliyer_Bayar">
              <option value="">Semua</option>
              <?php
              $querySupliyer = "SELECT * FROM `supplier`";
              $result = $koneksi->query($querySupliyer);
              while($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $row['id_supplier'];?>"><?php echo $row['nama_pemilik'];?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <br><hr>
        <table id="tabelPengeluaran" class="table table-striped table-bordered table-hover">
          <thead>
            <tr class="tableheader">
              <th>Supplier</th>
              <th>Jumlah Trip</th>
              <th>Jumlah Volume</th>
              <th>Harga Volume</th>
              <th>Total Bayar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="tampilDataPengeluaran">
            <?php
            $queryMonitor = "SELECT DISTINCT(`id_supplier`) FROM `monitor` where waktu_input='$hariini';";
            $result = $koneksi->query($queryMonitor);
            while($row = mysqli_fetch_assoc($result)) {
              $queryMonitorNopol = mysqli_query($koneksi, "SELECT SUM(`volume`),COUNT(*),nama_pemilik,waktu_input,harga_volume FROM `monitor` m,supplier s,harga h where m.id_supplier=s.id_supplier and m.id_supplier=h.id_supplier and m.waktu_input=h.tanggal_harga and m.id_supplier='$row[id_supplier]' and m.waktu_input='$hariini';");
              $dataMonitorNopol = mysqli_fetch_array($queryMonitorNopol);
              if($dataMonitorNopol['COUNT(*)']==0){
                $queryMonitor = mysqli_query($koneksi, "SELECT SUM(`volume`),COUNT(*),nama_pemilik,waktu_input FROM `monitor` m,supplier s where m.id_supplier=s.id_supplier and m.id_supplier='$row[id_supplier]' and m.waktu_input='$waktu';");
                $dataMonitor = mysqli_fetch_array($queryMonitor);
                ?>
                <tr>
                  <td><?php echo $dataMonitor['nama_pemilik'];?></td>
                  <td><?php echo $dataMonitor['COUNT(*)'];?></td>
                  <td><?php echo $dataMonitor['SUM(`volume`)'];?></td>
                  <td><span style="background: red;color: white;">Belum Di input</span></td>
                  <td>0</td>
                  <td><a href="?p=detail-trip&id=<?php echo $row['id_supplier'];?>&tanggal=<?php echo $dataMonitor['waktu_input'];?>" class="btn btn-success btn-sm"><b>Detail</b></a></td>
                </tr>
                <?php }else{ ?>
                  <tr>
                    <td><?php echo $dataMonitorNopol['nama_pemilik'];?></td>
                    <td><?php if($dataMonitorNopol['COUNT(*)']!=0){echo $dataMonitorNopol['COUNT(*)'];}?></td>
                    <td><?php echo $dataMonitorNopol['SUM(`volume`)'];?></td>
                    <td><strong>Rp. </strong><?php echo $dataMonitorNopol['harga_volume'];?></td>
                    <td><strong>Rp. </strong><?php echo $dataMonitorNopol['SUM(`volume`)']*$dataMonitorNopol['harga_volume'];?></td>
                    <td><a href="?p=detail-trip&id=<?php echo $row['id_supplier'];?>&tanggal=<?php echo $dataMonitorNopol['waktu_input'];?>" class="btn btn-success btn-sm"><b>Detail</b></a></td>
                  </tr>
                  <?php }} ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
