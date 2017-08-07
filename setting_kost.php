<div class="panel-header md-panel-controls">
  <h3><strong>Setting</strong> <small>Kost</small></h3>
</div>
<div class="col-md-12">
  <?php
    @$get_kost = $koneksi->query("SELECT * FROM kost");
    @$row_kost = mysqli_fetch_assoc($get_kost);
  ?>
  <form action="?page=setting_kost&form=update_kost" method="post" enctype="multipart/form-data">
  <div class="form-group m-b-30">
    <input type="text" name="nama" class="form-control floating-label" placeholder="Nama Kost" value="<?php echo $row_kost['nama']; ?>">
    <input type="hidden" name="kost_id" class="form-control floating-label" placeholder="Nama Kost" value="<?php echo $row_kost['id']; ?>">
  </div>
  <div class="form-group m-b-30">
    <textarea class="form-control floating-label" name="alamat" placeholder="Alamat"> <?php echo $row_kost['alamat']; ?></textarea>
  </div>
  <div class="form-group m-b-30">
    <input type="text" name="hp" class="form-control floating-label" placeholder="HP" value="<?php echo $row_kost['hp']; ?>">
  </div>
  <div class="form-group m-b-30">
    <input type="text" name="kota" class="form-control floating-label" placeholder="Kota" value="<?php echo $row_kost['kota']; ?>">
  </div>
  <div class="form-group m-b-30">
    <input type="text" name="motto" class="form-control floating-label" placeholder="Motto" value="<?php echo $row_kost['motto']; ?>">
  </div>
  <div class="form-group m-b-30">
    <input type="text" name="label" class="form-control floating-label" placeholder="label" value="<?php echo $row_kost['label']; ?>">
  </div>
  <div class="form-group m-b-30">
    <input type="file" name="file">
  </div>
  <div class="col-sm-9 col-sm-offset-3">
    <div class="pull-right">
      <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
      <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
    </div>
  </div>
</form>
</div>

<?php if (isset($_GET['form'])): ?>
<?php if ($_GET['form'] == "update_kost"): ?>
  <?php 
  require_once 'class/Kamar.php';
  $Kamar = new Kamar();
  $save = $Kamar->change_data_kost($_POST);
    // print_r($_POST);
    if ($_POST['kost_id'] == null) {
      $html->redirect('?page=setting_kost&success=1');
    } else {
      $html->redirect('?page=setting_kost&success=2');
    }
  ?>
<?php endif; ?>
<?php endif; ?>