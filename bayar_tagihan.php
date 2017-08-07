<?php

require_once 'config/Koneksi.php';

$db = new Koneksi();
$koneksi = $db->getConnection();

require_once 'class/Login.php';
require_once 'class/Html.php';

$login = new Login($koneksi);
$html = new html;
if ($login->isBayarTrsLogin() == TRUE){
?>
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
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
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
            <i class="fa fa-dashboard"></i> <span>Bayar Tagihan</span>
          </a>
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
        if (isset($_GET['form'])){
        	if ($_GET['form'] == "bukti_pembayaran") {
        ?>

        <div class="col-md-12">
        	<form action="?form=save_bukti_pembayaran" method="post" enctype="multipart/form-data">
        		<label>Upload Bukti Pembayaran</label>
        		<div class="form-group">
        			<input type="hidden" name="sewa_id" class="form-control floating-label" placeholder="" value="<?php echo $_GET['sewa_id']; ?>" required>
        			<input type="file" name="trf_sewa" class="form-control floating-label" required>
        		</div>
        		<div class="form-group">
        			<div class="pull-left">
			            <input type="submit" class="btn btn-embossed btn-primary m-r-20" value="Upload" name="submit">
			            <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
			          </div>
        		</div>	
        	</form>
        </div>
        <?php
    		}
    		if ($_GET['form'] == "save_bukti_pembayaran") {
    		  require_once 'class/Transaksi.php';
			  $Transaksi = new Transaksi();
			  $save = $Transaksi->change_data_byr_trs($_POST,$_FILES);
			  // print_r($_FILES);

			  $html->redirect('bayar_tagihan.php');
    		}
        }else{

        ?>
        <div class="col-md-12">
        <div class="panel-header md-panel-controls">
		    <h3><i class="fa fa-table"></i> Transaksi Bayar Sewa <b><?php echo $_SESSION['username']; ?></b></h3>
		  </div>
		  <div class="panel-content pagination2 table-responsive">
		    <table id="example1" class="table table-bordered table-striped">
		      <thead>
		        <tr>
		          <th>No.</th>
		          <!-- <th>No Register</th> -->
		          <th>Nama Penyewa</th>
		          <th>No Kamar</th>
		          <th>Tanggal Sewa</th>
		          <th>Biaya Sewa</th>
		          <th>Denda Terlambat</th>
		          <th>Total Bayar</th>
		          <th>Uang Bayar</th>
		          <th>Uang Kembali</th>
		          <th>Cara Bayar</th>
		          <th>Action</th>
		        </tr>
		      </thead>
		      <tbody>
		        <?php 
		        require_once 'class/Transaksi.php';
		        $transaksi = new Transaksi();

		        $get_transaksi = $transaksi->showtransaksiBayar();
		        $no = 1;
		         error_reporting(0);
		        foreach ($get_transaksi as $transaksi) {
		         $kembali = $transaksi['uang_bayar'] - $transaksi['total_bayar'];
		         echo "<tr>";
		         echo "<td>".$no++."</td>";
		         // echo "<td>REG-".$transaksi['no_register']."</td>";
		         echo "<td>".$transaksi['nama']."</td>";
		         echo "<td>".$transaksi['kamar_id']."</td>";
		         echo "<td>".$transaksi['tgl_sewa']."</td>";
		         echo "<td>".$transaksi['biaya_sewa']."</td>";
		         echo "<td>".$transaksi['denda_terlambat']."</td>";
		         echo "<td>".$transaksi['total_bayar']."</td>";
		         echo "<td>".$transaksi['uang_bayar']."</td>";
		         echo "<td>".$kembali."</td>";
		         echo "<td>".$transaksi['cara_bayar']."</td>";


		         echo '<td class=""><a class="delete btn btn-sm btn-primary" href="?form=bukti_pembayaran&sewa_id='.$transaksi['id'].'">Upload Bukti Pembayaran</a>
		         </td>';
		         echo "</tr>";
		       }
		       ?>
		     </tbody>
		   </table>
		 </div>
		 </div>
        <?php } ?>
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
                  'url' : '/kost_riendra/api_laporan_data_penyewa.php',
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
                  'url' : '/kost_riendra/api_laporan_data_sewa.php',
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
                  'url' : '/kost_riendra/api_laporan_data_kamar.php',
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
<?php 
} 

else {
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Kost Riendra</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="assets/global/images/favicon.png">

        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
          <div class="login-logo">
            <a href="../../index2.html"><b>Bayar Tagihan KOST </b>Ragunan residence</a>
          </div>
          <div class="login-box-body">
            <p class="login-box-msg">Silahkan Login</p>

            <form class="well" action="bayar_tagihan.php" method="post">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name="user__name" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                    <label>
                      <input type="checkbox"> Remember Me
                    </label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <input class="btn btn-primary btn-block btn-flat" type="submit" name="trslogin" value="Sign In">
                </div>
              </div>
            </form>
            
          </div>
        </div>
        <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../plugins/iCheck/icheck.min.js"></script>
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
            });
          });
        </script>
    </body>
</html>

<?php } ?>