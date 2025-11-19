<?php
// koneksi
$koneksi = new mysqli("localhost", "root", "", "database_tickeTree");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama_event = $_POST["nama_event"];
    $deskripsi_event = $_POST["deskripsi_event"];
    $kategori_event = $_POST["kategori_event"];
    $tanggal_event = $_POST["tanggal_event"];
    $kuota_event = $_POST["kuota_event"];
    $status_event = $_POST["status_event"];
    $harga_event = $_POST["harga_event"];

    $sql = "INSERT INTO tiket 
            (nama_event, deskripsi_event, kategori_event, tanggal_event, kuota_event, status_event, harga_event)
            VALUES 
            ('$nama_event', '$deskripsi_event', '$kategori_event', '$tanggal_event', '$kuota_event', '$status_event', '$harga_event')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Event berhasil dibuat!'); window.location='dashboard.php';</script>";
        exit;
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>
