<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $wa = $_POST['wa'];
    $password = $_POST['password'];

    // CEK INPUT KOSONG
    if (empty($nama) || empty($username) || empty($email) || empty($wa) || empty($password)) {
        echo "<script>alert('Semua data wajib diisi!'); window.history.back();</script>";
        exit();
    }

    // CEK USERNAME SUDAH ADA
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah terdaftar!'); window.history.back();</script>";
        exit();
    }

    // HASH PASSWORD
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // INSERT KE DATABASE (role default user)
    $query = "INSERT INTO users (nama, username, email, no_wa, password, role)
              VALUES ('$nama', '$username', '$email', '$wa', '$hashed', 'user')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Registrasi Berhasil! Silakan Login.'); 
        window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
