<?php if (!@$_GET['form']): ?>
  <div class="col-md-12">
    <div class="pull-left">
      <a href="?page=penyewa&form=change_penyewa" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add penyewa<div class="ripple-wrapper"></div></a>
    </div>
  </div>
<?php endif ?>
<div class="col-md-12">
  <?php if (isset($_GET['form'])): ?>
  <?php if ($_GET['form'] == "change_penyewa"): ?>
  <?php
    @$get_penyewa = $koneksi->query("SELECT * FROM penyewa where id = '".$_GET['penyewa_id']."'");
    @$row_penyewa = mysqli_fetch_assoc($get_penyewa);
  ?>
  <form action="?page=penyewa&form=update_penyewa" method="post" enctype="multipart/form-data">
    <label>No Register</label>
        <div class="form-group m-b-30">
          <input type="text" name="no_register" class="form-control floating-label" placeholder="no register" value="<?php echo $row_penyewa['no_register']; ?>">
          <input type="hidden" name="penyewa_id" class="form-control floating-label" placeholder="no register" value="<?php echo $row_penyewa['id']; ?>">
        </div>
    <label>Nama</label>
        <div class="form-group m-b-30">
          <input type="text" name="nama" class="form-control floating-label" placeholder="Nama" value="<?php echo $row_penyewa['nama']; ?>">
        </div>
    <label>tgl lahir</label>
        <div class="form-group m-b-30">
          <input type="date" name="tgl_lahir" class="form-control floating-label" placeholder="tgl lahir" value="<?php echo $row_penyewa['tgl_lahir']; ?>">
        </div>
    <label>tempat lahir</label>
        <div class="form-group m-b-30">
          <input type="text" name="tempat_lahir" class="form-control floating-label" placeholder="tempat lahir" value="<?php echo $row_penyewa['tempat_lahir']; ?>">
        </div>
    <label>alamat</label>
        <div class="form-group m-b-30">
          <textarea class="form-control" name="alamat" placeholder="alamat"><?php echo $row_penyewa['alamat']; ?></textarea>
        </div>
    <label>Jenis Kelamin</label>
        <div class="form-group m-b-30">
          <select class="form-control" name="jk" >
            <option value="laki_laki">Laki Laki</option>
            <option value="perempuan">Perempuan</option>
          </select>
        </div>
    <label>ID pengenal</label>
        <div class="form-group m-b-30">
          <input type="text" name="ID_pengenal" class="form-control floating-label" placeholder="ID pengenal" value="<?php echo $row_penyewa['ID_pengenal']; ?>">
        </div>
    <label>jenis pengenal</label>
        <div class="form-group m-b-30">
          <input type="text" name="jenis_pengenal" class="form-control floating-label" placeholder="jenis pengenal" value="<?php echo $row_penyewa['jenis_pengenal']; ?>">
        </div>
    <label>hp</label>
        <div class="form-group m-b-30">
          <input type="text" name="hp" class="form-control floating-label" placeholder="hp" value="<?php echo $row_penyewa['hp']; ?>">
        </div>
    <label>agama</label>
        <div class="form-group m-b-30">
          <select name="agama" class="form-control">
            <option>Islam</option>
            <option>Kristen</option>
            <option>Hindu</option>
            <option>Budha</option>
          </select>  
        </div>
    <label>status</label>
        <div class="form-group m-b-30">
          <input type="text" name="status" class="form-control floating-label" placeholder="status" value="<?php echo $row_penyewa['status']; ?>">
        </div>
    <label>pekerjaan</label>
        <div class="form-group m-b-30">
          <input type="text" name="pekerjaan" class="form-control floating-label" placeholder="pekerjaan" value="<?php echo $row_penyewa['pekerjaan']; ?>">
        </div>
    <label>tanggal masuk</label>
        <div class="form-group m-b-30">
          <input type="date" name="tanggal_masuk" class="form-control floating-label" placeholder="tanggal_masuk" value="<?php echo $row_penyewa['tanggal_masuk']; ?>">
        </div>
    <label>Foto</label>
        <div class="form-group m-b-30">
          <div id="camera_wrapper">
          <!-- <div id="camera"></div>
          <br />
          <button id="capture_btn">Capture</button>
          </div> -->
          <!-- <div id="show_saved_img" ></div> -->
          <input type="file" name="file">
        </div>
    <label>KTP</label>
        <div class="form-group m-b-30">
          <div id="camera_wrapper">
          <!-- <div id="camera"></div>
          <br />
          <button id="capture_btn">Capture</button>
          </div> -->
          <!-- <div id="show_saved_img" ></div> -->
          <input type="file" name="ktp">
        </div>
        <div class="col-sm-9 col-sm-offset-3">
          <div class="pull-right">
            <input type="submit" class="btn btn-embossed btn-primary m-r-20" value="save">
            <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
          </div>
        </div>
      </form>
<?php endif ?>
<?php if ($_GET['form'] == "update_penyewa"): ?>
  <?php 
  require_once 'class/Penyewa.php';
  $Penyewa = new Penyewa();
  $save = $Penyewa->change_data_penyewa($_POST);
    // print_r($_POST);
    if ($_POST['penyewa_id'] == null) {
      $html->redirect('?page=penyewa&success=1');
    } else {
      $html->redirect('?page=penyewa&success=2');
    }
  ?>
<?php endif ?>
<?php if ($_GET['form'] == "delete_penyewa"): ?>
  <?php 
  require_once 'class/Penyewa.php';
  $Penyewa = new Penyewa();
  $save = $Penyewa->delete_data_penyewa($_GET);
    // print_r($_GET);
    if ($_POST['penyewa_id'] == null) {
      $html->redirect('?page=penyewa&success=1');
    } else {
      $html->redirect('?page=penyewa&success=2');
    }
  ?>
<?php endif ?>
<?php else: ?>
  <div class="panel-header md-panel-controls">
    <h3><i class="fa fa-table"></i> <strong>Data </strong> Penyewa</h3>
  </div>
  <div class="panel-content pagination2 table-responsive">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>No Register</th>
          <th>Nama</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Jenis Pengenal</th>
          <th>Id Pengenal</th>
          <th>No handphone</th>
          <th>Agama</th>
          <th>Status Kawin</th>
          <th>Pekerjaan</th>
          <th>Alamat</th>
          <th>Tanggal Masuk</th>
          <th>Foto</th>
          <th>KTP</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        require_once 'class/Penyewa.php';
        $penyewa = new Penyewa();

        $get_penyewa = $penyewa->showPenyewa();
        $no = 1;
        foreach ($get_penyewa as $penyewa) {
          echo "<tr>";
          echo "<td>".$no++."</td>";
          echo "<td>REG-".$penyewa['no_register']."</td>";
          echo "<td>".$penyewa['nama']."</td>";

          echo "<td>".$penyewa['tgl_lahir']."</td>";
          echo "<td>".$penyewa['tempat_lahir']."</td>";
          echo "<td>".$penyewa['jk']."</td>";
          echo "<td>".$penyewa['jenis_pengenal']."</td>";
          echo "<td>".$penyewa['ID_pengenal']."</td>";
          echo "<td>".$penyewa['hp']."</td>";
          echo "<td>".$penyewa['agama']."</td>";
          echo "<td>".$penyewa['status']."</td>";
          echo "<td>".$penyewa['pekerjaan']."</td>";
          echo "<td>".$penyewa['alamat']."</td>";
          echo "<td>".$penyewa['tanggal_masuk']."</td>";
          echo "<td><img src='uploads/".$penyewa['file']."' width='100' height='100'></td>";
          echo "<td><img src='uploads/".$penyewa['ktp']."' width='100' height='100'></td>";
          echo '<td class=""><a class="edit btn btn-sm btn-default" href="?page=penyewa&form=change_penyewa&penyewa_id='.$penyewa['id'].'"><i class="fa fa-edit"></i><div class="ripple-wrapper"></div></a>  <a class="delete btn btn-sm btn-danger" href="?page=penyewa&form=delete_penyewa&penyewa_id='.$penyewa['id'].'"><i class="fa fa-remove"></i></a>
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