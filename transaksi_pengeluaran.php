<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <a href="?page=transaksi_pengeluaran&form=change_transaksi_pengeluaran" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add transaksi pengeluaran<div class="ripple-wrapper"></div></a>
    </div>
  </div>
<?php endif ?>
</div>
  <div class="col-md-12">
      <?php if (isset($_GET['form'])): ?>
        <?php if ($_GET['form'] == "change_transaksi_pengeluaran"): ?>
        <?php
          @$get_transaksi_pengeluaran = $koneksi->query("SELECT * FROM transaksi_pengeluaran where id = '".$_GET['transaksi_pengeluaran_id']."'");
          @$row_transaksi_pengeluaran = mysqli_fetch_assoc($get_transaksi_pengeluaran);
        ?>
          <form action="?page=transaksi_pengeluaran&form=update_transaksi_pengeluaran" method="post">
            <label>kode pengeluaran</label>
            <div class="form-group m-b-30">
              <input type="hidden" name="pengeluaran_id" class="form-control floating-label" placeholder="" value="<?php echo $row_transaksi_pengeluaran['id']; ?>">
              <input type="text" name="kode_pengeluaran" class="form-control floating-label" placeholder="" value="<?php echo $row_transaksi_pengeluaran['kode_pengeluaran']; ?>">
            </div>
            <label>tanggal</label>
            <div class="form-group m-b-30">
              <input type="date" name="tanggal" class="form-control floating-label" placeholder="" value="<?php echo $row_transaksi_pengeluaran['tanggal']; ?>">
            </div>
            <label>Uraian</label>
            <div class="form-group m-b-30">
              <textarea name="uraian" class="form-control" placeholder="" value="">
                <?php echo $row_transaksi_pengeluaran['uraian']; ?>
              </textarea>
            </div>
            <label>Nominal</label>
            <div class="form-group m-b-30">
              <input type="number" name="nominal" class="form-control floating-label" placeholder="" value="<?php echo $row_transaksi_pengeluaran['nominal']; ?>">
            </div>
            <div class="col-sm-9 col-sm-offset-3">
              <div class="pull-right">
                <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
                <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
              </div>
            </div>
          </form>
          <?php endif ?>
          <?php if ($_GET['form'] == "update_transaksi_pengeluaran"): ?>
          <?php 
            require_once 'class/Transaksi.php';
            $transaksi = new transaksi();
            $save = $transaksi->change_transaksi_pengeluaran($_POST);
            $html->redirect('?page=transaksi_pengeluaran');
          ?>
        <?php endif ?>
        <?php if ($_GET['form'] == "delete_transaksi_pengeluaran"): ?>
          <?php 
            require_once 'class/Transaksi.php';
            $transaksi = new transaksi();
            $save = $transaksi->delete_transaksi_pengeluaran($_GET);
            $html->redirect('?page=transaksi_pengeluaran');
          ?>
        <?php endif ?>
      <?php else: ?>
        <div class="panel-header md-panel-controls">
          <h3><i class="fa fa-table"></i> <strong>Data </strong>Transaksi Pengeluaran</h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
          <table id="example1" class="table table-hover table-dynamic">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Pengeluaran</th>
                <th>uraian</th>
                <th>nominal</th>
                <th>tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                  require_once 'class/Transaksi.php';
                  $Transaksi = new Transaksi();

                  $get_Transaksi = $Transaksi->showTransaksiKeluar();
                  $no = 1;
                  foreach ($get_Transaksi as $Transaksi) {
                    echo "<tr>";
                      echo "<td>".$no++."</td>";
                      echo "<td>PENGELUARAN-".$Transaksi['kode_pengeluaran']."</td>";
                      echo "<td>".$Transaksi['uraian']."</td>";
                      
                      echo "<td>".$Transaksi['nominal']."</td>";
                      echo "<td>".$Transaksi['tanggal']."</td>";
                      echo '<td class=""><a class="edit btn btn-sm btn-default" href="?page=transaksi_pengeluaran&form=change_transaksi_pengeluaran&transaksi_pengeluaran_id='.$Transaksi['id'].'"><i class="fa fa-edit"></i><div class="ripple-wrapper"></div></a>  <a class="delete btn btn-sm btn-danger" href="?page=transaksi_pengeluaran&form=delete_transaksi_pengeluaran&transaksi_pengeluaran_id='.$Transaksi['id'].'"><i class="fa fa-remove"></i></a>
                            </td>';
                    echo "</tr>";
                  }
                ?>
            </tbody>
          </table>
        </div>
      <?php endif ?>
</div>