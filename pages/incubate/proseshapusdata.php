<?php
error_reporting(0);
include '../../koneksi.php';

if (isset($_GET['id'])) {

	$ID_KLOTER = $_GET['id'];

	$query = "DELETE from PENETASAN where ID_KLOTER= '$ID_KLOTER' ";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		die("Data gagal dihapus; " . mysqli_errno($koneksi) . mysqli_error($koneksi));
	} else {
		echo "<script>window.location.href='incubate.php'</script>";
	}
}
?>