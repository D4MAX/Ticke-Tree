<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tiket WHERE id_tiket = $id";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Tiket berhasil dihapus!'); window.location='dashboard.php';</script>";
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    echo "<script>alert('ID tiket tidak ditemukan!'); window.location='dashboard.php';</script>";
}
?>
