<?php
include 'koneksi.php';
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

// Amankan input
$id_pemesanan = intval($_POST['id_pemesanan']);
$id_user      = intval($_POST['id_user']);
$metode       = $_POST['metode'];

// Ambil data pemesanan + tiket + user
$sql = "
    SELECT 
        p.id_pemesanan,
        p.id_user,
        p.total_harga,
        p.jumlah,
        p.id_tiket,
        t.nama_event,
        t.harga_event,
        u.username
    FROM pemesanan p
    JOIN tiket t ON p.id_tiket = t.id_tiket
    JOIN user u ON p.id_user = u.id_user
    WHERE p.id_pemesanan = $id_pemesanan
";

$query = $koneksi->query($sql);
$data = $query->fetch_assoc();

// Jika data tidak ditemukan
if (!$data) {
    die("Data pemesanan tidak ditemukan");
}

$jumlah_bayar = $data['total_harga'];

// Insert pembayaran
$sql1 = "INSERT INTO pembayaran (id_pemesanan, id_user, metode, tanggal_bayar, jumlah_bayar, status_bayar)
         VALUES ('$id_pemesanan', '$id_user', '$metode', NOW(), '$jumlah_bayar', 'berhasil')";

// Update status pemesanan
$sql2 = "UPDATE pemesanan SET status='sudah bayar' WHERE id_pemesanan=$id_pemesanan";

if ($koneksi->query($sql1) && $koneksi->query($sql2)) {

    // ==================== DOMPDF ====================
    $dompdf = new Dompdf();

    $html = "
    <h3 style='text-align:center;'>Struk Pembayaran Tiket</h3>
    <hr>

    <table width='100%' cellspacing='0' cellpadding='6' border='1'>
        <tr>
            <td><b>ID Pemesanan</b></td>
            <td>{$data['id_pemesanan']}</td>
        </tr>
        <tr>
            <td><b>Nama Pembeli</b></td>
            <td>{$data['username']}</td>
        </tr>
        <tr>
            <td><b>Event</b></td>
            <td>{$data['nama_event']}</td>
        </tr>
        <tr>
            <td><b>Jumlah Tiket</b></td>
            <td>{$data['jumlah']}</td>
        </tr>
        <tr>
            <td><b>Harga per Tiket</b></td>
            <td>Rp " . number_format($data['harga_event']) . "</td>
        </tr>
        <tr>
            <td><b>Total Bayar</b></td>
            <td>Rp " . number_format($jumlah_bayar) . "</td>
        </tr>
        <tr>
            <td><b>Metode Pembayaran</b></td>
            <td>{$metode}</td>
        </tr>
        <tr>
            <td><b>Status</b></td>
            <td style='color:green;'><b>BERHASIL</b></td>
        </tr>
    </table>

    <br>
    <p style='text-align:center; font-size:12px;'>Terima kasih telah melakukan pembayaran.</p>
    ";

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("struk-pembayaran-{$id_pemesanan}.pdf");

} else {
    echo "Error: " . $koneksi->error;
}
?>
