<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TickeTree Dashboard</title>
    <link rel="stylesheet" href="file css/dash.css" />
  </head>
  <body>
    <?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['loggedInUser'];
include 'koneksi.php';

// Ambil data tiket terbaru
$result = $koneksi->query("SELECT * FROM tiket ORDER BY id_tiket DESC");

?>
    <!-- NAVBAR -->
    <header class="navbar">
      <div class="logo">
        <div class="icon">TT</div>
        <span class="title">TickeTree Dashboard</span>
      </div>
      <nav>
        <a href="#">My Ticket</a>
        <a href="logout.php">Logout</a>
      </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="container">
      <!-- Welcome Card -->
      <section class="card">
        <h2 id="welcomeUser">Selamat Datang, <?php echo htmlspecialchars($user); ?></h2>
        <p>
          Nikmati event-event seru ini dan temukan pengalaman tak terlupakan bersama komunitasmu hari ini! 
        </p>
        <button class="btn-primary" id="buatTiketBtn">
          <span class="plus">+ Buat acara baru</span>
        </button>
      </section>
      <!-- Event Table -->
      <section class="card">
        <h3>Acara Terbaru</h3>
        <table>
          <thead>
            <tr>
              <th>Nama Event</th>
              <th>Tanggal</th>
              <th>Peserta</th>
              <th>Status</th>
              <th>Kelola</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Open Mic Stand-up</td>
              <td>12 Okt 2025</td>
              <td>45</td>
              <td>Sedang Berjalan</td>
              <td>
                <img
                  src="gambar/setting.png"
                  width="24"
                  height="24"
                  alt="Kelola"
                  class="icon-action"
                />
                <img
                  src="gambar/delete.png"
                  width="24"
                  height="24"
                  alt="hapus"
                  class="icon-action"
                />
              </td>
            </tr>
            <tr>
              <td><a href="info tiket.html">Turnamen Mobile Legends</a></td>
              <td>20 Okt 2025</td>
              <td>32</td>
              <td>Aktif</td>
              <td>
                <img
                  src="gambar/setting.png"
                  width="24"
                  height="24"
                  alt="Kelola"
                  class="icon-action"
                />
                <img
                  src="gambar/delete.png"
                  width="24"
                  height="24"
                  alt="hapus"
                  class="icon-action"
                />
              </td>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?php echo htmlspecialchars($row['nama_event']); ?></td>
      <td><?php echo htmlspecialchars($row['tanggal_event']); ?></td>
      <td><?php echo htmlspecialchars($row['kuota_event']); ?></td>
      <td><?php echo htmlspecialchars($row['status_event']); ?></td>
      <td>
        <img src="gambar/setting.png" width="24" height="24" class="icon-action" />
        <a href="hapus_tiket.php?id=<?php echo $row['id_tiket']; ?>" 
   onclick="return confirm('Yakin ingin menghapus tiket ini?')">
  <img src="gambar/delete.png" width="24" height="24" class="icon-action" />
</a>

      </td>
    </tr>
  <?php } ?>
          </tbody>
        </table>
      </section>
    </main>
    <script src="file js/dash.js"></script>
  </body>
</html>
