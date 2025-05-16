<?php
session_start();
include 'koneksi/koneksi.php'; 
if (isset($_POST['login'])) {
    $user_input = mysqli_real_escape_string($koneksi, $_POST['username']); 
    $pass_input = mysqli_real_escape_string($koneksi, $_POST['password']);

    //  mencari pengguna berdasarkan username dan password
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user_input' AND password='$pass_input'");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_level'] = $data['id_level']; 
        $_SESSION['nama_user'] = $data['nama_user']; 
       
        
        if ($_SESSION['id_level'] == 111) {
            header("Location: ./index");
            exit(); 
        } elseif ($_SESSION['id_level'] == 222) {
            header("Location: ./index2.html"); 
            exit(); 
        } else {
            echo "<script>alert('ussername pengguna tidak dikenali.'); window.location='./index';</script>"; 
            exit();
        }
       
    } else {
        echo "<script>alert('Username atau Password Salah.'); window.location='./index';</script>"; 
        exit();
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GUMMY RESTO| Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>GUMMY</b>RESTO</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign inn</p>

      <form action="index" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name= "ussername" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name= "password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name = "login" type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>>
  </div>
</div>
<script src="asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="asseet/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>
</body>
</html>

