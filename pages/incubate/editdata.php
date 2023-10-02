<?php
error_reporting(0);
include '../../koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
  echo "<script>location='../../user/login.php'</script>";
}

$query = mysqli_query($koneksi, "SELECT * FROM peternak WHERE USERNAME = '$_SESSION[username]'");
$row = mysqli_fetch_assoc($query);

$ID_KLOTER=$TGL_MASUK=$JMLH_TELUR=$PRED_MENETAS=$KET_MENETAS="";

if (isset($_GET["id"])) {
  $id = ($_GET["id"]);

  $result = mysqli_query($koneksi, "SELECT * FROM PENETASAN WHERE ID_KLOTER='$id'");

  while($row = mysqli_fetch_array($result)) {
    $ID_KLOTER = $row["ID_KLOTER"];
    $TGL_MASUK = $row["TGL_MASUK"];
    $JMLH_TELUR = $row["JMLH_TELUR"];
    $PRED_MENETAS = $row["PRED_MENETAS"];
    $KET_MENETAS = $row["KET_MENETAS"];
  }

} else {
  header("location:incubate.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IEGG | Incubate</title>
  <link rel="shortcut icon" href="../../image/icon.png" />

  <link rel="stylesheet" href="pages/dashboard/style/dashboard.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-gradient-warning position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php" target="_blank">
        <img src="../../image/icon.png" class="navbar-brand-img h-100" alt="main_logo" />
        <span class="ms-2 font-weight-bold" style="font-size: 15px">IEGG | Admin Side</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../dashboard/dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./incubate.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Incubate</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../monitors/monitors.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-chart-bar-32 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Monitors</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3">
      <div class="card card-plain shadow-none" id="sidenavCard" style="height: 180px"></div>
      <a class="btn btn-warning btn-sm mb-0 w-100" href="../../user/logout.php" type="button">
        <i class="fa fa-user me-sm-1"></i>
        <span class="d-sm-inline d-none">Log Out</span>
      </a>
    </div>
  </aside>

  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="opacity-5 text-white" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-white opacity-5" aria-current="page">
              Incubate
            </li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
              Edit Eggs Data
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0" style="font-size: 30px;">Edit Eggs Data</h6>
        </nav>
      </div>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-14 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body">
              <form action="proseseditdata.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label h6">Group Id</label>
                  <input class="form-control bg-white" type="number" id="example-text-input ID_KLOTER" name="ID_KLOTER" placeholder="Group id" value="<?php echo $ID_KLOTER; ?>" required readonly>
                </div>
                <div class="form-group">
                  <label for="example-date-input" class="form-control-label h6">Date of entry</label>
                  <input class="form-control" type="date" id="example-date-input TGL_MASUK" name="TGL_MASUK" value="<?php echo $TGL_MASUK; ?>" required>
                </div>
                <div class="form-group">
                  <label for="example-date-input" class="form-control-label h6">Hatch Predictions</label>
                  <input class="form-control" type="date" id="example-date-input PRED_MENETAS" name="PRED_MENETAS" value="<?php echo $PRED_MENETAS; ?>" required>
                </div>
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label h6">Number of Eggs</label>
                  <input class="form-control" type="number" id="example-text-input JMLH_TELUR" name="JMLH_TELUR" placeholder="How much eggs" value="<?php echo $JMLH_TELUR; ?>" required>
                </div>
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label h6">Hatching Eggs</label>
                  <input class="form-control" type="number" id="example-text-input KET_MENETAS" name="KET_MENETAS" placeholder="How much eggs" value="<?php echo $KET_MENETAS; ?>" required>
                </div>
                <button type="submit" class="btn btn-warning btn-lg w-100" name="edit" id="edit" value="Edit">
                  <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                  <span class="btn-inner--text">Edit Data</span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <!--   Core JS Files   -->
  <script src="../../assets/js/core/popper.min.js"></script>
  <script src="../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script src="../../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>