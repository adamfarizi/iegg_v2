<?php
ob_start();
session_start();
error_reporting();
include '../koneksi.php';

if (isset($_COOKIE['username']) && isset($_COOKIE['pass'])) {
  $username = $_COOKIE['username'];
  $pass = $_COOKIE['pass'];

  $sql = mysqli_query($koneksi, "SELECT password FROM peternak WHERE username = '$username'");
  $row = mysqli_fetch_assoc($sql);

  if ($pass == $row['password']) {
    $_SESSION['login'] = true;
    exit;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="shortcut icon" href="../image/icon.png">
  <title>IEGG | Login Page</title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-7 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('../image/login_bg.png');background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header text-center">
                  <img src="../image/login_logo.png" alt="" class="login_logo w-35">
                </div>
                <div class="card-header pb-0 text-center">
                  <h4 class="font-weight-bolder" style="font-size: 30px;">Hello Again !</h4>
                  <p class="mb-0">Enter your username and password to sign in</p>
                </div>
                <div class="card-body">
                  <form role="form" action="" method="POST">
                    <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" name="username" required>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" name="password" required>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-warning btn-lg w-100 mt-4 mb-0" name="login">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="javascript:;" class="text-warning text-gradient font-weight-bold" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="col-md-4">
      <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-warning text-gradient">Join us today</h3>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body pb-3">
                  <form role="form text-left" method="POST" action="signup.php">
                    <label>Name</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon" name="name" required>
                    </div>
                    <label>Username</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="name-addon" name="username" required>
                    </div>
                    <label>Email</label>
                    <div class="input-group mb-3">
                      <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email" required>
                    </div>
                    <label>Password</label>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password" required>
                    </div>
                    <label>Confirm Password</label>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="password-addon" name="confirmpassword" required>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-warning btn-lg btn-rounded w-100 mt-4 mb-0" name="signup">Sign up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-sm-4 px-1">
                  <p class="mb-4 mx-auto">
                    Already have an account?
                    <a href="login.php" class="text-warning text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = mysqli_query($koneksi, "SELECT * FROM peternak WHERE username ='$username'");
    $cek_akun = mysqli_num_rows($sql);

    if ($cek_akun > 0) {
      $data_akun = mysqli_fetch_assoc($sql);
      $password2 = $data_akun['PASSWORD'];
      if ($password == $password2) {
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;
        if (isset($_POST["remember"])) {
          setcookie('username', $data_akun['USERNAME'], time() + 3600);
          setcookie('pass', $data_akun['PASSWORD'], time() + 3600);
        }
        header('Location:../index.php');
        exit;
      } else {
        echo "<script>alert('Password salah !');</script>";
      }
    } else {
      echo "<script>alert('Akun tidak ditemukan');</script>";
    }
  }
  
  ob_end_flush();
  ?>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>