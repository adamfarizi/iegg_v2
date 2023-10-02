<?php
	$koneksi = mysqli_connect('localhost','root','','iegg_data');

	if (!$koneksi)
	{
		die ("Koneksi dengan database gagal: ".mysqli_connect_errno().mysqli_connect_error());
	}
?>