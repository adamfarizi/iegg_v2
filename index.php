<?php
error_reporting();
include 'koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>location='user/login.php'</script>";
}

$query = mysqli_query($koneksi,"SELECT * FROM peternak WHERE USERNAME = '$_SESSION[username]'");
$rowsession = mysqli_fetch_assoc($query);
$ID_PETERNAK = $rowsession['ID_PETERNAK'];
$NAMA_PETERNAK = $rowsession['NAMA_PETERNAK'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IEGG | Dashboard</title>
  <link rel="shortcut icon" href="image/icon.png" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-gradient-warning position-absolute w-100"></div>
  <aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php" target="_blank">
        <img src="./image/icon.png" class="navbar-brand-img h-100" alt="main_logo" />
        <span class="ms-2 font-weight-bold" style="font-size: 15px">IEGG | Admin Side</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="./pages/dashboard/dashboard.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./pages/incubate/incubate.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Incubate</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./pages/monitors/monitors.html">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-chart-bar-32 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Monitors</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3">
      <div class="card card-plain shadow-none" id="sidenavCard" style="height: 180px"></div>
      <a class="btn btn-warning btn-sm mb-0 w-100" href="user/logout.php" type="button">
        <i class="fa fa-user me-sm-1"></i>
        <span class="d-sm-inline d-none">Log Out</span>
      </a>
    </div>
  </aside>

  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">
              <a class="opacity-5 text-white" href="javascript:;">Pages</a>
            </li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
              Dashboard
            </li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0" style="font-size: 30px;">Dashboard</h6>
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
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Temperature
                    </p>
                    <h5 class="font-weight-bolder">
                      <?php 
                      $result = mysqli_query($koneksi, "SELECT SUHU FROM monitor ORDER BY WAKTU DESC LIMIT 1 ");
                      if ($row = mysqli_fetch_array($result)) {
                        $suhuTerbaru = $row['SUHU'];
                        // Lakukan sesuatu dengan data suhu terbaru
                        echo $suhuTerbaru;
                      } else {
                        echo "none";
                      }
                      ?>  
                      °C
                    </h5>
                    <p class="mb-0">
                      <span class="text text-sm font-weight-bolder">38 °C </span>
                      <span class="text text-sm"> ideal temperature </span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="fa fa-temperature-high text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Humidity
                    </p>
                    <h5 class="font-weight-bolder">
                    <?php 
                      $result = mysqli_query($koneksi, "SELECT KELEMBABAN FROM monitor ORDER BY WAKTU DESC LIMIT 1");
                      if ($row = mysqli_fetch_array($result)) {
                        $kelembabanTerbaru = $row['KELEMBABAN'];
                        // Lakukan sesuatu dengan data suhu terbaru
                        echo $kelembabanTerbaru;
                      } else {
                        echo "none";
                      }
                      ?>  
                    %
                    </h5>
                    <p class="mb-0">
                    <span class="text text-sm font-weight-bolder">57 % </span>
                      <span class="text text-sm"> ideal humidity </span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="fa fa-percent text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Lots of Groups
                    </p>
                    <h5 class="font-weight-bolder">
                      <?php 
                      $result = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM penetasan WHERE ID_PETERNAK = $ID_PETERNAK");
                      if ($row = mysqli_fetch_array($result)) {
                        $totalKloter = $row['total'];
                        echo $totalKloter;
                      } else {
                        echo "0";
                      }
                      ?>  
                    </h5>
                    <p class="mb-0">
                      <span class="text text-sm font-weight-bolder">
                      <?php
                      $result = mysqli_query($koneksi, "SELECT SUM(JMLH_TELUR) AS total FROM penetasan  WHERE ID_PETERNAK = $ID_PETERNAK");
                      if ($row = mysqli_fetch_array($result)) {
                        $totalTelur = $row['total'];
                        echo $totalTelur;
                      } else {
                        echo "0";
                      }
                      ?>
                      </span>
                      <span class="text text-sm">eggs finish</span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                      Peternak
                    </p>
                    <h5 class="font-weight-bolder">
                      <?php echo $NAMA_PETERNAK; ?>
                    </h5>
                    <p class="mb-0">
                      <span class="text text-sm">ID : </span>
                      <span class="text text-sm font-weight-bolder"><?php echo $ID_PETERNAK; ?></span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Temperature °C</h6>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Eggs Data</h6>
            </div>
            <div class="card-body p-3">
              <?php
                $result = mysqli_query($koneksi, "SELECT * FROM penetasan WHERE ID_PETERNAK = $ID_PETERNAK ORDER BY ID_KLOTER ASC");
                if ($row = mysqli_fetch_array($result)) {
              ?>
              <div class="chart">
                <canvas id="bar-chart" class="chart-canvas" height="300"></canvas>
              </div>
              <?php } 
                else {
              ?>
                <div class="col text-center h-100">
                  <div style="height: 35%;"></div>
                  <p class="text-center">No Data Yet</p>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-lg-14 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-header pb-0 p-4">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Groups Data</h6>
              </div>
            </div>
            <div class="card-body pt-1">
              <div class="table-responsive" style="max-height:250px; overflow-y: auto;">
                <table class="table align-items-center text-center mb-0">
                  <thead style="position: sticky; top: 0; background-Color:#ffffff;">
                    <tr>
                      <th class="text-uppercase">Groups</th>
                      <th class="text-uppercase">Date of entry</th>
                      <th class="text-uppercase">Hatch Predictions</th>
                      <th class="text-uppercase">Number of Eggs</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = mysqli_query($koneksi, "SELECT * FROM penetasan WHERE ID_PETERNAK = $ID_PETERNAK ORDER BY ID_KLOTER ASC");
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                      <td>
                        <?php echo $row['NO_KLOTER']; ?>
                      </td>
                      <td>
                        <?php echo $row['TGL_MASUK']; ?>
                      </td>
                      <td>
                        <?php echo $row['PRED_MENETAS']; ?>
                      </td>
                      <td>
                        <?php echo $row['JMLH_TELUR']; ?>
                      </td>
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
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, "rgba(255, 179, 92, 0.2)");
    gradientStroke1.addColorStop(0.2, "rgba(255, 179, 92, 0.0)");
    gradientStroke1.addColorStop(0, "rgba(255, 179, 92, 0)");

    <?php
    // Query untuk mengambil rata-rata suhu per hari dari database
    $query = mysqli_query($koneksi, "SELECT AVG(SUHU) AS rata_suhu, DATE_FORMAT(WAKTU, '%d %b') AS tanggal FROM monitor GROUP BY DATE(WAKTU) ORDER BY WAKTU DESC LIMIT 5");

    $suhuPerHari = array();
    $labelsuhu = array();

    while ($row = mysqli_fetch_assoc($query)) {
        $suhuPerHari[] = $row['rata_suhu'];
        $labelsuhu[] = $row['tanggal'];
    }
    ?>

    new Chart(ctx1, {
      type: "line",
      data: {
        labels:<?php echo json_encode($labelsuhu); ?>,
        datasets: [
          {
            label: "Temperature",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#f97742",
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
              color: "orange",
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
    var ctx1 = document.getElementById("bar-chart").getContext("2d");
    <?php
    // Query untuk mengambil data jumlah telur per kloter dari database
    $result = mysqli_query($koneksi, "SELECT * FROM penetasan WHERE ID_PETERNAK = $ID_PETERNAK ORDER BY ID_KLOTER DESC LIMIT 5");
    while ($row = mysqli_fetch_assoc($result)) {
        $dataTelurPerKloter[] = $row['JMLH_TELUR'];
        $labeltelur[] = "Group " . $row['NO_KLOTER'];
    }
    ?>

    new Chart(ctx1, {
      type: "bar",
      data: {
        labels: <?php echo json_encode($labeltelur); ?>,
        datasets: [
          {
            label: "Number of Eggs",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderRadius: 5,
            borderColor: "#f97742",
            backgroundColor: "#f97742",
            fill: true,
            data: <?php echo json_encode($dataTelurPerKloter); ?>,
            maxBarThickness: 40,
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
              color: "orange",
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
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>