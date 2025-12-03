<?php
session_start();
include "koneksi.php";

if (!isset($_GET['id'])) {
    die("ID pemesanan tidak ditemukan");
}

$id_pemesanan = $_GET['id'];

$query = $koneksi->query("SELECT * FROM pemesanan WHERE id_pemesanan = '$id_pemesanan'");
$data = $query->fetch_assoc();

if (!$data) {
    die("Data pemesanan tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="file css/pembayaran_pemesanan.css">
</head>
<body>

<div class="form-box">
    <h2>Pembayaran Tiket</h2>
    <p>Total yang harus dibayar</p>

    <form action="pembayaran-cetak.php" method="POST">

        <input type="hidden" name="id_pemesanan" value="<?= $data['id_pemesanan'] ?>">
        <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">

        <label>Metode Pembayaran</label>
        <select name="metode" required>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="E-Wallet">E-Wallet</option>
            <option value="Kartu Kredit">Kartu Kredit</option>
        </select>

        <label>Jumlah Bayar</label>
        <input type="text" value="Rp <?= number_format($data['total_harga']) ?>" readonly>
        <input type="hidden" name="jumlah_bayar" value="<?= $data['total_harga'] ?>">

        <button type="submit" class="btn-primary">Bayar Sekarang</button>
    </form>

    <a href="event.php" class="btn-secondary">Kembali</a>
</div>

</body>
</html>
