
<?php
include 'koneksi.php';

if (!isset($_POST['id_tiket'])) exit("ID tiket tidak ditemukan");

$id = (int) $_POST['id_tiket'];
$nama_event = $_POST['nama_event'];
$deskripsi_event = $_POST['deskripsi_event'];
$kategori_event = $_POST['kategori_event'];
$tanggal_event = $_POST['tanggal_event'];
$kuota_event = (int) $_POST['kuota_event'];
$status_event = $_POST['status_event'];
$harga_event = (float) $_POST['harga_event'];

$stmt = $koneksi->prepare("UPDATE tiket SET nama_event=?, deskripsi_event=?, kategori_event=?, tanggal_event=?, kuota_event=?, status_event=?, harga_event=? WHERE id_tiket=?");
$stmt->bind_param("ssssissi", $nama_event, $deskripsi_event, $kategori_event, $tanggal_event, $kuota_event, $status_event, $harga_event, $id);

if ($stmt->execute()) {
    echo "<script>alert('Tiket berhasil diupdate!'); window.location='dashboard.php';</script>";
    exit;
} else {
    echo "Gagal update tiket: " . $stmt->error;
}
$stmt->close();
$koneksi->close();
?>
