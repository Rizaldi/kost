<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard ::: Kost Ragunan Residence</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="assets/plugins/iCheck/flat/blue.css">
      <!-- Morris chart -->
      <link rel="stylesheet" href="assets/plugins/morris/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    </head>
        <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>KOST </b>Ragunan Residence</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['username']; ?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li><a href="?page=penyewa"><i class="icon-home"></i><span>Penyewa</span></a></li>
        <li><a href="?page=setting_kost"><i class="fa fa-edit"></i><span>Setting Kost</span></a></li>
        <li><a href="?page=transaksi_bayar_sewa"><i class="glyphicon glyphicon-th"></i><span>Transaksi Bayar Sewa</span></a></li>
        <li><a href="?page=kamar"><i class="glyphicon glyphicon-home"></i><span>Kamar</span></a></li>
        <li><a href="?page=transaksi_bayar_tagihan"><i class="glyphicon glyphicon-share"></i><span>Transaksi Bayar Tagihan</span></a></li>
        <li><a href="?page=inventaris"><i class="glyphicon glyphicon-file"></i><span>Inventaris</span></a></li>
        <li><a href="?page=transaksi_inventaris"><i class="glyphicon glyphicon-usd"></i><span>Transaksi Inventaris</span></a></li>
        <li><a href="?page=cek_in_out"><i class="glyphicon glyphicon-sort"></i><span>Cek In / Cek Out</span></a></li>
        <li><a href="?page=transaksi_pengeluaran"><i class="glyphicon glyphicon-refresh"></i><span>Transaksi Pengeluaran</span></a></li>
        <!-- <li><a href="?page=daftar_tagihan"><i class="glyphicon glyphicon-search"></i><span>Daftar Tagihan</span></a></li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Daftar Tagihan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=daftar_tagihan_bulanan"><i class="fa fa-circle-o"></i> Tagihan Bulanan</a></li>
            <!-- <li><a href="?page=daftar_tagihan_harian_mingguan"><i class="fa fa-circle-o"></i> Tagihan Harian</a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Utility</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=user"><i class="fa fa-circle-o"></i> Users</a></li>
          </ul>
        </li>
        <li><a href="?page=info_jatuh_tempo"><i class="glyphicon glyphicon-info-sign"></i><span>Info Jatuh Tempo</span></a></li>
        <!-- <li><a href="?page=deposit_penyewa"><i class="glyphicon glyphicon-signal"></i><span>Deposit Penyewa</span></a></li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=laporan_data_penyewa"><i class="fa fa-circle-o"></i> Data Penyewa</a></li>
            <li><a href="?page=laporan_data_kamar"><i class="fa fa-circle-o"></i> Data Kamar</a></li>
            <li><a href="?page=laporan_data_sewa"><i class="fa fa-circle-o"></i> Data Pembayaran Sewa</a></li>
            <li><a href="?page=laporan_data_tagihan"><i class="fa fa-circle-o"></i> Data Pembayaran Tagihan Bulanan</a></li>
            <!-- <li><a href="?page=laporan_data_kas"><i class="fa fa-circle-o"></i> Data Kas Masuk dan Keluar</a></li> -->
            <li><a href="?page=laporan_data_deposit"><i class="fa fa-circle-o"></i> Rekap Deposit</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo @str_replace("_", " ", $_GET['page']) ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php
        if (isset($_GET['page'])){
            if (file_exists($_GET['page'].".php")){
                require ($_GET['page'].".php");
            }
            else {
                require ("views/empty.php");
            }
        }
        ?>
      </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
        <script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="assets/dist/js/jquery-ui.min.js"></script>
        <script>
          $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/plugins/knob/jquery.knob.js"></script>
        <!-- datepicker -->
        <script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="assets/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/app.min.js"></script>
        <script src="assets/dist/js/webcam.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="assets/dist/js/demo.js"></script>
        <script src="assets/plugins/rupiah/inputmask.js" type="text/javascript"></script>
        <script src="assets/plugins/rupiah/jquery.inputmask.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js">
        </script>
        <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js">
        </script>
        <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js">
        </script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js">
        </script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js">
        </script>
        <script type="text/javascript" language="javascript" src="assets/plugins/jquery-validation/js/jquery.validate.min.js">
        </script>
        <script>
          $(function(){
            //give the php file path
            webcam.set_api_url( 'saveimage.php' );
            webcam.set_swf_url( 'scripts/webcam.swf' );
            webcam.set_quality( 100 ); // Image quality (1 - 100)
            webcam.set_shutter_sound( true ); // play shutter click sound

            var camera = $('#camera');
            camera.html(webcam.get_html(600, 460));

            $('#capture_btn').click(function(){
              //take snap
              webcam.snap();
            });

            //after taking snap call show image
            webcam.set_hook( 'onComplete', function(img){
              $('#show_saved_img').html('<img src="' + img + '">');
              //reset camera for next shot
              webcam.reset();
            });

          });
          </script>
        <script>
          $(function () {
            $('#example1').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false
            });
            $('#laporan_data_kamar').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false
            });
            
            $( "#datepicker-start,#datepicker-end,#tanggal,#tanggal_progress" ).datepicker();

            $(document).ready(function(){
            $("#price").inputmask('Rp 999.999.999.999.999', { numericInput: true });
          });
            $("#nama_project").on('change', function(event) {
              event.preventDefault();
              var id = $("#nama_project").val();
              $.ajax({
                url: 'json/json_jadwal_bahan_baku.php',
                type: 'POST',
                dataType: 'json',
                data: {project_id: id},
              })
              .done(function(data) {
                var datas = "";
                for(var i in data){
                  datas +="<option value='"+data[i]['id']+"'>"+data[i]['nama_kegiatan']+"</option>";
                }
                $("#nama_kegiatan").html(datas);
              })
              .fail(function() {
                console.log("error");
              })
              .always(function() {
                console.log("complete");
              });
              
            });
          });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
          $("#form_penyewa").validate({
            rules: {
                startDate: "required",
                endDate: "required",
            },
            messages: {
                startDate: "Please enter your startDate",
                endDate: "Please enter your endDate",

            },
            submitHandler: function(form) {
              console.log(form);
              if($.fn.dataTable.isDataTable('#laporan_data_penyewa')){
                $('#laporan_data_penyewa').DataTable().clear();
                $('#laporan_data_penyewa').DataTable().destroy();
              }

              var startDate = $('#startDate').val();
              var endDate = $('#endDate').val();
              var filter={
                  'startDate' : startDate,
                  'endDate' : endDate
                };
              $('#laporan_data_penyewa').DataTable({
                
                processing : true,
                searching : false,
                scrollX : true,
                
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax : {
                  'url' : '/ragunan_residence/api_laporan_data_penyewa.php',
                  'type' : 'POST',
                  'data' : filter
                }
              });
            }
          });
        });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
          $("#form_tempo").validate({
            rules: {
                startDate: "required",
                endDate: "required",
            },
            messages: {
                startDate: "Please enter your startDate",
                endDate: "Please enter your endDate",

            },
            submitHandler: function(form) {
              console.log(form);
              if($.fn.dataTable.isDataTable('#laporan_data_tempo')){
                $('#laporan_data_tempo').DataTable().clear();
                $('#laporan_data_tempo').DataTable().destroy();
              }

              var startDate = $('#startDate').val();
              var endDate = $('#endDate').val();
              var filter={
                  'startDate' : startDate,
                  'endDate' : endDate
                };
              $('#laporan_data_tempo').DataTable({
                
                processing : true,
                searching : false,
                scrollX : true,
                
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax : {
                  'url' : '/ragunan_residence/api_laporan_data_tempo.php',
                  'type' : 'POST',
                  'data' : filter
                }
              });
            }
          });
        });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
          $("#form_tagihan").validate({
            rules: {
                startDate: "required",
                endDate: "required",
            },
            messages: {
                startDate: "Please enter your startDate",
                endDate: "Please enter your endDate",

            },
            submitHandler: function(form) {
              console.log(form);
              if($.fn.dataTable.isDataTable('#laporan_data_tagihan')){
                $('#laporan_data_tagihan').DataTable().clear();
                $('#laporan_data_tagihan').DataTable().destroy();
              }

              var startDate = $('#startDate').val();
              var endDate = $('#endDate').val();
              var filter={
                  'startDate' : startDate,
                  'endDate' : endDate
                };
              $('#laporan_data_tagihan').DataTable({
                
                processing : true,
                searching : false,
                scrollX : true,
                
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax : {
                  'url' : '/ragunan_residence/api_laporan_data_tagihan.php',
                  'type' : 'POST',
                  'data' : filter
                }
              });
            }
          });
        });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
          $("#form_sewa").validate({
            rules: {
                startDate: "required",
                endDate: "required",
            },
            messages: {
                startDate: "Please enter your startDate",
                endDate: "Please enter your endDate",

            },
            submitHandler: function(form) {
              console.log(form);
              if($.fn.dataTable.isDataTable('#laporan_data_sewa')){
                $('#laporan_data_sewa').DataTable().clear();
                $('#laporan_data_sewa').DataTable().destroy();
              }

              var startDate = $('#startDate').val();
              var endDate = $('#endDate').val();
              var filter={
                  'startDate' : startDate,
                  'endDate' : endDate
                };
              $('#laporan_data_sewa').DataTable({
                
                processing : true,
                searching : false,
                scrollX : true,
                
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax : {
                  'url' : '/ragunan_residence/api_laporan_data_sewa.php',
                  'type' : 'POST',
                  'data' : filter
                }
              });
            }
          });
        });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
          $("#form_kamar").validate({
            rules: {
                startDate: "required",
                endDate: "required",
            },
            messages: {
                startDate: "Please enter your startDate",
                endDate: "Please enter your endDate",

            },
            submitHandler: function(form) {
              console.log(form);
              if($.fn.dataTable.isDataTable('#laporan_data_kamar')){
                $('#laporan_data_kamar').DataTable().clear();
                $('#laporan_data_kamar').DataTable().destroy();
              }

              var status = $('#status').val();
              var filter={
                  'status' : status
                };
              $('#laporan_data_kamar').DataTable({
                
                processing : true,
                searching : false,
                scrollX : true,
                
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                ajax : {
                  'url' : '/ragunan_residence/api_laporan_data_kamar.php',
                  'type' : 'POST',
                  'data' : filter
                }
              });
            }
          });
        });
        </script>
    </body>
</html>