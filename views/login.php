<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Kost Riendra</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="assets/global/images/favicon.png">

        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
          <div class="login-logo">
            <a href="../../index2.html"><b>KOST </b>Ragunan residence</a>
          </div>
          <div class="login-box-body">
            <p class="login-box-msg">Silahkan Login</p>

            <form class="well" action="index.php" method="post">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name="user__name" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="pass__word"  required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                    <label>
                      <input type="checkbox"> Remember Me
                    </label>
                  </div>
                </div>
                <div class="col-xs-4">
                  <input class="btn btn-primary btn-block btn-flat" type="submit" name="prclogin" value="Sign In">
                </div>
              </div>
            </form>
            
          </div>
        </div>
        <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../plugins/iCheck/icheck.min.js"></script>
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
            });
          });
        </script>
    </body>
</html>