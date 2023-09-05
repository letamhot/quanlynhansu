<?php
    session_start();

?>
<?php
    include("../connection/connection.php");

    $error = [];
    if(isset($_POST['btnDangnhap']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $_SESSION['email']=$email;
        // var_dump($_SESSION['username']);
        if($email == "" || $password == "" )
        {
            $error['Lỗi! '] = 'Nhập đầy đủ tài khoản và mật khẩu.';
        }
        else
        {
            $sql_login = "SELECT a.email, b.pass, b.email FROM nhanvien as a 
            JOIN role as b on a.idRole = b.id  
            JOIN user as c on c.roleId = b.id  
            WHERE a.email = '".$email."' OR b.email = '".$email."' AND a.pass = MD5('".$password."')";
            $result = mysqli_query($conn, $sql_login);
            if($result != null){
              if(mysqli_num_rows($result)>0)
              {
                  header('location:index.php');
              }
              else
              {
                  $error['Lỗi! '] = 'Tài khoản hoặc mật khẩu không đúng';
              }
              
            }
            
        }
    }
  include("../connection/closedatabase.php");

	?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Hệ thống quản lý</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>Đăng nhập hệ thống</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php if($error) : ?>
          <div class="alert alert-warning fade show mt-3" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php foreach ($error as $key => $er) : ?>
                  <strong><?php echo $key; ?></strong><?php echo $er; ?>
              <?php endforeach; ?>   
          </div>
      <?php endif; ?>
      <form role="form" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input  name="remember" type="checkbox">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="btnDangnhap" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>
</body>
</html>
