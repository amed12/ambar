<?php
$sql   = "SELECT nopol_armada FROM monitor ORDER BY id_monitor asc";
$query = mysqli_query($koneksi, $sql)  or die(mysqli_error());
$sql2   = "SELECT volume FROM monitor ORDER BY id_monitor asc";
$query2 = mysqli_query($koneksi, $sql2)  or die(mysqli_error());
$hariini = date('Y-m-d');
?>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Grafik Trip</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
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
            <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" name="tanggalPengeluaran" id="tanggalPengeluaran" value="<?php echo $hariini;?>">
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
			<div class="chart">
				<canvas id="barChart" style="height:400px"></canvas>
			</div>
		</div>
	</div>
</section>
