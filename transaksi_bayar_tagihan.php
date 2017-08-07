<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <a href="?page=transaksi_bayar_tagihan&form=change_bayar_tagihan" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add Bayar tagihan<div class="ripple-wrapper"></div></a>
    </div>
  </div>
<?php endif ?>
<div class="col-md-12">
  <?php if (isset($_GET['form'])): ?>
  <?php if ($_GET['form'] == "change_bayar_tagihan"): ?>
  <?php
    @$get_tagihan = $koneksi->query("SELECT * FROM transaksi_bayar_tagihan where id = '".$_GET['tagihan_id']."'");
    @$row_tagihan = mysqli_fetch_assoc($get_tagihan);
  ?>
  <form action="?page=transaksi_bayar_tagihan&form=update_tagihan" method="post">
      <label>No Bukti</label>
      <div class="form-group m-b-30">
        <input type="hidden" name="tagihan_id" class="form-control floating-label" placeholder="id"  value="<?php echo $row_tagihan['id']; ?>">
        <input type="text" name="no_bukti" class="form-control floating-label" placeholder="no_bukti" value="<?php echo $row_tagihan['no_bukti']; ?>" required>
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
      <label>Jumlah Tagihan</label>
      <div class="form-group m-b-30">
        <input type="number" name="jumlah_tagihan" class="form-control floating-label" placeholder="jumlah_tagihan"  value="<?php echo $row_tagihan['jumlah_tagihan']; ?>" required>
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
        <input type="number" name="uang_bayar" class="form-control floating-label" placeholder="uang_bayar"  value="<?php echo $row_tagihan['uang_bayar']; ?>" required>
      </div>
      <label>Uang Kembali</label>
      <div class="form-group m-b-30">
        <input type="number" name="uang_kembali" class="form-control floating-label" placeholder="uang_kembali"  value="<?php echo $row_tagihan['uang_kembali']; ?>" required>
      </div>
      <label>Tagihan Untuk Bulan</label>
      <div class="form-group m-b-30">
          <select id="" name="tagihan_bulan" class="form-control"> 
            <option value="January">January</option>       
            <option value="February">February</option>       
            <option value="March">March</option>       
            <option value="April">April</option>       
            <option value="May">May</option>       
            <option value="June">June</option>       
            <option value="July">July</option>       
            <option value="August">August</option>       
            <option value="September">September</option>       
            <option value="October">October</option>       
            <option value="November">November</option>       
            <option value="December">December</option>       
          </select>
      </div>
      <div class="col-sm-9 col-sm-offset-3">
      <div class="pull-right">
        <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
        <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
      </div>
    </div>
  </form>
<?php endif ?>
<?php if ($_GET['form'] == "update_tagihan"): ?>
  <?php 
  require_once 'class/Transaksi.php';
  $Transaksi = new Transaksi();
  $save = $Transaksi->change_data_tagihan($_POST);
    // print_r($_POST);
    if ($_POST['tagihan_id'] == null) {
      $html->redirect('?page=transaksi_bayar_tagihan&success=1');
    } else {
      $html->redirect('?page=transaksi_bayar_tagihan&success=2');
    }
  ?>
<?php endif ?>
<?php if ($_GET['form'] == "delete_bayar_tagihan"): ?>
  <?php 
  require_once 'class/Transaksi.php';
  $Transaksi = new Transaksi();
  $save = $Transaksi->delete_data_tagihan($_GET);
    // print_r($_GET);
    if ($_POST['tagihan_id'] == null) {
      $html->redirect('?page=transaksi_bayar_tagihan&success=1');
    } else {
      $html->redirect('?page=transaksi_bayar_tagihan&success=2');
    }
  ?>
<?php endif ?>
<?php else: ?>
  <div class="panel-header md-panel-controls">
    <h3><i class="fa fa-table"></i> <strong>Data </strong> Transaksi Bayar Tagihan</h3>
  </div>
  <div class="panel-content pagination2 table-responsive">
    <table id="example1" class="table table-hover table-dynamic">
      <thead>
        <tr>
          <th>No.</th>
          <!-- <th>No Register</th> -->
          <th>Nama Penyewa</th>
          <th>No Kamar</th>
          <th>Jumlah Tagihan</th>
          <th>Uang Bayar</th>
          <th>Uang Kembali</th>
          <th>Cara Bayar</th>
          <th>Tagihan Bulan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        require_once 'class/Transaksi.php';
        $transaksi = new Transaksi();

        $get_transaksi = $transaksi->showTransaksiBayarTagihan();
        $no = 1;
        foreach ($get_transaksi as $transaksi) {
         $kembali = $transaksi['uang_bayar'] - $transaksi['jumlah_tagihan'];
         echo "<tr>";
         echo "<td>".$no++."</td>";
         // echo "<td>REG-".$transaksi['no_register']."</td>";
         echo "<td>".$transaksi['nama']."</td>";
         echo "<td>".$transaksi['no_kamar']."</td>";
         echo "<td>".$transaksi['jumlah_tagihan']."</td>";
         echo "<td>".$transaksi['uang_bayar']."</td>";
         echo "<td>".$kembali."</td>";
         echo "<td>".$transaksi['cara_bayar']."</td>";
         echo "<td>".$transaksi['tagihan_bulan']."</td>";
         echo '<td class=""><a class="delete btn btn-sm btn-default" href="?page=transaksi_bayar_tagihan&form=change_bayar_tagihan&tagihan_id='.$transaksi['tagihan_id'].'"><i class="fa fa-edit"></i></a><a class="delete btn btn-sm btn-danger" href="?page=transaksi_bayar_tagihan&form=delete_bayar_tagihan&tagihan_id='.$transaksi['tagihan_id'].'"><i class="fa fa-remove"></i></a>
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