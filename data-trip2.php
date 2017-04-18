<?php
include_once('koneksi.php');
$query = "SELECT monitor.id_monitor,monitor.nama_supir,monitor.nopol_armada,supplier.nama_pemilik,monitor.jenis_bak,monitor.volume,monitor.waktu_input FROM monitor,supplier WHERE monitor.id_supplier = supplier.id_supplier";
$tampil = mysqli_query($koneksi,$query);
$query2 = "SELECT * FROM supplier";
$tampil2 = mysqli_query($koneksi,$query2);
$no=1;
?>
<div class="col-md-12">
  <!-- START DATATABLE EXPORT -->
  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Data Trip</h3>
    </div>
    <div class="panel-body">
      <table id="customers2" class="table datatable">
        <thead style="background: #A7A3A3">
          <tr>
            <th>No</th>
            <th>Sopir</th>
            <th>No. Pol</th>
            <th>Supplier</th>
            <th>Jenis Bak</th>
            <th>Volume</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($tampil)) { ?>
          <tr>

            <td><?php echo $no++;?></td>
            <td><?php echo $row['nama_supir'];?></td>
            <td><?php echo $row['nopol_armada'];?></td>
            <td><?php echo $row['nama_pemilik'];?></td>
            <td><?php echo $row['jenis_bak'];?></td>
            <td><?php echo $row['volume'];?></td>
            <td><?php echo $row['waktu_input'];?></td>
            <td width="15%">
              <div class="btn-group">
                <a
                class="btn btn-primary detail-data"
                data-toggle="modal" href="#myModal2"
                data-id="<?php echo $row['id_monitor'];?>"
                data-supir="<?php echo $row['nama_supir'];?>"
                data-nopol="<?php echo $row['nopol_armada'];?>"
                data-supplier="<?php echo $row['nama_pemilik'];?>"
                data-bak="<?php echo $row['jenis_bak'];?>"
                data-volume="<?php echo $row['volume'];?>"
                data-waktu="<?php echo $row['waktu_input'];?>">
                <i class="fa fa-bars"></i>
              </a>
              <a
              class="btn btn-primary edit-data"
              data-toggle="modal" href="#myModal"
              data-id="<?php echo $row['id_monitor'];?>"
              data-supir="<?php echo $row['nama_supir'];?>"
              data-nopol="<?php echo $row['nopol_armada'];?>"
              data-supplier="<?php echo $row['nama_pemilik'];?>"
              data-bak="<?php echo $row['jenis_bak'];?>"
              data-volume="<?php echo $row['volume'];?>"
              data-waktu="<?php echo $row['waktu_input'];?>">
              <i class="fa fa-edit"></i>
            </a>
            <a class="btn btn-primary" href="hapus-trip.php?id_monitor=<?php echo $row['id_monitor'];?>"><i class="fa fa-trash-o"></i></a>
          </div>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content--> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data</h4>
      </div>
      <form class="form-horizontal" method="POST" action="update-trip.php">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Supir</label>
                <div class="col-md-7 col-xs-12">
                  <input type="text" class="form-control" name="supir" id="supir">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">No. Polisi</label>
                <div class="col-md-7 col-xs-12">
                  <input type="text" class="form-control" name="nopol" id="nopol">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Supplier</label>
                <div class="col-md-7 col-xs-12">
                  <select class="form-control select" name="supplier" id="supplier">
                    <option value="">-- Pilih supplier --</option>
                    <?php while ($row2 = mysqli_fetch_array($tampil2)) { ?>
                    <option value="<?php echo $row2['id_supplier']?>"><?php echo $row2['nama_pemilik']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Jenis Bak</label>
                <div class="col-md-7 col-xs-12">
                  <input type="text" class="form-control" name="jenis_bak" id="jenis_bak">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Volume</label>
                <div class="col-md-7 col-xs-12">
                  <input type="text" class="form-control" name="volume" id="volume">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Tanggal</label>
                <div class="col-md-7 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    <input type="text" class="form-control datepicker" id="waktu" name="waktu">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-7 col-xs-12">
                  <input type="hidden" class="form-control" name="idmon" id="idmon">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Update">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal2" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Data </h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <td><label>ID</label></td>
              <td><p id="id_monitor"></p></td>
            </tr>
            <tr>
              <td><label>Nama Supir</label></td>
              <td><p id="supir"></p></td>
            </tr>
            <tr>
              <td><label>Nopol Armada</label></td>
              <td><p id="nopol"></p></td>
            </tr>
            <tr>
              <td><label>Nama Supplier</label></td>
              <td><p id="supplier"></p></td>
            </tr>
            <tr>
              <td><label>Jenis Bak</label></td>
              <td><p id="jenis_bak"></p></td>
            </tr>
            <tr>
              <td><label>Volume</label></td>
              <td><p id="volume"></p></td>
            </tr>
            <tr>
              <td><label>Tanggal Input</label></td>
              <td><p id="waktu"></p></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- <script>
    $(function(){
        $(document).on('click','.edit-data',function(e){
            e.preventDefault();
            $("#myModal").modal('show');
            $.post('hasil.php',
                {id:$(this).attr('data-id')},
                function(html){
                    $(".modal-body").html(html);
                }
            );
        });
    });
  </script>
 -->