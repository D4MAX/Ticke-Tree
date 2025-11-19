<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TickeTree - Login</title>
    <link rel="stylesheet" href="file css/log and reg.css" />
  </head>
  <body>
<?php
session_start();
include "koneksi.php";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "<script>alert('Semua data wajib diisi!');</script>";
    } else {

        // CARI USER DI DATABASE
        $result = mysqli_query($koneksi, "SELECT * FROM userj WHERE username='$username'");
        $data = mysqli_fetch_assoc($result);

        if ($data) {
            // COCOKKAN PASSWORD
            if (password_verify($password, $data['password'])) {

                // SIMPAN SESSION
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['role'] = $data['role'];

                // REDIRECT SESUAI ROLE
                if ($data['role'] == 'admin') {
                    echo "<script>alert('Login Admin Berhasil!');</script>";
                    echo "<meta http-equiv='refresh' content='1;url=admin_dashboard.php'>";
                } else {
                    echo "<script>alert('Login User Berhasil!');</script>";
                    echo "<meta http-equiv='refresh' content='1;url=event.php'>";
                }

            } else {
                echo "<script>alert('Password salah!');</script>";
            }
        } else {
            echo "<script>alert('Username tidak ditemukan!');</script>";
        }
    }
}
?>


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
          Sederhanakan manajemen event Anda. Cukup masuk untuk mengatur acara,
          melihat status tiket, dan memonitor kehadiran peserta. Ringkas,
          efisien, dan ideal untuk tumbuh kembang komunitas Anda.
        </p>
        <form class="login-form" method="POST" action="">
          <label>Username</label>
          <input type="text" id="username" name="username" placeholder="Masukkan Username" />

          <label>Password</label>
          <input type="password" id="password" name ="password" placeholder="Password" />

          <div class="options">
            <label><input type="checkbox" /> Ingat Saya</label>
            <a href="#" class="forgot">Lupa password?</a>
          </div>

          <button type="submit" id="login" name="submit">
            Masuk ke TickeTree
          </button>
          <div id="snackbar">Login Berhasil!</div>

          <p class="register">
            Belum punya akun? <a href="reg.php">Daftar sekarang</a>
          </p>
          <div id="hasil"></div>
        </form>
      </div>
    </div>
    <script src="log.js"></script>
  </body>
</html>