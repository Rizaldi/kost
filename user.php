  <?php if (!@$_GET['form']): ?>
    <div class="col-md-12">
      <div class="pull-left">
        <a href="?page=user&form=change_user" type="submit" class="btn btn-embossed btn-primary"><i class="mdi-content-add"></i>Add User<div class="ripple-wrapper"></div></a>
      </div>
    </div>
  <?php endif ?>
</div>
      <?php
        @$get_user = $koneksi->query("SELECT * FROM users where username='".$_GET['user_id']."'");
        @$row_user = mysqli_fetch_assoc($get_user);
      ?>
      <?php if (isset($_GET['form'])): ?>
        <?php if ($_GET['form'] == "change_user"): ?>
          <form action="?page=user&form=save_user" method="post">
            <div class="form-group m-b-30">
              <input type="text" name="username" class="form-control floating-label" placeholder="Nama User" value="<?php echo $row_user['username']; ?>">
            </div>
            <div class="form-group m-b-30">
              <input type="password" name="password" class="form-control floating-label" placeholder="Password">
            </div>
            <div class="form-group m-b-30">
              <label>Group User</label>
                  <select class="form-control" name="hak_akses">
                    <option value="1">Admin</option>
                    <option value="2">Pegawai</option>
                  </select>
            </div>
            <div class="col-sm-9 col-sm-offset-3">
              <div class="pull-right">
                <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save<div class="ripple-wrapper"></div></button>
                <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel<div class="ripple-wrapper"></div></button>
              </div>
            </div>
          </form>
          <?php endif ?>
          <?php if ($_GET['form'] == "save_user"): ?>
          <?php 
            require_once 'class/User.php';
            $user = new User();
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];
            $data['hak_akses'] = $_POST['hak_akses'];
            $save = $user->add_user($data);
            $html->redirect('?page=user');
          ?>
        <?php endif ?>
        <?php if ($_GET['form'] == "delete_user"): ?>
          <?php 
            require_once 'class/User.php';
            $user = new User();
            $save = $user->delete_user($_GET);
            $html->redirect('?page=user');
          ?>
        <?php endif ?>
      <?php else: ?>
        <div class="panel-header md-panel-controls">
          <h3><i class="fa fa-table"></i> <strong>Data </strong> User</h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
          <table class="table table-hover table-dynamic" id="example1">
            <thead>
              <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Password</th>
                <th>Group</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                  require_once 'class/User.php';
                  $user = new User();

                  $get_user = $user->showUser();
                  $no = 0;
                  foreach ($get_user as $user) {
                    echo "<tr>";
                      echo "<td>".$no++."</td>";
                      echo "<td>".$user['username']."</td>";
                      echo "<td>".$user['password']."</td>";
                      if ($user['hak_akses'] == '1') {
                        echo "<td>Admin</td>";
                      }
                      else{
                        echo "<td>Pegawai</td>";
                      }
                      echo '<td class=""><a class="edit btn btn-sm btn-default" href="?page=user&form=change_user&user_id='.$user['username'].'"><i class="fa fa-edit"></i><div class="ripple-wrapper"></div></a>  <a class="delete btn btn-sm btn-danger" href="?page=user&form=delete_user&user_id='.$user['username'].'"><i class="fa fa-remove"></i></a>
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