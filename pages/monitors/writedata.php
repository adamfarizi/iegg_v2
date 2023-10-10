<?php
    include ('../../koneksi.php');
    
    // Prepare the SQL statement
    $SUHU = $_GET['suhu'];
    $KELEMBABAN = $_GET['kelembaban'];

    if ($SUHU != 0 || $KELEMBABAN != 0) {
        // Hanya jalankan pernyataan SQL jika suhu atau kelembaban tidak sama dengan 0
        $result = mysqli_query($koneksi, "INSERT INTO MONITOR (SUHU, KELEMBABAN, WAKTU) VALUES ('$SUHU', '$KELEMBABAN', NOW())");
    }
        
    if (!$result) 
        {
            die ('Invalid query: '.mysqli_error($koneksi));
        }  
?>