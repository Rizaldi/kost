
<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <a href="?page=kamar&form=change_kamar" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add kamar<div class="ripple-wrapper"></div></a>
    </div>
  </div>
<?php endif ?>
</div>
<div class="col-md-12">
  <?php if (isset($_GET['form'])): ?>
  <?php if ($_GET['form'] == "change_kamar"): ?>
  <?php
    @$get_kamar = $koneksi->query("SELECT * FROM kamar where id = '".$_GET['kamar_id']."'");
    @$row_kamar = mysqli_fetch_assoc($get_kamar);
  ?>
  <form action="?page=kamar&form=update_kamar" method="post">
    <label>No Kamar</label>
    <div class="form-group m-b-30">
      <input type="hidden" name="kamar_id" class="form-control floating-label" placeholder="" value="<?php echo $row_kamar['id']; ?>" required>
      <input type="text" name="no_kamar" class="form-control floating-label" placeholder="" value="<?php echo $row_kamar['no_kamar']; ?>" required>
    </div>
    <label>Tarif Sewa Bulanan</label>
    <div class="form-group m-b-30">
      <input type="text" name="trf_sewa_bulanan" class="form-control floating-label" placeholder="" value="<?php echo $row_kamar['trf_sewa_bulanan']; ?>" required>
    </div>
    <label>Tarif Sewa Mingguan</label>
    <div class="form-group m-b-30">
      <input type="text" name="trf_sewa_mingguan" class="form-control floating-label" placeholder="" value="<?php echo $row_kamar['trf_sewa_mingguan']; ?>" required>
    </div>
    <label>Tarif Sewa Harian</label>
    <div class="form-group m-b-30">
      <input type="text" name="trf_sewa_harian" class="form-control floating-label" placeholder="" value="<?php echo $row_kamar['trf_sewa_harian']; ?>" required>
    </div>
    <label>Denda Sewa Bulanan</label>
    <div class="form-group m-b-30">
      <input type="text" name="denda_sewa_bulanan" class="form-control floating-label" placeholder="" value="<?php echo $row_kamar['denda_sewa_bulanan']; ?>" required>
    </div>
    <div class="col-sm-9 col-sm-offset-3">
      <div class="pull-right">
        <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
        <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
      </div>
    </div>
  </form>
<?php endif ?>
<?php if ($_GET['form'] == "update_kamar"): ?>
  <?php 
  require_once 'class/Kamar.php';
  $kamar = new Kamar();

  $update = $kamar->change_data_kamar($_POST);
  $html->redirect('?page=kamar');
  // print_r($_POST);
  ?>
<?php endif ?>
<?php if ($_GET['form'] == "delete_kamar"): ?>
  <?php 
  require_once 'class/Kamar.php';
  $kamar = new Kamar();

  $update = $kamar->delete_data_kamar($_GET);
  $html->redirect('?page=kamar');
  print_r($_GET);
  ?>
<?php endif ?>
<?php else: ?>
  <div class="panel-header md-panel-controls">
    <h3><i class="fa fa-table"></i> <strong>Data </strong> kamar</h3>
  </div>
  <div class="panel-content pagination2 table-responsive">
    <table id="example1" class="table table-hover table-dynamic">
      <thead>
        <tr>
          <th>No.</th>
          <th>No Kamar</th>
          <th>Tarif Sewa Perbulan</th>
          <th>Tarif Sewa Perminggu</th>
          <th>Tarif Sewa Perhari</th>
          <th>Denda Sewa Bulanan</th>
          <th>Total Pembayaran + Denda Bulanan</th>
          <th>Fasilitas</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        require_once 'class/Kamar.php';
        $kamar = new Kamar();

        $get_kamar = $kamar->showkamar();
        $no = 1;
        foreach ($get_kamar as $kamar) {
          $jumlah_perbulan = $kamar['trf_sewa_bulanan'] + $kamar['denda_sewa_bulanan'];
          echo "<tr>";
          echo "<td>".$no++."</td>";
          echo "<td>KAMAR-".$kamar['no_kamar']."</td>";
          echo "<td>".$kamar['trf_sewa_bulanan']."</td>";
          
          echo "<td>".$kamar['trf_sewa_mingguan']."</td>";
          echo "<td>".$kamar['trf_sewa_harian']."</td>";
          echo "<td>".$kamar['denda_sewa_bulanan']."</td>";
          // echo "<td>".$kamar['denda_sewa_bulanan']."</td>";
          echo "<td>".$jumlah_perbulan."</td>";
          echo "<td><a href='?page=fasilitas&no_kamar=$kamar[id]&kamar=$kamar[no_kamar]' class='btn btn-primary'>Tambah Fasilitas</a></td>";
          echo '<td class=""><a class="edit btn btn-sm btn-default" href="?page=kamar&form=change_kamar&kamar_id='.$kamar['id'].'"><i class="fa fa-edit"></i><div class="ripple-wrapper"></div></a>  <a class="delete btn btn-sm btn-danger" href="?page=kamar&form=delete_kamar&kamar_id='.$kamar['id'].'"><i class="fa fa-remove"></i></a>
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