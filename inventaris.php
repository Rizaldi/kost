<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <a href="?page=inventaris&form=change_inventaris" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add inventaris<div class="ripple-wrapper"></div></a>
    </div>
  </div>
<?php endif ?>
</div>
  <div class="col-md-12">
      <?php if (isset($_GET['form'])): ?>
        <?php if ($_GET['form'] == "change_inventaris"): ?>
        <?php
          @$get_inventaris = $koneksi->query("SELECT * FROM inventaris where id = '".$_GET['inventaris_id']."'");
          @$row_inventaris = mysqli_fetch_assoc($get_inventaris);
        ?>
          <form action="?page=inventaris&form=update_inventaris" method="post">
            <label>Kode Barang</label>
            <div class="form-group m-b-30">
              <input type="hidden" name="inventaris_id" class="form-control floating-label" placeholder="" value="<?php echo $row_inventaris['id']; ?>">
              <input type="text" name="kode_barang" class="form-control floating-label" placeholder="" value="<?php echo $row_inventaris['kode_barang']; ?>">
            </div>
            <label>Nama Barang</label>
            <div class="form-group m-b-30">
              <input type="text" name="nama_barang" class="form-control floating-label" placeholder="" value="<?php echo $row_inventaris['nama_barang']; ?>">
            </div>
            <label>Jumlah Barang</label>
            <div class="form-group m-b-30">
              <input type="text" name="jumlah_barang" class="form-control floating-label" placeholder="" value="<?php echo $row_inventaris['jumlah_barang']; ?>">
            </div>
            <label>Harga Barang</label>
            <div class="form-group m-b-30">
              <input type="text" name="harga_barang" class="form-control floating-label" placeholder="" value="<?php echo $row_inventaris['harga_barang']; ?>">
            </div>
            <div class="col-sm-9 col-sm-offset-3">
              <div class="pull-right">
                <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
                <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
              </div>
            </div>
          </form>
          <?php endif ?>
          <?php if ($_GET['form'] == "update_inventaris"): ?>
          <?php 
            require_once 'class/inventaris.php';
            $inventaris = new inventaris();
            $save = $inventaris->change_inventaris($_POST);
            $html->redirect('?page=inventaris');
          ?>
        <?php endif ?>
        <?php if ($_GET['form'] == "delete_inventaris"): ?>
          <?php 
            require_once 'class/inventaris.php';
            $inventaris = new inventaris();
            $save = $inventaris->delete_inventaris($_GET);
            // print_r($_GET);
            $html->redirect('?page=inventaris');
          ?>
        <?php endif ?>
      <?php else: ?>
        <div class="panel-header md-panel-controls">
          <h3><i class="fa fa-table"></i> <strong>Data </strong> Inventaris</h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
          <table id="example1" class="table table-hover table-dynamic">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                  require_once 'class/Inventaris.php';
                  $Inventaris = new Inventaris();

                  $get_Inventaris = $Inventaris->showInventaris();
                  $no = 1;
                  foreach ($get_Inventaris as $Inventaris) {
                    echo "<tr>";
                      echo "<td>".$no++."</td>";
                      echo "<td>INVENT-".$Inventaris['kode_barang']."</td>";
                      echo "<td>".$Inventaris['nama_barang']."</td>";
                      
                      echo "<td>".$Inventaris['jumlah_barang']."</td>";
                      echo "<td>".$Inventaris['harga_barang']."</td>";
                      echo '<td class=""><a class="edit btn btn-sm btn-default" href="?page=inventaris&form=change_inventaris&inventaris_id='.$Inventaris['id'].'"><i class="fa fa-edit"></i><div class="ripple-wrapper"></div></a>  <a class="delete btn btn-sm btn-danger" href="?page=inventaris&form=delete_inventaris&inventaris_id='.$Inventaris['id'].'"><i class="fa fa-remove"></i></a>
                        </td>';
                    echo "</tr>";
                  }
                ?>
            </tbody>
          </table>
        </div>
      <?php endif ?>
</div>