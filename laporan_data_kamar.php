<?php if (!@$_GET['form']): ?>
<form class="" id="form_kamar" action="#" method="post">
  <div class="col-md-12">
    <div class="pull-left" style="padding-right:10px;">
      <select class="form-control" id="status">
        <option value="all">All</option>
        <option value="terpakai">terpakai</option>
        <option value="kosong">kosong</option>
      </select>
    </div>
    <div class="pull-left" style="padding-right:10px;">
    	<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Proses</button>
    </div>
  </div>
</form>
  <div class="col-md-2">
    
  </div>
<?php endif ?>
<div class="col-md-12">
  <?php if (isset($_GET['form'])): ?>
  <?php if ($_GET['form'] == "change_penyewa"): ?>
  <?php
    @$get_penyewa = $koneksi->query("SELECT * FROM transaksi_bayar_penyewa where id = '".$_GET['penyewa_id']."'");
    @$row_penyewa = mysqli_fetch_assoc($get_penyewa);
  ?>
  <form action="?page=penyewa&form=save_penyewa" method="post">
        <div class="form-group m-b-30">
          <input type="text" name="no_register" class="form-control floating-label" placeholder="no register">
        </div>
        <div class="form-group m-b-30">
          <input type="date" name="tgl_lahir" class="form-control floating-label" placeholder="tgl lahir">
        </div>
        <div class="form-group m-b-30">
          <input type="text" name="tempat_lahir" class="form-control floating-label" placeholder="tempat lahir">
        </div>
        <div class="form-group m-b-30">
          <textarea class="form-control" name="alamat" placeholder="alamat"></textarea>
        </div>
        <div class="form-group m-b-30">
          <select class="form-control">
            <option value="laki_laki">Laki Laki</option>
            <option value="perempuan">Perempuan</option>
          </select>
        </div>
        <div class="form-group m-b-30">
          <input type="text" name="ID_pengenal" class="form-control floating-label" placeholder="ID pengenal">
        </div>
        <div class="form-group m-b-30">
          <input type="text" name="jenis_pengenal" class="form-control floating-label" placeholder="jenis pengenal">
        </div>
        <div class="form-group m-b-30">
          <input type="text" name="hp" class="form-control floating-label" placeholder="hp">
        </div>
        <div class="form-group m-b-30">
          <select name="agama" class="form-control">
            <option>Islam</option>
            <option>Kristen</option>
            <option>Hindu</option>
            <option>Budha</option>
          </select>  
        </div>
        <div class="form-group m-b-30">
          <input type="text" name="status" class="form-control floating-label" placeholder="status">
        </div>
        <div class="form-group m-b-30">
          <input type="text" name="pekerjaan" class="form-control floating-label" placeholder="pekerjaan">
        </div>
        <div class="form-group m-b-30">
          <input type="date" name="tanggal_masuk" class="form-control floating-label" placeholder="tanggal_masuk">
        </div>
        <div class="form-group m-b-30">
          <div id="camera_wrapper">
          <div id="camera"></div>
          <br />
          <button id="capture_btn">Capture</button>
          </div>
          <div id="show_saved_img" ></div>
        </div>
        <div class="col-sm-9 col-sm-offset-3">
          <div class="pull-right">
            <input type="submit" class="btn btn-embossed btn-primary m-r-20" value="save">
            <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
          </div>
        </div>
      </form>
<?php endif ?>
<?php if ($_GET['form'] == "update_penyewa"): ?>
  <?php 
  require_once 'class/Transaksi.php';
  $Transaksi = new Transaksi();
  $data['penyewa_id'] = $_POST['penyewa_id'];
  $data['no_bukti'] = $_POST['no_bukti'];
  $data['kamar_id'] = $_POST['no_kamar'];
  $data['nama'] = $_POST['nama'];
  $data['tgl_penyewa'] = $_POST['tanggal_penyewa'];
  $data['biaya_penyewa_perbulan'] = $_POST['biaya_penyewa_perbulan'];
  $data['denda_terlambat'] = $_POST['denda_terlambat'];
  $data['total_bayar'] = $_POST['total_bayar'];
  $data['uang_bayar'] = $_POST['uang_bayar'];
  $data['uang_kembali'] = $_POST['uang_kembali'];
  $data['cara_bayar'] = $_POST['cara_bayar'];
  $data['tanggal_bayar'] = $_POST['tanggal_bayar'];
  $save = $Transaksi->change_data_penyewa($data);
  ?>
<?php endif ?>
<?php else: ?>
  <div class="panel-header md-panel-controls">
    <h3><i class="fa fa-table"></i> <strong>Data </strong> Kamar</h3>
  </div>
  <div class="panel-content pagination2 table-responsive">
    <table id="laporan_data_kamar" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>No Kamar</th>
          <th>Tarif Sewa Perbulan</th>
          <th>Tarif Sewa Perminggu</th>
          <th>Tarif Sewa Perhari</th>
          <th>Denda Sewa Bulanan</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        require_once 'class/Kamar.php';
        $kamar = new Kamar();

        $get_kamar = $kamar->showkamar();
        $no = 1;
        foreach ($get_kamar as $kamar) {
          echo "<tr>";
          echo "<td>".$no++."</td>";
          echo "<td>REG-".$kamar['no_kamar']."</td>";
          echo "<td>".$kamar['trf_sewa_bulanan']."</td>";
          
          echo "<td>".$kamar['trf_sewa_mingguan']."</td>";
          echo "<td>".$kamar['trf_sewa_harian']."</td>";
          echo "<td>".$kamar['denda_sewa_bulanan']."</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
  </div>
<?php endif ?>
</div>
</div>

`