<?php
error_reporting(0);
include '../../koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
  echo "<script>location='../../user/login.php'</script>";
}

$query = mysqli_query($koneksi, "SELECT * FROM peternak WHERE USERNAME = '$_SESSION[username]'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IEGG | Monitors</title>
  <link rel="shortcut icon" href="../../image/icon.png" />

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
          <a class="nav-link" href="../incubate/incubate.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Incubate</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../monitors/monitors.php">
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
              Monitors
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0" style="font-size: 30px;">Monitors Incubator Data</h6>
          <p class="text-white mb-0">Displays temperature and humidity data from the incubator</p>
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
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Temperature °C</h6>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line-temp" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Humidity %</h6>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line-hum" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-14 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-header pb-0 p-3"></div>
            <div class="card-body pt-1">
              <div class="table-responsive" style="max-height:500px; overflow-y: auto;">
                <table class="table align-items-center text-center mb-0">
                  <thead style="position: sticky; top: 0; background-Color:#ffffff;">
                    <tr>
                      <th class="text-uppercase">Date</th>
                      <th class="text-uppercase">Times</th>
                      <th class="text-uppercase">Temperature</th>
                      <th class="text-uppercase">Humidity</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $result = mysqli_query($koneksi, "SELECT DATE_FORMAT(WAKTU, '%Y-%m-%d') AS tanggal, DATE_FORMAT(WAKTU, '%H:%i:%s') AS waktu, SUHU, KELEMBABAN FROM monitor ORDER BY WAKTU DESC");

                  while ($row = mysqli_fetch_array($result)) {
                    $tanggal = $row['tanggal'];
                    $waktu = $row['waktu'];
                    $suhu = $row['SUHU'];
                    $kelembaban = $row['KELEMBABAN'];
                  ?>
                    <tr>
                      <td><?php echo $tanggal; ?></td>
                      <td><?php echo $waktu; ?></td>
                      <td><?php echo $suhu; ?> °C</td>
                      <td><?php echo $kelembaban; ?> %</td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
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
  <script>
    var ctx1 = document.getElementById("chart-line-temp").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, "rgba(45, 206, 137, 0.2)");
    gradientStroke1.addColorStop(0.2, "rgba(45, 206, 137, 0)");
    gradientStroke1.addColorStop(0, "rgba(45, 206, 137, 0)");

    <?php
    // Query untuk mengambil rata-rata suhu per hari dari database
    $query = mysqli_query($koneksi, "SELECT AVG(SUHU) AS rata_suhu, DATE_FORMAT(WAKTU, '%d %b') AS tanggal FROM monitor GROUP BY DATE(WAKTU) ORDER BY WAKTU DESC LIMIT 10");

    $suhuPerHari = array();
    $labelsuhu = array();

    while ($row = mysqli_fetch_assoc($query)) {
      $rataSuhu = number_format($row['rata_suhu'], 2);
      $suhuPerHari[] = $rataSuhu;
      $labelsuhu[] = $row['tanggal'];
    }
    ?>

    new Chart(ctx1, {
      type: "line",
      data: {
        labels: <?php echo json_encode($labelsuhu); ?>,
        datasets: [
          {
            label: "Temperature",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#2dce89",
            backgroundColor: gradientStroke1,
            borderWidth: 3,
            fill: true,
            data: <?php echo json_encode($suhuPerHari); ?>,
            maxBarThickness: 6,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
        },
        interaction: {
          intersect: false,
          mode: "index",
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              padding: 10,
              color: "#2dce89",
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              color: "#ccc",
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
        },
      },
    });
  </script>
  <script>
    var ctx1 = document.getElementById("chart-line-hum").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, "rgba(17, 205, 239, 0.2)");
    gradientStroke1.addColorStop(0.2, "rgba(17, 205, 239, 0)");
    gradientStroke1.addColorStop(0, "rgba(17, 205, 239, 0)");

    <?php
    // Query untuk mengambil rata-rata suhu per hari dari database
    $query = mysqli_query($koneksi, "SELECT AVG(KELEMBABAN) AS rata_kelembaban, DATE_FORMAT(WAKTU, '%d %b') AS tanggal FROM monitor GROUP BY DATE(WAKTU) ORDER BY WAKTU DESC LIMIT 10");

    $kelembabanPerHari = array();
    $labelsuhu = array();

    while ($row = mysqli_fetch_assoc($query)) {
      $kelembabanPerHari[] = $row['rata_kelembaban'];
      $labelkelembaban[] = $row['tanggal'];
    }
    ?>

    new Chart(ctx1, {
      type: "line",
      data: {
        labels: <?php echo json_encode($labelkelembaban); ?>,
        datasets: [
          {
            label: "Temperature",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#11cdef",
            backgroundColor: gradientStroke1,
            borderWidth: 3,
            fill: true,
            data: <?php echo json_encode($kelembabanPerHari); ?>,
            maxBarThickness: 6,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
        },
        interaction: {
          intersect: false,
          mode: "index",
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              padding: 10,
              color: "#11cdef",
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              color: "#ccc",
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
        },
      },
    });
  </script>

</body>

</html>