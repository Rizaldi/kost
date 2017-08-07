<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <a href="?page=cek_in_out&form=change_cek_in_out" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add Cek In Out<div class="ripple-wrapper"></div></a>
    </div>
  </div>
<?php endif ?>
</div>
  <div class="col-md-12">
      <?php if (isset($_GET['form'])): ?>
        <?php if ($_GET['form'] == "change_cek_in_out"): ?>
        <?php
          @$get_cek_in_out = $koneksi->query("SELECT * FROM cek_in_out where id = '".$_GET['cek_in_out_id']."'");
          @$row_cek_in_out = mysqli_fetch_assoc($get_cek_in_out);
        ?>
          <form action="?page=cek_in_out&form=update_cek_in_out" method="post">
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
            <label>alamat</label>
            <div class="form-group m-b-30">
              <input type="text" name="alamat" class="form-control floating-label" placeholder="" value="<?php echo $row_cek_in_out['alamat']; ?>">
              <input type="hidden" name="cek_in_out_id" class="form-control floating-label" placeholder="" value="<?php echo $row_cek_in_out['id']; ?>">
            </div>
            <label>Jenis Sewa</label>
            <div class="form-group m-b-30">
              <select class="form-control" name="jenis_sewa">
              <option value="sewa_bulanan">sewa_bulanan</option>
              <option value="sewa_mingguan">sewa_mingguan</option>
              <option value="sewa_harian">sewa_harian</option>
              </select>
            </div>
            <label>Tanggal Jatuh Tempo</label>
            <div class="form-group m-b-30">
              <input type="date" name="tgl_jatuh_tempo" class="form-control floating-label" placeholder="" value="<?php echo $row_cek_in_out['tgl_jatuh_tempo']; ?>">
            </div>
            <label>jml_minggu</label>
            <div class="form-group m-b-30">
              <input type="number" name="jml_minggu" class="form-control floating-label" placeholder="" value="<?php echo $row_cek_in_out['jml_minggu']; ?>">
            </div>
            <label>jam</label>
            <div class="form-group m-b-30">
              <input type="text" name="jam" class="form-control floating-label" placeholder="" value="<?php echo $row_cek_in_out['jam']; ?>">
            </div>
            <label>jml_hari_sewa</label>
            <div class="form-group m-b-30">
              <input type="number" name="jml_hari_sewa" class="form-control floating-label" placeholder="" value="<?php echo $row_cek_in_out['jml_hari_sewa']; ?>">
            </div>
            <label>tanggal</label>
            <div class="form-group m-b-30">
              <input type="date" name="tanggal" class="form-control floating-label" placeholder="" value="<?php echo $row_cek_in_out['tanggal']; ?>">
            </div>
            
            <div class="col-sm-9 col-sm-offset-3">
              <div class="pull-right">
                <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
                <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
              </div>
            </div>
          </form>
          <?php endif ?>
          <?php if ($_GET['form'] == "update_cek_in_out"): ?>
          <?php 
            require_once 'class/CekInOut.php';
            $cek_in_out = new CekInOut();
            $save = $cek_in_out->change_cek_in_out($_POST);
            // print_r($_POST);
            $html->redirect('?page=cek_in_out');
          ?>
        <?php endif ?>
        <?php if ($_GET['form'] == "delete_cek_in_out"): ?>
        <?php 
            require_once 'class/CekInOut.php';
            $cek_in_out = new CekInOut();
            $save = $cek_in_out->delete_cek_in_out($_GET);
            // print_r($_GET);
            $html->redirect('?page=cek_in_out');
          ?>
        <?php endif ?>
      <?php else: ?>
        <div class="panel-header md-panel-controls">
          <h3><i class="fa fa-table"></i> <strong>Data </strong> Cek In Out</h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
          <table id="example1" class="table table-hover table-dynamic">
            <thead>
              <tr>
                <th>No.</th>
                <th>No Kamar</th>
                <th>Nama Penyewa</th>
                <th>Alamat</th>
                <th>Jenis Sewa</th>
                <th>tgl jatuh tempo</th>
                <th>jml minggu</th>
                <th>jam </th>
                <th>jml hari sewa</th>
                <th>tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                  require_once 'class/CekInOut.php';
                  $CekInOut = new CekInOut();

                  $get_CekInOut = $CekInOut->showCekInOut();
                  $no = 1;
                  foreach ($get_CekInOut as $CekInOut) {
                    echo "<tr>";
                      echo "<td>".$no++."</td>";
                      echo "<td>".$CekInOut['kamar_id']."</td>";
                      
                      echo "<td>".$CekInOut['nama']."</td>";
                      echo "<td>".$CekInOut['alamat']."</td>";
                      echo "<td>".$CekInOut['jenis_sewa']."</td>";
                      echo "<td>".$CekInOut['tgl_jatuh_tempo']."</td>";
                      echo "<td>".$CekInOut['jml_minggu']."</td>";
                      echo "<td>".$CekInOut['jam']."</td>";
                      echo "<td>".$CekInOut['jml_hari_sewa']."</td>";
                      echo "<td>".$CekInOut['tanggal']."</td>";
                      echo '<td class=""><a class="edit btn btn-sm btn-default" href="?page=cek_in_out&form=change_cek_in_out&cek_in_out_id='.$CekInOut['cek_in_out_id'].'"><i class="fa fa-edit"></i><div class="ripple-wrapper"></div></a>  <a class="delete btn btn-sm btn-danger" href="?page=cek_in_out&form=delete_cek_in_out&cek_in_out_id='.$CekInOut['cek_in_out_id'].'"><i class="fa fa-remove"></i></a>
                        </td>';
                    echo "</tr>";
                  }
                ?>
            </tbody>
          </table>
        </div>
      <?php endif ?>
</div>