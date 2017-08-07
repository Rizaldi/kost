
<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <a href="?page=fasilitas&form=change_fasilitas&no_kamar=<?php echo $_GET['no_kamar']; ?>&kamar=<?php echo $_GET['kamar']; ?>" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add Fasilitas<div class="ripple-wrapper"></div></a>
    </div>
  </div>
<?php endif ?>
</div>
<div class="col-md-12">
  <?php if (isset($_GET['form'])): ?>
  <?php if ($_GET['form'] == "change_fasilitas"): ?>
  <?php
    @$get_fasilitas_kamar = $koneksi->query("SELECT * FROM fasilitas_kamar where id = '".$_GET['fasilitas_id']."'");
    @$row_fasilitas_kamar = mysqli_fetch_assoc($get_fasilitas_kamar);
  ?>
  <form action="?page=fasilitas&form=update_fasilitas" method="post">
    <input type="hidden" name="fasilitas_id" class="form-control floating-label" placeholder="" value="<?php echo $row_fasilitas_kamar['id']; ?>">
    <input type="hidden" name="no_kamar" class="form-control floating-label" placeholder="" value="<?php echo $_GET['no_kamar']; ?>">
    <input type="hidden" name="kamar" class="form-control floating-label" placeholder="" value="<?php echo $_GET['kamar']; ?>">
    <label>Nama Barang</label>
    <div class="form-group m-b-30">
      <input type="text" name="nama_barang" class="form-control floating-label" placeholder="" value="<?php echo $row_fasilitas_kamar['nama_barang']; ?>" required>
    </div>
    <label>Jumlah</label>
    <div class="form-group m-b-30">
      <input type="text" name="jumlah" class="form-control floating-label" placeholder="" value="<?php echo $row_fasilitas_kamar['jumlah']; ?>" required>
    </div>
    
    <div class="col-sm-9 col-sm-offset-3">
      <div class="pull-right">
        <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
        <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
      </div>
    </div>
  </form>
<?php endif ?>
<?php if ($_GET['form'] == "update_fasilitas"): ?>
  <?php 
  require_once 'class/Kamar.php';
  $fasilitas = new Kamar();
  // print_r($_POST);
  $fasiltas = $fasilitas->change_fasilitas_kamar($_POST);
  $html->redirect('?page=fasilitas&no_kamar='.$_POST['no_kamar'].'&kamar='.$_POST['kamar']);
  ?>
<?php endif ?>
<?php else: ?>
  <div class="panel-header md-panel-controls">
    <h3><i class="fa fa-table"></i> <strong>Data </strong> Fasilitas</h3>
  </div>
  <div class="panel-content pagination2 table-responsive">
    <table id="example1" class="table table-hover table-dynamic">
      <thead>
        <tr>
          <th>No.</th>
          <th>No Kamar</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        require_once 'class/Kamar.php';
        $kamar = new Kamar();

        $get_kamar = $kamar->showFasilitaskamar($_GET['no_kamar']);
        $no = 1;
        foreach ($get_kamar as $kamar) {
          echo "<tr>";
          echo "<td>".$no++."</td>";
          echo "<td>".$_GET['kamar']."</td>";
          echo "<td>".$kamar['nama_barang']."</td>";
          echo "<td>".$kamar['jumlah']."</td>";
          
          echo '<td class=""><a class="edit btn btn-sm btn-default" href="?page=fasilitas&form=change_fasilitas&no_kamar='.$_GET['no_kamar'].'&fasilitas_id='.$kamar['id'].'"><i class="fa fa-edit"></i><div class="ripple-wrapper"></div></a>  <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="fa fa-remove"></i></a>
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