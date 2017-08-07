
<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <a href="?page=deposit_penyewa&form=change_deposit" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add deposit<div class="ripple-wrapper"></div></a>
    </div>
  </div>
<?php endif ?>
</div>
<div class="col-md-12">
  <?php if (isset($_GET['form'])): ?>
  <?php if ($_GET['form'] == "change_deposit"): ?>
  <?php
    @$get_deposit = $koneksi->query("SELECT * FROM deposit where id = '".$_GET['deposit_id']."'");
    @$row_deposit = mysqli_fetch_assoc($get_deposit);
  ?>
  <form action="?page=deposit_penyewa&form=update_deposit" method="post">
    <label>No deposit</label>
    <div class="form-group m-b-30">
      <input type="hidden" name="deposit_id" class="form-control floating-label" placeholder="" value="<?php echo $row_deposit['id']; ?>" required>
      <input type="text" name="no_deposit" class="form-control floating-label" placeholder="" value="<?php echo $row_deposit['no_deposit']; ?>" required>
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
    <label>Uraian</label>
    <div class="form-group m-b-30">
      <input type="text" name="uraian" class="form-control floating-label" placeholder="" value="<?php echo $row_deposit['uraian']; ?>" required>
    </div>
    <label>Nominal</label>
    <div class="form-group m-b-30">
      <input type="text" name="nominal" class="form-control floating-label" placeholder="" value="<?php echo $row_deposit['nominal']; ?>" required>
    </div>
    <div class="col-sm-9 col-sm-offset-3">
      <div class="pull-right">
        <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
        <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
      </div>
    </div>
  </form>
<?php endif ?>
<?php if ($_GET['form'] == "update_deposit"): ?>
  <?php 
  require_once 'class/Deposit.php';
  $deposit = new Deposit();

  $update = $deposit->change_data_deposit($_POST);
  $html->redirect('?page=deposit_penyewa');
  // print_r($_POST);
  ?>
<?php endif ?>
<?php else: ?>
  <div class="panel-header md-panel-controls">
    <h3><i class="fa fa-table"></i> <strong>Data </strong> deposit</h3>
  </div>
  <div class="panel-content pagination2 table-responsive">
    <table id="example1" class="table table-hover table-dynamic">
      <thead>
        <tr>
          <th>No.</th>
          <th>No deposit</th>
          <th>No Kamar</th>
          <th>Nama Penyewa</th>
          <th>Uraian</th>
          <th>Nominal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        require_once 'class/Deposit.php';
        $Deposit = new Deposit();

        $get_deposit = $Deposit->showDeposit();
        $no = 1;
        foreach ($get_deposit as $deposit) {
          echo "<tr>";
          echo "<td>".$no++."</td>";
          echo "<td>DEPOSIT-".$deposit['no_deposit']."</td>";
          echo "<td>".$deposit['no_kamar']."</td>";
          
          echo "<td>".$deposit['nama']."</td>";
          echo "<td>".$deposit['uraian']."</td>";
          echo "<td>".$deposit['nominal']."</td>";
          echo '<td class=""><a class="edit btn btn-sm btn-default" href="?page=deposit_penyewa&form=change_deposit&deposit_id='.$deposit['deposit_id'].'"><i class="fa fa-edit"></i><div class="ripple-wrapper"></div></a>  <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="fa fa-remove"></i></a>
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