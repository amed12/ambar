<?php
include 'koneksi.php';
$modul=$_POST['modul'];
$id=$_POST['id'];
if ($id=='0') { 
                $queryMonitor = "SELECT DISTINCT(`nopol_armada`) FROM `monitor` where waktu_input='$modul';";
                $result = $koneksi->query($queryMonitor);
                while($row = mysqli_fetch_assoc($result)) { 
                    $queryMonitorNopol = mysqli_query($koneksi, "SELECT SUM(`volume`),COUNT(*),nama_supir,waktu_input FROM `monitor` where nopol_armada='$row[nopol_armada]' and waktu_input='$modul';");
                    $dataMonitorNopol = mysqli_fetch_array($queryMonitorNopol);
            ?>
            <tr>
                <td><?php echo $dataMonitorNopol['nama_supir'];?></td>
                <td><?php echo $row['nopol_armada'];?></td>
                <td><?php echo $dataMonitorNopol['COUNT(*)'];?></td>
                <td><?php echo $dataMonitorNopol['SUM(`volume`)'];?></td>
                <td></td>
                <td><a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-id="<?php echo $row['nopol_armada']; ?>" data-tang="<?php echo $dataMonitorNopol['waktu_input'];?>" data-target="#detailTrip"><b>Detail</b></a></td>
            </tr>
            <?php } 
}else{
        $queryMonitor = "SELECT DISTINCT(`nopol_armada`) FROM `monitor` where waktu_input='$modul' and id_supplier='$id';";
                $result = $koneksi->query($queryMonitor);
                while($row = mysqli_fetch_assoc($result)) { 
                    $queryMonitorNopol = mysqli_query($koneksi, "SELECT SUM(`volume`),COUNT(*),nama_supir,waktu_input FROM `monitor` where nopol_armada='$row[nopol_armada]' and waktu_input='$modul';");
                    $dataMonitorNopol = mysqli_fetch_array($queryMonitorNopol);
            ?>
            <tr>
                <td><?php echo $dataMonitorNopol['nama_supir'];?></td>
                <td><?php echo $row['nopol_armada'];?></td>
                <td><?php echo $dataMonitorNopol['COUNT(*)'];?></td>
                <td><?php echo $dataMonitorNopol['SUM(`volume`)'];?></td>
                <td></td>
                <td><a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-id="<?php echo $row['nopol_armada']; ?>" data-tang="<?php echo $dataMonitorNopol['waktu_input'];?>" data-target="#detailTrip"><b>Detail</b></a></td>
            </tr>      
        <?php } }
    $koneksi->close();
?>