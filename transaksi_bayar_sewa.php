<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <a href="?page=transaksi_bayar_sewa&form=change_bayar_sewa" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add Bayar Sewa<div class="ripple-wrapper"></div></a>
    </div>
  </div>
<?php endif ?>
<div class="col-md-12">
  <?php if (isset($_GET['form'])): ?>
  <?php if ($_GET['form'] == "change_bayar_sewa"): ?>
  <?php
    @$get_sewa = $koneksi->query("SELECT * FROM transaksi_bayar_sewa where id = '".$_GET['sewa_id']."'");
    @$row_sewa = mysqli_fetch_assoc($get_sewa);
  ?>
  <form action="?page=transaksi_bayar_sewa&form=update_sewa" method="post">
      <label>No Bukti</label>
      <div class="form-group m-b-30">
        <input type="hidden" name="sewa_id" class="form-control floating-label" placeholder="id" value="<?php echo $row_sewa['id']; ?>">
        <input type="text" name="no_bukti" class="form-control floating-label" placeholder="no_bukti" value="<?php echo $row_sewa['no_bukti']; ?>" required>
      </div>
      <label>tanggal bayar</label>
      <div class="form-group m-b-30">
        <input type="date" name="tanggal_bayar" class="form-control floating-label" placeholder="tanggal_bayar"  value="<?php echo date("d/m/Y",strtotime($row_tagihan['tanggal_bayar'])); ?>" required>
      </div>
      <label>No Kamar</label>
        <div class="form-group m-b-30">
          <select class="form-control" name="kamar_id">
          <?php 
            require_once 'class/Kamar.php';
              $Kamar = new Kamar();

              $get_Kamar = $Kamar->showKamar();
              $no = 1;
              foreach ($get_Kamar as $Kamar) {
                echo "<option value='".$Kamar['id']."' >".$Kamar['no_kamar']."</option>";
              }
          ?>
          </select>
        </div>
        <label>Nama</label>
        <div class="form-group m-b-30">
        <select class="form-control" name="penyewa_id">
          <?php 
            require_once 'class/Penyewa.php';
              $Penyewa = new Penyewa();

              $get_Penyewa = $Penyewa->showPenyewa();
              $no = 1;
              foreach ($get_Penyewa as $Penyewa) {
                echo "<option value='".$Penyewa['id']."' >".$Penyewa['nama']."</option>";
              }
          ?>
          </select>
        </div>
      <label>Tanggal Sewa</label>
      <div class="form-group m-b-30">
        <input type="date" name="tanggal_sewa" class="form-control floating-label" placeholder="tanggal_sewa"  value="<?php echo date("d/m/Y",strtotime($row_tagihan['tgl_sewa'])); ?>" required>
      </div>
      <label>Biaya Sewa Perbulan</label>
      <div class="form-group m-b-30">
        <input type="number" name="biaya_sewa_perbulan" class="form-control floating-label" placeholder="biaya_sewa_perbulan" value="<?php echo $row_sewa['biaya_sewa']; ?>" required>
      </div>
      <label>Denda Terlambat</label>
      <div class="form-group m-b-30">
        <input type="number" name="denda_terlambat" class="form-control floating-label" placeholder="denda_terlambat" value="<?php echo $row_sewa['denda_terlambat']; ?>" required>
      </div>
      <label>Total Bayar</label>
      <div class="form-group m-b-30">
        <input type="number" name="total_bayar" class="form-control floating-label" placeholder="total_bayar" value="<?php echo $row_sewa['total_bayar']; ?>" required>
      </div>
      <label>Cara Bayar</label>
      <div class="form-group m-b-30">
        <select class="form-control" name="cara_bayar">
          <option value="deposit">deposit</option>
          <option value="cash">cash</option>
          <option value="bank">bank</option>
        </select> 
      </div>
      <label>Uang Bayar</label>
      <div class="form-group m-b-30">
        <input type="number" name="uang_bayar" class="form-control floating-label" placeholder="uang_bayar" value="<?php echo $row_sewa['uang_bayar']; ?>" required>
      </div>
      <label>Uang Kembali</label>
      <div class="form-group m-b-30">
        <input type="number" name="uang_kembali" class="form-control floating-label" placeholder="uang_kembali" value="<?php echo $row_sewa['uang_kembali']; ?>" required>
      </div>
      <div class="col-sm-9 col-sm-offset-3">
      <div class="pull-right">
        <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
        <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
      </div>
    </div>
  </form>
<?php endif ?>
<?php if ($_GET['form'] == "update_sewa"): ?>
  <?php 
  require_once 'class/Transaksi.php';
  $Transaksi = new Transaksi();
  $data['sewa_id'] = $_POST['sewa_id'];
  $data['no_bukti'] = $_POST['no_bukti'];
  $data['kamar_id'] = $_POST['kamar_id'];
  $data['nama'] = $_POST['penyewa_id'];
  $data['tgl_sewa'] = $_POST['tanggal_sewa'];
  $data['biaya_sewa_perbulan'] = $_POST['biaya_sewa_perbulan'];
  $data['denda_terlambat'] = $_POST['denda_terlambat'];
  $data['total_bayar'] = $_POST['total_bayar'];
  $data['uang_bayar'] = $_POST['uang_bayar'];
  $data['uang_kembali'] = $_POST['uang_kembali'];
  $data['cara_bayar'] = $_POST['cara_bayar'];
  $data['tanggal_bayar'] = $_POST['tanggal_bayar'];
  $save = $Transaksi->change_data_sewa($data);
    // print_r($_POST);
    if ($data['proyek_id'] == null) {
      $html->redirect('?page=transaksi_bayar_sewa&success=1');
    } else {
      $html->redirect('?page=data_anggaran&success=2');
    }
  ?>
<?php endif ?>
<?php if ($_GET['form'] == "delete_bayar_sewa"): ?>
  <?php 
  require_once 'class/Transaksi.php';
  $Transaksi = new Transaksi();
  
  $save = $Transaksi->delete_data_sewa($_GET);
    // print_r($_GET);
    if ($data['proyek_id'] == null) {
      $html->redirect('?page=transaksi_bayar_sewa&success=1');
    } else {
      $html->redirect('?page=data_anggaran&success=2');
    }
  ?>
<?php endif ?>
<?php else: ?>
  <div class="panel-header md-panel-controls">
    <h3><i class="fa fa-table"></i> <strong>Data </strong> Transaksi Bayar Sewa</h3>
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
          <th>Tanggal Bayar</th>
          <th>Bukti Transfer</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        require_once 'class/Transaksi.php';
        $transaksi = new Transaksi();

        $get_transaksi = $transaksi->showtransaksi();
        $no = 1;
        foreach ($get_transaksi as $transaksi) {
         $kembali = $transaksi['uang_bayar'] - $transaksi['total_bayar'];
         echo "<tr>";
         echo "<td>".$no++."</td>";
         // echo "<td>REG-".$transaksi['no_register']."</td>";
         echo "<td>".$transaksi['nama']."</td>";
         echo "<td>".$transaksi['no_kamar']."</td>";
         echo "<td>".$transaksi['tgl_sewa']."</td>";
         echo "<td>".$transaksi['biaya_sewa']."</td>";
         echo "<td>".$transaksi['denda_terlambat']."</td>";
         echo "<td>".$transaksi['total_bayar']."</td>";
         echo "<td>".$transaksi['uang_bayar']."</td>";
         echo "<td>".$kembali."</td>";
         echo "<td>".$transaksi['cara_bayar']."</td>";
         echo "<td>".$transaksi['tanggal_bayar']."</td>";
         echo "<td>";
         echo ($transaksi['bukti_pembayaran'] == null) ? ' Belum Bayar ' : "<img src='uploads/".$transaksi['bukti_pembayaran']."' style='width:100px;height:100px;'></img>" ;
         echo "</td>";         


         echo '<td class=""><a class="delete btn btn-sm btn-default" href="?page=transaksi_bayar_sewa&form=change_bayar_sewa&sewa_id='.$transaksi['id_sewa'].'"><i class="fa fa-edit"></i></a><a class="delete btn btn-sm btn-danger" href="?page=transaksi_bayar_sewa&form=delete_bayar_sewa&sewa_id='.$transaksi['id_sewa'].'"><i class="fa fa-remove"></i></a>
         </td>';
         echo "</tr>";
       }
       ?>
     </tbody>
   </table>
 </div>
<?php endif ?>
</div>
</div>