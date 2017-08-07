
<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <a href="?page=daftar_tagihan_harian_mingguan&form=change_tagihan_harian_mingguan" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add tagihan<div class="ripple-wrapper"></div></a>
    </div>
  </div>
<?php endif ?>
</div>
<div class="col-md-12">
  <?php if (isset($_GET['form'])): ?>
  <?php if ($_GET['form'] == "change_tagihan_harian_mingguan"): ?>
  <?php
    @$get_tagihan_harian_mingguan = $koneksi->query("SELECT * FROM tagihan_harian_mingguan where id = '".$_GET['tagihan_harian_mingguan_id']."'");
    @$row_tagihan_harian_mingguan = mysqli_fetch_assoc($get_tagihan_harian_mingguan);
  ?>
  <form action="?page=daftar_tagihan_harian_mingguan&form=update_tagihan_harian_mingguan" method="post">
    <label>No Kamar</label>
    <div class="form-group m-b-30">
      <input type="hidden" name="mingguan_id" class="form-control floating-label" placeholder="" value="<?php echo $row_tagihan_harian_mingguan['id']; ?>" required>
      <!-- <input type="text" name="kamar_id" class="form-control floating-label" placeholder="" value="<?php echo $row_tagihan_harian_mingguan['kamar_id']; ?>" required> -->
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
    </div>
    <label>jenis tagihan</label>
    <div class="form-group m-b-30">
      <input type="text" name="jenis_tagihan" class="form-control floating-label" placeholder="" value="<?php echo $row_tagihan_harian_mingguan['jenis_tagihan']; ?>" required>
    </div>
    <label>jumlah bayar</label>
    <div class="form-group m-b-30">
      <input type="text" name="jumlah_bayar" class="form-control floating-label" placeholder="" value="<?php echo $row_tagihan_harian_mingguan['jumlah_bayar']; ?>" required>
    </div>
    <div class="col-sm-9 col-sm-offset-3">
      <div class="pull-right">
        <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
        <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
      </div>
    </div>
  </form>
<?php endif ?>
<?php if ($_GET['form'] == "update_tagihan_harian_mingguan"): ?>
  <?php 
  require_once 'class/Tagihan.php';
  $tagihan_harian_mingguan = new Tagihan();
  $save = $tagihan_harian_mingguan->change_tagihan_harian_mingguan($_POST);
  $html->redirect('?page=daftar_tagihan_harian_mingguan');
  ?>
<?php endif ?>
<?php else: ?>
  <div class="panel-header md-panel-controls">
    <h3><i class="fa fa-table"></i> <strong>Data </strong> tagihan_harian_mingguan</h3>
  </div>
  <div class="panel-content pagination2 table-responsive">
    <table id="example1" class="table table-hover table-dynamic">
      <thead>
        <tr>
          <th>No.</th>
          <th>No kamar</th>
          <th>Jenis tagihan</th>
          <th>Jumlah Bayar</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        require_once 'class/Tagihan.php';
        $Tagihan = new Tagihan();

        $get_Tagihan = $Tagihan->showTagihanHarianMingguan();
        $no = 1;
        foreach ($get_Tagihan as $Tagihan) {
          echo "<tr>";
          echo "<td>".$no++."</td>";
          echo "<td>".$Tagihan['no_kamar']."</td>";
          echo "<td>".$Tagihan['jenis_tagihan']."</td>";
          echo "<td>".$Tagihan['jumlah_bayar']."</td>";
          echo '<td class=""><a class="edit btn btn-sm btn-default" href="?page=daftar_tagihan_harian_mingguan&form=change_tagihan_harian_mingguan&tagihan_harian_mingguan_id='.$Tagihan['har_ming_id'].'"><i class="fa fa-edit"></i><div class="ripple-wrapper"></div></a>  <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="fa fa-remove"></i></a>
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