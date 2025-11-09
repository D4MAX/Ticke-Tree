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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $wa = $_POST['wa'];
    $pass = $_POST['password'];

    // Validasi input kosong
    if (empty($nama) || empty($user) || empty($email) || empty($wa) || empty($pass)) {
        echo "<script>alert('Daftar Gagal! Semua data wajib diisi!');</script>";
        exit;
    }

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Format email tidak valid!');</script>";
        exit;
    }

    // Validasi nomor WhatsApp (hanya angka, 10-15 digit)
    if (!preg_match('/^[0-9]{10,15}$/', $wa)) {
        echo "<script>alert('Nomor WhatsApp tidak valid! Harus angka 10-15 digit');</script>";
        exit;
    }

    // Validasi panjang password
    if (strlen($pass) < 8) {
        echo "<script>alert('Password minimal 8 karakter!');</script>";
        exit;
    }

    echo "<script>alert('Pendaftaran berhasil!'); window.location.href='login.php';</script>";
}
?>

    <div class="container">
      <div class="card">
        <h2 class="judul">Daftar TickeTree</h2>
        <form class="login-form">
          <label class="ntah">Nama Lengkap</label>
          <input type="text" placeholder="Nama Siapa?" />

          <label class="ntah">Username</label>
          <input type="text" placeholder="Masukkan Username" />

          <label class="ntah">Email</label>
          <input type="email" placeholder="email@gmail.com" />

          <label class="ntah">Nomor WhatsApp</label>
          <input type="tel" placeholder="08?" />

          <label class="ntah">Password</label>
          <input type="password" placeholder="Password" />

          <button type="login">Daftar Sekarang</button>
          <p class="register">
            Sudah punya akun? <a href="login.html">Masuk sekarang</a>
          </p>
          <div id="hasil"></div>
        </form>
      </div>
    </div>
    <script src="file js/reg.js"></script>
  </body>
</html>
