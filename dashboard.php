<?php
session_start();
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['loggedInUser'];

include 'koneksi.php';

$result = $koneksi->query("SELECT * FROM tiket ORDER BY id_tiket DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TickeTree Dashboard</title>
<link rel="stylesheet" href="file css/dash.css">
</head>
<body>
<header class="navbar">
  <div class="logo">
    <div class="icon">TT</div>
    <span class="title">TickeTree Dashboard</span>
  </div>
  <nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
  </nav>
</header>

<main class="container">
  <section class="card">
    <h2>Selamat Datang, <?php echo htmlspecialchars($user); ?></h2>
    <p>Kelola tiket acara Anda di sini!</p>
    <a href="tiket-buat.php" class="btn-primary"><span class="plus">+ Buat Acara Baru</span></a>
  </section>

  <section class="card">
    <h3>Daftar Tiket</h3>
    <table border="1" cellpadding="8" cellspacing="0">
      <thead>
        <tr>
          <th>Nama Event</th>
          <th>Tanggal</th>
          <th>Peserta</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><a href="info_tiket.php?id=<?php echo $row['id_tiket']; ?>"><?php echo htmlspecialchars($row['nama_event']); ?></a></td>
          <td><?php echo htmlspecialchars($row['tanggal_event']); ?></td>
          <td><?php echo htmlspecialchars($row['kuota_event']); ?></td>
          <td><?php echo htmlspecialchars($row['status_event']); ?></td>
          <td>
            <a href="tiket-edit.php?id=<?php echo $row['id_tiket']; ?>">
              <img src="gambar/setting.png" width="24" height="24" alt="Edit">
            </a>
            <a href="tiket-hapus.php?id=<?php echo $row['id_tiket']; ?>" onclick="return confirm('Yakin ingin menghapus tiket ini?')">
              <img src="gambar/delete.png" width="24" height="24" alt="Hapus">
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </section>
</main>
</body>
</html>
