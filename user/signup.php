<?php
include '../koneksi.php';
if (isset($_POST['signup'])) {
    $id = rand(001, 999);
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $query = mysqli_query($koneksi, "SELECT username FROM peternak WHERE username = '$username'");
    if (mysqli_fetch_assoc($query)) {
        echo "<script>alert('Akun sudah terdaftar');</script>";
        echo "<script>location='login.php'</script>";
    } else {
        if ($password == $confirmpassword) {
            $password_final = md5($password);
            $query = mysqli_query($koneksi, "INSERT INTO peternak VALUES ('" . $id . "','" . $name . "','" . $username . "','" . $email . "','" . $password_final . "')");
            if ($query) {
                echo "<script>alert('Registrasi berhasil');</script>";
                echo "<script>location='login.php'</script>";
            } else {
                echo "<script>alert('Registrasi gagal');</script>";
                echo "<script>location='login.php'</script>";
            }
        } else {
            echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
            echo "<script>location='login.php'</script>";
        }
    }
}
?>