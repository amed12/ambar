<?php
    include 'koneksi.php';
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        $tgl = $_POST['dat'];
        $sql = "SELECT * FROM `monitor` where waktu_input='$tgl' and nopol_armada='$id';";
        
        ?>
        <!-- MEMBUAT TABLE -->
                    <?php
                        $result = $koneksi->query($sql);
                        while($row = mysqli_fetch_assoc($result)) { 
                    ?>
                    <tr>
                        <td><?php echo $row['nama_supir'];?></td>
                        <td><?php echo $row['nopol_armada'];?></td>
                        <td><?php echo '1'?></td>
                        <td><?php echo $row['volume'];?></td>
                        <td></td>
                    </tr>
                    <?php } ?>
 
        <?php }
    $koneksi->close();
?>