<div class="col-md-12">
    <!-- START SALES BLOCK -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title-box">
            </div>                                     
            <ul class="panel-controls panel-controls-title">                                        
                <li>
                    <div id="reportrange" class="dtrange">                                            
                        <span></span><b class="caret"></b>
                    </div>                                     
                </li>                                
                <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
            </ul>                                    

        </div>
        <div class="panel-body">                                    
            <div class="row stacked">
                <div class="col-md-12">                                            
                    <div class="box box-primary">
                        <div class="box-header with-border">
                         <div class="box-header with-border">
                             <h3 class="box-title">Tambah Petugas Lapangan</h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                          <form method="post" action="tambah_user.php">

                              <div class="form-group col-md-12">
                                <label for="nama" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="email" name="email">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="email" name="email">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                </div>
                            </div>
                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                          <div class="form-group col-md-12">
                              <input type="hidden" class="form-control" name="id_user" value="<?php echo $iduser?>">
                          </div>
                      </form>
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /. box -->
          </div>
          <!-- /.col -->
      </div>
      <!-- tulis code disini -->

  </div>
</div>                                    
</div>
</div>
<!-- END SALES BLOCK -->
</div>