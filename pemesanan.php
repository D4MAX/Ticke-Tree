<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    die("Tiket tidak ditemukan.");
}

$id_tiket = $_GET['id'];

// Ambil data tiket
$query = $koneksi->query("SELECT * FROM tiket WHERE id_tiket = $id_tiket");
$tiket = $query->fetch_assoc();

if (!$tiket) {
    die("Event tidak ditemukan!");
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan Tiket</title>
    <link rel="stylesheet" href="file css/pembayaran_pemesanan.css">
</head>

<body>

<div class="form-box">
    <h2>Pemesanan Tiket</h2>
    <p><b><?= htmlspecialchars($tiket['nama_event']) ?></b></p>

    <form action="pemesanan-proses.php" method="POST">

        <label>Harga per Tiket</label>
        <input type="text" value="Rp <?= number_format($tiket['harga_event']) ?>" readonly>

        <label>Jumlah Tiket</label>
        <input type="number" name="jumlah" id="jumlah" min="1" required>

        <label>Total Harga</label>
        <input type="text" id="total" readonly>

        <input type="hidden" name="id_tiket" value="<?= $id_tiket ?>">

        <button class="btn-primary">Pesan Sekarang</button>
    </form>

    <a href="event.php" class="btn-secondary">Kembali</a>
</div>

<script>
    const jumlahInput = document.getElementById("jumlah");
    const totalInput = document.getElementById("total");
    const harga = <?= $tiket['harga_event'] ?>;

    jumlahInput.addEventListener("input", function () {
        let jumlah = jumlahInput.value || 0;
        totalInput.value = "Rp " + (jumlah * harga).toLocaleString();
    });
</script>

</body>
</html>
