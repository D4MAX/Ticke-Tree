<?php
include 'koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) exit("ID tidak valid");
$id = (int) $_GET['id'];

$stmt = $koneksi->prepare("SELECT * FROM tiket WHERE id_tiket=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

if (!$data) exit("Tiket tidak ditemukan");

$nama_event      = htmlspecialchars($data['nama_event']);
$deskripsi_event = htmlspecialchars($data['deskripsi_event']);
$kategori_event  = htmlspecialchars($data['kategori_event']);
$tanggal_event   = $data['tanggal_event'];
$kuota_event     = $data['kuota_event'];
$status_event    = $data['status_event'];
$harga_event     = 'Rp ' . number_format($data['harga_event'], 0, ',', '.');
$img_src         = !empty($data['gambar']) && file_exists(__DIR__ . '/gambar/' . $data['gambar'])
                    ? 'gambar/' . $data['gambar']
                    : 'gambar/tur itn.jpg';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket</title>
    <link rel="stylesheet" href="file css/infootiket.css">
</head>
<body>

<header class="navbar">
    <div class="logo">TT</div>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<main class="main-flex">

    <section class="card-tiket">
        <img src="gambar/tiket.jpeg" alt="tiket" class="poster-tiket">
    </section>

    <section class="card">
        <p class="judul"><?php echo $nama_event; ?></p>
        <p class="isi"><?php echo $deskripsi_event; ?></p>

        <p class="spesifikasi-list">Spesifikasi Event</p>
        <ul class="spesifikasi-list">
            <li class="spesifikasi-list">Kategori Event : <?php echo $kategori_event; ?></li>
            <li class="spesifikasi-list">Tanggal Event : <?php echo $tanggal_event; ?></li>
            <li class="spesifikasi-list">Kuota Event : <?php echo $kuota_event; ?></li>
            <li class="spesifikasi-list">Status Event : <?php echo $status_event; ?></li>
            <li class="spesifikasi-list">Harga Tiket : <?php echo $harga_event; ?></li>
        </ul>

        <a href="tiket-edit.php?id=<?php echo $id; ?>" class="btn-primary">
            <img src="gambar/setting.png" width="24" height="24" alt="Edit">
            <span>Edit</span>
        </a>
    </section>

</main>

</body>
</html>
