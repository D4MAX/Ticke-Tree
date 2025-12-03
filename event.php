<?php
include 'koneksi.php';
$result = $koneksi->query("SELECT * FROM tiket ORDER BY id_tiket DESC");
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TickeTree Dashboard</title>
    <link rel="stylesheet" href="file css/event.css" />
</head>
<body>

<header class="navbar">
  <div class="logo">
    <div class="icon">TT</div>
    <span class="title">TickeTree</span>
  </div>
  <nav>
    <a href="myticket.php">My Ticket</a>
    <a href="login.php">Login</a>
  </nav>
</header>

<main class="utama">
  <h2 class="judul">TickeTree</h2>
  <p class="desk">Nikmati event-event seru ini dan temukan pengalaman tak terlupakan bersama komunitasmu hari ini!</p>

  <h3 class="header">Acara Tersedia</h3>

  <div class="event-list">
    <?php while($row = $result->fetch_assoc()): ?>
    <?php 
      $gambar = (!empty($row['gambar_event'])) ? $row['gambar_event'] : "tiket.jpeg";
    ?>
    
    <div class="card-tiket">
      <img src="gambar/<?= $gambar ?>" class="poster">

      <p class="judul-tiket"><?= htmlspecialchars($row['nama_event']) ?></p>

      <a href="pemesanan.php?id=<?= $row['id_tiket'] ?>" class="btn-daftar">
        Registrasi
      </a>
    </div>

    <?php endwhile; ?>
  </div>
</main>

</body>
</html>
