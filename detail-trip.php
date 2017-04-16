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
$tanggal = $_GET['tanggal'];
$idsup = $_GET['id'];
$tgl = date('d-m-Y');
$hari = date('l');

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <table style="width:100%">
                <tr>
                    <th><?php
                    $querySupliyer = "SELECT * FROM `supplier` where id_supplier='$idsup'";
                    $result = $koneksi->query($querySupliyer);
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        Nama Suplier : <?php echo $row['nama_pemilik'];?>
                        <?php } ?>
                        <br>
                    Tanggal : <?php echo $tanggal;?>
                    </th>
                    <th><a class="btn btn-success btn-flat pull-right" href="?p=daftar-pengeluaran">Back</a></th>
                </tr>
                </table>
        </h3>
    </div>
        <div class="panel-body">
            <table class="table datatable table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Sopir</th>
                        <th>Nopol</th>
                        <th>Jumlah Trip</th>
                        <th>Jumlah Volume</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tampilDataTrip">
                    <?php
                    $queryMonitor = "SELECT DISTINCT(`nopol_armada`) FROM `monitor` where waktu_input='$tanggal' and id_supplier='$idsup';";
                    $result = $koneksi->query($queryMonitor);
                    while($row = mysqli_fetch_assoc($result)) {
                        $queryMonitorNopol = mysqli_query($koneksi, "SELECT SUM(`volume`),COUNT(*),nama_supir,waktu_input FROM `monitor` where nopol_armada='$row[nopol_armada]' and waktu_input='$tanggal';");
                        $dataMonitorNopol = mysqli_fetch_array($queryMonitorNopol);
                        ?>
                        <tr>
                            <td><?php echo $dataMonitorNopol['nama_supir'];?></td>
                            <td><?php echo $row['nopol_armada'];?></td>
                            <td><?php echo $dataMonitorNopol['COUNT(*)'];?></td>
                            <td><?php echo $dataMonitorNopol['SUM(`volume`)'];?></td>
                            <td><a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-id="<?php echo $row['nopol_armada']; ?>" data-tang="<?php echo $dataMonitorNopol['waktu_input'];?>" data-target="#detailTrip"><b>Detail</b></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Start Modal tabel detail trip -->
        <div class="modal fade" id="detailTrip" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Detail Trip</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <table class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SOPIR</th>
                                        <th>NOPOL</th>
                                        <th>JUMLAH TRIP</th>
                                        <th>JUMLAH VOLUME</th>
                                    </tr>
                                </thead>
                                <tbody class="fetched-data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- END Modal tabel detail trip -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#detailTrip').on('show.bs.modal', function (e) {
                    var rowid = $(e.relatedTarget).data('id');
                    var dat = $(e.relatedTarget).data('tang');
                    //menggunakan fungsi ajax untuk pengambilan data
                    $.ajax({
                        type : 'post',
                        url : 'detail_trip.php',
                        data :  'rowid='+ rowid +'&dat='+ dat,
                        success : function(data){
                        $('.fetched-data').html(data);//menampilkan data ke dalam modal
                    }
                });
                });
            });
        </script>
        <script type="text/javascript">
            $(function(){
                $.ajaxSetup({
                    type:"POST",
                    url: "data_trip.php",
                    cache: false,
                });

                $("#supliyer").change(function(){
                    var tglnya = $('#pilihtanggal').val();
                    var value = $(this).val();
                    if(value>0){
                        $.ajax({
                            data:{
                                modul : tglnya,
                                id : value},
                                success: function(data){
                                    $("#tampilDataTrip").html(data);
                                }
                            });
                    }else{
                        $.ajax({
                            data:{
                                modul : tglnya,
                                id : '0'},
                                success: function(data){
                                    $("#tampilDataTrip").html(data);
                                }
                            });
                    }
                });
                $("#pilihtanggal").change(function(){
                    var  value = $('#supliyer').val();
                    var tglnya = $(this).val();
                    if(value>0){
                        $.ajax({
                            data:{
                                modul : tglnya,
                                id : value},
                                success: function(data){
                                    $("#tampilDataTrip").html(data);
                                }
                            });
                    }else{
                        $.ajax({
                            data:{
                                modul : tglnya,
                                id : '0'},
                                success: function(data){
                                    $("#tampilDataTrip").html(data);
                                }
                            });
                    }
                });
            });
        </script>
