<?php
    include ('../../koneksi.php');
    
    // Prepare the SQL statement
    $SUHU = $_GET['suhu'];
    $KELEMBABAN = $_GET['kelembaban'];

    $result = mysqli_query ($koneksi,"INSERT INTO MONITOR (SUHU, KELEMBABAN) VALUES ('$SUHU', '$KELEMBABAN')");    
    
    if (!$result) 
        {
            die ('Invalid query: '.mysqli_error($koneksi));
        }  
?>