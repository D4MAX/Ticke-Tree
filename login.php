<?php
session_start();
include "koneksi.php";

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        echo "<script>alert('Semua data wajib diisi!');</script>";
    } else {
        $query = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($result);

        if($data && password_verify($password, $data['password'])) {

            // Set session
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            // Arahkan sesuai username/role
            if($data['username'] === 'admin') {
                echo "<script>alert('Login Admin Berhasil!');</script>";
                echo "<meta http-equiv='refresh' content='1;url=dashboard.php'>";
            } else {
                echo "<script>alert('Login User Berhasil!');</script>";
                echo "<meta http-equiv='refresh' content='1;url=event.php'>";
            }

        } else {
            echo "<script>alert('Username atau password salah!');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TickeTree - Login</title>
<link rel="stylesheet" href="file css/log and reg.css">
</head>
<body>
<div class="container">
  <div class="card">
    <div class="logo">
      <div class="icon">TT</div>
      <div>
        <h2>TickeTree</h2>
        <p>Ticketing Digital untuk Event Komunitas</p>
      </div>
    </div>
    <h1>Selamat Datang!</h1>
    <p class="desc">
      Sederhanakan manajemen event Anda. Masuk untuk mengatur acara, melihat status tiket, dan memonitor kehadiran peserta.
    </p>
    <form class="login-form" method="POST">
      <label class="ntah">Username</label>
      <input type="text" name="username" placeholder="Masukkan Username" required>

      <label class="ntah">Password</label>
      <input type="password" name="password" placeholder="Password" required>

      <div class="options">
        <label><input type="checkbox"> Ingat Saya</label>
        <a href="#">Lupa password?</a>
      </div>

      <button type="submit" name="submit">Masuk ke TickeTree</button>

      <p class="register">
        Belum punya akun? <a href="reg.php">Daftar sekarang</a>
      </p>
    </form>
  </div>
</div>
</body>
</html>
