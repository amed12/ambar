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
$level=mysqli_query($koneksi, "SELECT l.level FROM usr_ambar u,level l where u.id_level=l.id_level AND id_user = $iduser");

$lev=mysqli_fetch_array($level);

$row = mysqli_fetch_array($coba);

$namauser=$row['nama_user'];
$iduse=$row['id_user'];
$kategori=$row['kategori'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMBAR - Project</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- SweetAlert  style -->
    <link rel="stylesheet" href="plugins/sweetalert/sweetalert.css">

    <!-- responsive datatables -->
    <link rel="stylesheet" href="plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">



  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>MBAR</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>AMBAR</b>Project</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo $namauser;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                      <?php echo $namauser;?> - <?php echo $nimmah ?>
                      <small>Teknik Informatika-2014 UIN Maulana Malik Ibrahim</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/worker.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $namauser;?></p>
              <?php echo $lev['level']; ?>
            </div>
          </div>

          <?php 
          if($lev['level']=='admin'){
            include "menu-admin.php";
          }

          if($lev['level']=='petugas'){
            include "menu-pekerja_lap.php";
          }

          ?>

        </section>
        <!-- /.sidebar -->
      </aside>


      <div class="content-wrapper">
        <?php
        $file="$p.php";
        $cek=strlen($p);
        if ($cek>30||!file_exists($file)||empty($p)) {
         include ("real.php");

       } else {
         include ($file);
       } 
       ?>
     </div><!-- /.content-wrapper -->

     <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> beta
      </div>
      <strong>Copyright &copy; 2017 <a href="#">Ambar - Project</a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-user bg-yellow"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>
                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul><!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript::;">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>
                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul><!-- /.control-sidebar-menu -->

        </div><!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>
            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Some information about this general settings option
              </p>
            </div><!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Other sets of options are available
              </p>
            </div><!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Allow the user to show his name in blog posts
              </p>
            </div><!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div><!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div><!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div><!-- /.form-group -->
          </form>
        </div><!-- /.tab-pane -->
      </div>
    </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- SweetAlert -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Bootstrap-notify -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../../bootstrap-datepicker.js"></script>

    <script src="supplier/customer.js"></script>
     <script src="chart/Chart.js" ></script>
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
  </body>
  </html>
