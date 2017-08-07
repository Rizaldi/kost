
<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <a href="?page=daftar_tagihan_bulanan&form=change_tagihan_bulanan" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add tagihan_bulanan<div class="ripple-wrapper"></div></a>
    </div>
  </div>
<?php endif ?>
</div>
<div class="col-md-12">
  <?php if (isset($_GET['form'])): ?>
  <?php if ($_GET['form'] == "change_tagihan_bulanan"): ?>
  <?php
    @$get_tagihan_bulanan = $koneksi->query("SELECT * FROM tagihan_bulanan where id = '".$_GET['tagihan_bulanan_id']."'");
    @$row_tagihan_bulanan = mysqli_fetch_assoc($get_tagihan_bulanan);
  ?>
  <form action="?page=daftar_tagihan_bulanan&form=update_tagihan_bulanan" method="post">
    <label>No Kamar</label>
    <div class="form-group m-b-30">
      <input type="hidden" name="bulanan_id" class="form-control floating-label" placeholder="" value="<?php echo $row_tagihan_bulanan['id']; ?>" required>
      <!-- <input type="text" name="kamar_id" class="form-control floating-label" placeholder="" value="<?php echo $row_tagihan_bulanan['kamar_id']; ?>" required> -->
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
    </div>
    <label>jenis tagihan</label>
    <div class="form-group m-b-30">
      <input type="text" name="jenis_tagihan" class="form-control floating-label" placeholder="" value="<?php echo $row_tagihan_bulanan['jenis_tagihan']; ?>" required>
    </div>
    <label>jumlah bayar</label>
    <div class="form-group m-b-30">
      <input type="text" name="jumlah_bayar" class="form-control floating-label" placeholder="" value="<?php echo $row_tagihan_bulanan['jumlah_bayar']; ?>" required>
    </div>
    <label>Tagihan Untuk Bulan</label>
      <div class="form-group m-b-30">
          <select id="" name="tagihan_bulanan" class="form-control"> 
            <option value="<?php echo date("Y-")."01-".date("d"); ?>">January</option>       
            <option value="<?php echo date("Y-")."02-".date("d"); ?>">February</option>       
            <option value="<?php echo date("Y-")."03-".date("d"); ?>">March</option>       
            <option value="<?php echo date("Y-")."04-".date("d"); ?>">April</option>       
            <option value="<?php echo date("Y-")."05-".date("d"); ?>">May</option>       
            <option value="<?php echo date("Y-")."06-".date("d"); ?>">June</option>       
            <option value="<?php echo date("Y-")."07-".date("d"); ?>">July</option>       
            <option value="<?php echo date("Y-")."08-".date("d"); ?>">August</option>       
            <option value="<?php echo date("Y-")."09-".date("d"); ?>">September</option>       
            <option value="<?php echo date("Y-")."10-".date("d"); ?>">October</option>       
            <option value="<?php echo date("Y-")."11-".date("d"); ?>">November</option>       
            <option value="<?php echo date("Y-")."12-".date("d"); ?>">December</option>       
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
<?php if ($_GET['form'] == "update_tagihan_bulanan"): ?>
  <?php 
  require_once 'class/Tagihan.php';
  $tagihan_bulanan = new Tagihan();
  $save = $tagihan_bulanan->change_tagihan_bulanan($_POST);
  $html->redirect('?page=daftar_tagihan_bulanan');
  ?>
<?php endif ?>
<?php if ($_GET['form'] == "delete_tagihan_bulanan"): ?>
  <?php 
  require_once 'class/Tagihan.php';
  $tagihan_bulanan = new Tagihan();
  $save = $tagihan_bulanan->delete_tagihan_bulanan($_GET);
  $html->redirect('?page=daftar_tagihan_bulanan');
  ?>
<?php endif ?>
<?php else: ?>
  <div class="panel-header md-panel-controls">
    <h3><i class="fa fa-table"></i> <strong>Data </strong> tagihan_bulanan</h3>
  </div>
  <div class="panel-content pagination2 table-responsive">
    <table id="example1" class="table table-hover table-dynamic">
      <thead>
        <tr>
          <th>No.</th>
          <th>No kamar</th>
          <th>Jenis tagihan</th>
          <th>Jumlah Bayar</th>
          <th>Tagihan Bulan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        require_once 'class/Tagihan.php';
        $Tagihan = new Tagihan();

        $get_Tagihan = $Tagihan->showTagihanBulanan();
        $no = 1;
        foreach ($get_Tagihan as $Tagihan) {
          echo "<tr>";
          echo "<td>".$no++."</td>";
          echo "<td>KAMAR-".$Tagihan['no_kamar']."</td>";
          echo "<td>".$Tagihan['jenis_tagihan']."</td>";
          echo "<td>".$Tagihan['jumlah_bayar']."</td>";
          echo "<td>".date("M",strtotime($Tagihan['tagihan_bulanan']))."</td>";
          echo '<td class=""><a class="edit btn btn-sm btn-default" href="?page=daftar_tagihan_bulanan&form=change_tagihan_bulanan&tagihan_bulanan_id='.$Tagihan['bulan_id'].'"><i class="fa fa-edit"></i><div class="ripple-wrapper"></div></a>  <a class="delete btn btn-sm btn-danger" href="?page=daftar_tagihan_bulanan&form=delete_tagihan_bulanan&tagihan_bulanan_id='.$Tagihan['bulan_id'].'"><i class="fa fa-remove"></i></a>
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