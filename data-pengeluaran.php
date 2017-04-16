<?php
include 'koneksi.php';
$waktu=$_POST['modul'];
$id=$_POST['id'];
if ($id=='0') { 
                 $queryMonitor = "SELECT DISTINCT(`id_supplier`) FROM `monitor` where waktu_input='$waktu';";
                    $result = $koneksi->query($queryMonitor);
                    while($row = mysqli_fetch_assoc($result)) {
                        $queryMonitorNopol = mysqli_query($koneksi, "SELECT SUM(`volume`),COUNT(*),nama_pemilik,waktu_input,harga_volume FROM `monitor` m,supplier s,harga h where m.id_supplier=s.id_supplier and m.id_supplier=h.id_supplier and m.waktu_input=h.tanggal_harga and m.id_supplier='$row[id_supplier]' and m.waktu_input='$waktu';");
                        $dataMonitorNopol = mysqli_fetch_array($queryMonitorNopol);
                        
                        if($dataMonitorNopol['COUNT(*)']==0){
                            $queryMonitor = mysqli_query($koneksi, "SELECT SUM(`volume`),COUNT(*),nama_pemilik,waktu_input FROM `monitor` m,supplier s where m.id_supplier=s.id_supplier and m.id_supplier='$row[id_supplier]' and m.waktu_input='$waktu';");
                            $dataMonitor = mysqli_fetch_array($queryMonitor);
                            ?><tr>
                            <td><?php echo $dataMonitor['nama_pemilik'];?></td>
                            <td><?php echo $dataMonitor['COUNT(*)'];?></td>
                            <td><?php echo $dataMonitor['SUM(`volume`)'];?></td>
                            <td><span style="background: red;color: white;">Belum Di input</span></td>
                            <td>0</td>
                            <td><a href="?p=detail-trip&id=<?php echo $row['id_supplier'];?>&tanggal=<?php echo $dataMonitor['waktu_input'];?>" class="btn btn-success btn-sm"><b>Detail</b></a></td>
                            </tr>
                        <?php }else{
                        ?>
                        <tr>
                            <td><?php echo $dataMonitorNopol['nama_pemilik'];?></td>
                            <td><?php if($dataMonitorNopol['COUNT(*)']!=0){echo $dataMonitorNopol['COUNT(*)'];}?></td>
                            <td><?php echo $dataMonitorNopol['SUM(`volume`)'];?></td>
                            <td><?php echo $dataMonitorNopol['harga_volume'];?></td>
                            <td><?php echo $dataMonitorNopol['SUM(`volume`)']*$dataMonitorNopol['harga_volume'];?></td>
                            <td><a href="?p=detail-trip&id=<?php echo $row['id_supplier'];?>&tanggal=<?php echo $dataMonitorNopol['waktu_input'];?>" class="btn btn-success btn-sm"><b>Detail</b></a></td>
                        </tr>
            <?php } }
}else{ 
        $queryMonitor = "SELECT DISTINCT(`id_supplier`) FROM `monitor` where waktu_input='$waktu'  and id_supplier='$id';";
                    $result = $koneksi->query($queryMonitor);
                    while($row = mysqli_fetch_assoc($result)) {
                        $queryMonitorNopol = mysqli_query($koneksi, "SELECT SUM(`volume`),COUNT(*),nama_pemilik,waktu_input,harga_volume FROM `monitor` m,supplier s,harga h where m.id_supplier=s.id_supplier and m.id_supplier=h.id_supplier and m.waktu_input=h.tanggal_harga and m.id_supplier='$row[id_supplier]' and m.waktu_input='$waktu';");
                        $dataMonitorNopol = mysqli_fetch_array($queryMonitorNopol);
                        if($dataMonitorNopol['COUNT(*)']==0){
                            $queryMonitor = mysqli_query($koneksi, "SELECT SUM(`volume`),COUNT(*),nama_pemilik,waktu_input FROM `monitor` m,supplier s where m.id_supplier=s.id_supplier and m.id_supplier='$row[id_supplier]' and m.waktu_input='$waktu';");
                            $dataMonitor = mysqli_fetch_array($queryMonitor);
                            ?><tr>
                            <td><?php echo $dataMonitor['nama_pemilik'];?></td>
                            <td><?php echo $dataMonitor['COUNT(*)'];?></td>
                            <td><?php echo $dataMonitor['SUM(`volume`)'];?></td>
                            <td><span style="background: red;color: white;">Belum Di input</span></td>
                            <td>0</td>
                            <td><a href="?p=detail-trip&id=<?php echo $row['id_supplier'];?>&tanggal=<?php echo $dataMonitor['waktu_input'];?>" class="btn btn-success btn-sm"><b>Detail</b></a></td>
                            </tr>
                        <?php }else{
                        ?>
                        <tr>
                            <td><?php echo $dataMonitorNopol['nama_pemilik'];?></td>
                            <td><?php if($dataMonitorNopol['COUNT(*)']!=0){echo $dataMonitorNopol['COUNT(*)'];}?></td>
                            <td><?php echo $dataMonitorNopol['SUM(`volume`)'];?></td>
                            <td><?php echo $dataMonitorNopol['harga_volume'];?></td>
                            <td><?php echo $dataMonitorNopol['SUM(`volume`)']*$dataMonitorNopol['harga_volume'];?></td>
                            <td><a href="?p=detail-trip&id=<?php echo $row['id_supplier'];?>&tanggal=<?php echo $dataMonitorNopol['waktu_input'];?>" class="btn btn-success btn-sm"><b>Detail</b></a></td>
                        </tr>  
        <?php }} }
    $koneksi->close();

?>