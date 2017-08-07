<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <!-- <a href="?page=inventaris&form=change_inventaris" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add inventaris<div class="ripple-wrapper"></div></a> -->
    </div>
  </div>
<?php endif ?>
</div>
  <div class="col-md-12">
      <?php if (isset($_GET['form'])): ?>
        <?php if ($_GET['form'] == "change_inventaris"): ?>
          <form action="?page=inventaris&form=save_inventaris" method="post">
            <label>Nama Barang</label>
            <div class="form-group m-b-30">
              <input type="text" name="no_register" class="form-control floating-label" placeholder="">
            </div>
            <label>Jumlah Barang</label>
            <div class="form-group m-b-30">
              <input type="text" name="jumlah_barang" class="form-control floating-label" placeholder="">
            </div>
            <label>Harga Barang</label>
            <div class="form-group m-b-30">
              <input type="text" name="harga_barang" class="form-control floating-label" placeholder="">
            </div>
            <div class="col-sm-9 col-sm-offset-3">
              <div class="pull-right">
                <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
                <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
              </div>
            </div>
          </form>
          <?php endif ?>
          <?php if ($_GET['form'] == "save_inventaris"): ?>
          <?php 
            require_once 'class/inventaris.php';
            $user = new inventaris();
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];
            $data['hak_akses'] = $_POST['hak_akses'];
            $save = $user->add_user($data);
            $html->redirect('?page=inventaris');
          ?>
        <?php endif ?>
      <?php else: ?>
        <div class="panel-header md-panel-controls">
          <h3><i class="fa fa-table"></i> <strong>Data </strong>Transaksi Inventaris</h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
          <table id="example1" class="table table-hover table-dynamic">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Rusak</th>
                <th>Jumlah Hilang</th>
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
                      
                      echo "<td>0</td>";
                      echo "<td>0</td>";
                    echo "</tr>";
                  }
                ?>
            </tbody>
          </table>
        </div>
      <?php endif ?>
</div>