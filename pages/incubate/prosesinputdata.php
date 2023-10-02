<?php
error_reporting();
include '../../koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>location='../../user/login.php'</script>";
}

$query = mysqli_query($koneksi, "SELECT * FROM peternak WHERE USERNAME = '$_SESSION[username]'");
$row = mysqli_fetch_assoc($query);
$KET_MENETAS = "0";

if (isset($_POST['simpan'])) {

    $ID_PETERNAK = $row['ID_PETERNAK']; 
	$NO_KLOTER = $_POST['NO_KLOTER'];
	$TGL_MASUK = $_POST['TGL_MASUK'];
	$JMLH_TELUR = $_POST['JMLH_TELUR'];
	$PRED_MENETAS = $_POST['PRED_MENETAS'];

	$query = "INSERT INTO penetasan (ID_PETERNAK, NO_KLOTER, TGL_MASUK, JMLH_TELUR, PRED_MENETAS, KET_MENETAS) VALUES ('$ID_PETERNAK', '$NO_KLOTER', '$TGL_MASUK', '$JMLH_TELUR', '$PRED_MENETAS', '$KET_MENETAS')";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
			" - " . mysqli_error($koneksi));
	} else {
		echo "<script>window.location.href='incubate.php'</script> ";
	}

}