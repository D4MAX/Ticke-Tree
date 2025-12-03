<?php
include 'koneksi.php';

// validasi id
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tiket tidak valid.");
}

$id = (int) $_GET['id'];

// ambil data tiket
$stmt = $koneksi->prepare("SELECT * FROM tiket WHERE id_tiket = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

if (!$data) {
    die("Data tiket tidak ditemukan.");
}

// fallback values
$nama_event = htmlspecialchars($data['nama_event']);
$deskripsi_event = htmlspecialchars($data['deskripsi_event']);
$kategori_event = htmlspecialchars($data['kategori_event']);
$tanggal_event = $data['tanggal_event'];
$kuota_event = $data['kuota_event'];
$status_event = $data['status_event'];
$harga_event = $data['harga_event'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Tiket - TickeTree</title>
  <link rel="stylesheet" href="file css/dash.css">
</head>
<body>
  <header class="navbar">
    <div class="logo">
      <div class="icon">TT</div>
      <span onclick="window.location.href='dashboard.php'" style="cursor:pointer" class="title">TickeTree Dashboard</span>
    </div>
    <nav>
      <a href="dashboard.php">Dashboard</a>
      <a href="logout.php">Logout</a>
    </nav>
  </header>

  <main class="container">
    <section class="card">
      <h2 class="judul">Edit Tiket</h2>
      <form action="tiket-update.php" method="POST">
        <input type="hidden" name="id_tiket" value="<?php echo $id; ?>">

        <table>
          <tr>
            <td>Judul Event</td>
            <td><input type="text" name="nama_event" value="<?php echo $nama_event; ?>" required></td>
          </tr>
          <tr>
            <td>Deskripsi Event</td>
            <td><input type="text" name="deskripsi_event" value="<?php echo $deskripsi_event; ?>"></td>
          </tr>
          <tr>
            <td>Kategori Event</td>
            <td><input type="text" name="kategori_event" value="<?php echo $kategori_event; ?>"></td>
          </tr>
          <tr>
            <td>Tanggal Event</td>
            <td><input type="date" name="tanggal_event" value="<?php echo $tanggal_event; ?>" required></td>
          </tr>
          <tr>
            <td>Kuota Event</td>
            <td><input type="number" name="kuota_event" value="<?php echo $kuota_event; ?>" required></td>
          </tr>
          <tr>
            <td>Status Event</td>
            <td>
              <select name="status_event">
                <option value="aktif" <?php echo ($status_event=='aktif')?'selected':''; ?>>Aktif</option>
                <option value="selesai" <?php echo ($status_event=='selesai')?'selected':''; ?>>Selesai</option>
                <option value="dibatalkan" <?php echo ($status_event=='dibatalkan')?'selected':''; ?>>Dibatalkan</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Harga Tiket</td>
            <td><input type="number" step="0.01" name="harga_event" value="<?php echo $harga_event; ?>" required></td>
          </tr>
        </table>

        <button type="submit" class="btn-primary">
          <span class="plus">✎</span> Update Tiket
        </button>
      </form>
    </section>
  </main>
</body>
</html>
