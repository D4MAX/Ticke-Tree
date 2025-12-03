<?php
include "koneksi.php";
session_start();
$id = $_SESSION['id_user'];

// Ambil data POST
$id_tiket = $_POST['id_tiket'] ?? 0;
$jumlah = $_POST['jumlah'] ?? 1;

// Ambil harga tiket dari tabel tiket (supaya total_harga tidak kosong)
$cekHarga = $koneksi->query("SELECT harga_event FROM tiket WHERE id_tiket = '$id_tiket'");

$dataHarga = $cekHarga->fetch_assoc();
$harga = $dataHarga['harga_event'];


// Hitung total harga
$total_harga = $harga * $jumlah;

// Insert ke tabel pemesanan
$sql = "INSERT INTO pemesanan (id_user, id_tiket, tanggal_pesan, jumlah, total_harga, status) 
        VALUES ('$id', '$id_tiket', NOW(), '$jumlah', '$total_harga', 'belum bayar')";

if($koneksi->query($sql)) {
    $id_pemesanan = $koneksi->insert_id;
    header("Location: pembayaran.php?id=".$id_pemesanan);
    exit();
} else {
    echo "Error: " . $koneksi->error;
}
?>
