<?php
session_start();
include "koneksi.php";

if(isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $no_wa = mysqli_real_escape_string($koneksi, $_POST['no_wa']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user';

    // Cek username/email sudah dipakai
    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($cek) > 0){
        echo "<script>alert('Username atau Email sudah digunakan!');</script>";
    } else {
        $simpan = mysqli_query($koneksi, "INSERT INTO user (nama, username, email, no_wa, password, role) 
                                          VALUES ('$nama', '$username', '$email', '$no_wa', '$password', '$role')");
        if($simpan){
            echo "<script>alert('Registrasi berhasil! Silahkan login.');window.location='login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TickeTree - Register</title>
<link rel="stylesheet" href="file css/log and reg.css">
</head>
<body>
<div class="container">
  <div class="card">
    <h2 class="judul">Daftar TickeTree</h2>
    <form class="login-form" method="POST">
      <label class="ntah">Nama Lengkap</label>
      <input type="text" name="nama" placeholder="Nama Siapa?" required>

      <label class="ntah">Username</label>
      <input type="text" name="username" placeholder="Masukkan Username" required>

      <label class="ntah">Email</label>
      <input type="email" name="email" placeholder="email@gmail.com" required>

      <label class="ntah">Nomor WhatsApp</label>
      <input type="tel" name="no_wa" placeholder="08?" required>

      <label class="ntah">Password</label>
      <input type="password" name="password" placeholder="Password" required>

      <button type="submit" name="submit">Daftar Sekarang</button>

      <p class="register">
        Sudah punya akun? <a href="login.php">Masuk sekarang</a>
      </p>
    </form>
  </div>
</div>
</body>
</html>
