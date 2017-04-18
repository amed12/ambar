<section class="content">
  <div class="box">
    <div class="box-header with-border" style="background: #D1D0D0">
      <h3 class="box-title">Managemen Supplier</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <button type="submit" class="btn btn-success btn-flat" id="btnadd" name="btnadd"><i class="fa fa-plus"></i> Add Supplier</button>
      <br>
      <br>
      <table id="table_cust" class="table table-striped table-bordered table-hover">
        <thead>
          <tr class="tableheader" style="background: #A7A3A3">
            <th>No</th>
            <th>Nama Pemilik(Supplier)</th>
            <th>Alamat</th>
            <th>No telepon</th>
            <th>Tanggal Gabung</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</section>


<div id="modalcust" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header" style="background: #D1D0D0">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Form Master Customer</h4>
      </div>
      <!--modal header-->
      <div class="modal-body">
        <div class="pad" id="infopanel"></div>
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Nama Pemilik</label>
            <div class="col-md-7 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                <input type="text" class="form-control" id="txtname" placeholder="Name">
                <input type="hidden" id="crudmethod" value="N">
                <input type="hidden" id="txtid" value="0">
              </div>
              <span class="help-block">Contoh : PT.Perkasa Indah...</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Alamat</label>
            <div class="col-md-7 col-xs-12">
              <textarea class="form-control" rows="5" id="cbogender"></textarea>
              <span class="help-block">Misal : Jalan..</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Nomor Telepon</label>
            <div class="col-md-7 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                <input type="text" class="form-control" id="txtcountry" />
              </div>
              <span class="help-block">Misal : 081...</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Datepicker</label>
            <div class="col-md-7 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                <input type="text" class="form-control datepicker" disabled="" id="txtphone" name="txtphone" value="<?php echo date("Y-m-d");?>" >
              </div>
              <span class="help-block">Click on input field to get datepicker</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3  control-label"></label>
            <div class="col-sm-7">
              <button type="submit" class="btn btn-primary"  id="btnsave"><i class="fa fa-save"></i> Simpan</button></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="modalcust2" class="modal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Edit data supplier</h4>
        </div>
        <!--modal header-->
        <div class="modal-body">
          <div class="pad" id="infopanel"></div>
          <div class="form-horizontal">

            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Nama Pemilik</label>
              <div class="col-md-7 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                  <input type="text" class="form-control" id="txtname" placeholder="Name">
                  <input type="hidden" id="crudmethod" value="N">
                  <input type="hidden" id="txtid" value="0">
                </div>
                <span class="help-block">Contoh : PT.Perkasa Indah...</span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Alamat</label>
              <div class="col-md-7 col-xs-12">
                <textarea class="form-control" rows="5" id="cbogender"></textarea>
                <span class="help-block">Misal : Jalan..</span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Nomor Telepon</label>
              <div class="col-md-7 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                  <input type="text" class="form-control" id="txtcountry" />
                </div>
                <span class="help-block">Misal : 081...</span>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-7 col-xs-12">
                <input type="text" disabled="" id="txtphone" name="txtphone" value="" >
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3  control-label"></label>
              <div class="col-sm-9">
                <button type="submit" class="btn btn-primary " id="btnsave"><i class="fa fa-save"></i> Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
