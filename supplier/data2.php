<div class="col-md-12">
  <section class="content-header">
    <h1>
      Manajemen Supplier ambar
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Manajemen Supplier</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data Supplier Ambar</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-body">
              <button type="submit" class="btn btn-primary " id="btnadd" name="btnadd"><i class="fa fa-plus"></i> Add Supplier</button>
              <br>
              <br>
              <div class="box-body" style="max-width:900px;" >
                <table id="table_cust" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr class="tableheader">
                      <th style="width:40px">#</th>
                      <th style="width:140px">Nama Pemilik</th>
                      <th style="width:140px">Alamat</th>
                      <th style="width:140px">No telepon</th>
                      <th style="width:140px">Tanggal Gabung</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>

              </div><!-- /.box-body -->
            </div><!-- /.box -->

            <div id="modalcust" class="modal">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Form Master Customer</h4>
                  </div>
                  <!--modal header-->
                  <div class="modal-body">
                    <div class="pad" id="infopanel"></div>
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label class="col-sm-3  control-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtname" placeholder="Name">
                          <input type="hidden" id="crudmethod" value="N">
                          <input type="hidden" id="txtid" value="0">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3  control-label">Gender</label>
                        <div class="col-sm-9">
                          <select class="form-control" id="cbogender" >
                            <option value="Male"> Male </option>
                            <option value="Female"> Female </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3  control-label">Country</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtcountry">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3  control-label">Phone</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="txtphone">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3  control-label"></label>
                        <div class="col-sm-9">
                          <button type="submit" class="btn btn-primary " id="btnsave"><i class="fa fa-save"></i> Save</button></div>
                        </div>
                      </div>
                      <!--modal footer-->
                    </div>
                    <!--modal-content-->
                  </div>
                  <!--modal-dialog modal-lg-->
                </div>
                <!--form-kantor-modal-->
              </div>


            </section><!-- /.content -->

          </div><!-- /.box-body -->
          <div class="box-footer">
            Contact Support Aplikasi ini : <a href="https://www.facebook.com/GalangArbi"><i class="fa fa-facebook-square"></i></a>
          </div><!-- /.box-footer-->
        </div><!-- /.box -->
      </section><!-- /.content -->

    </div>
