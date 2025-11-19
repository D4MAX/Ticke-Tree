<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TickeTree - Profil</title>
    <link rel="stylesheet" href="file css/profile.css" />
  </head>
  <body>
    <!-- NAVBAR -->
    <header class="navbar">
      <div class="logo">
        <div class="icon">TT</div>
        <span class="title">TickeTree</span>
      </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="utama">
      <section class="profil-section">

        <h2 class="judul">Apa itu TickeTree?</h2>
        <p class="desk">
          TickeTree adalah platform ticketing digital yang dirancang untuk
          memudahkan komunitas dan penyelenggara acara dalam membuat, mengelola,
          dan membagikan event secara cepat dan efisien.
        </p>

        <h3 class="subjudul">Fitur Utama TickeTree</h3>

        <div class="fitur-list">
          <div class="fitur-card">
            <img src="gambar/create.png" class="fitur-icon" alt="create" />
            <h4>Buat Event dengan Mudah</h4>
            <p>Admin dapat membuat event dengan cepat melalui antarmuka sederhana.</p>
          </div>

          <div class="fitur-card">
            <img src="gambar/ticket.png" class="fitur-icon" alt="ticket" />
            <h4>Pemesanan Tiket</h4>
            <p>User dapat memesan tiket secara online kapan saja dan di mana saja.</p>
          </div>

          <div class="fitur-card">
            <img src="gambar/wallet.png" class="fitur-icon" alt="payment" />
            <h4>Pembayaran Praktis</h4>
            <p>Pembayaran cepat dan aman dengan berbagai metode tersedia.</p>
          </div>

          <div class="fitur-card">
            <img src="gambar/invoice.png" class="fitur-icon" alt="report" />
            <h4>Laporan Otomatis</h4>
            <p>Admin dapat melihat laporan pemesanan dan transaksi secara real-time.</p>
          </div>
        </div>

        <!-- TOMBOL LIHAT EVENT -->
        <div class="tombol">
          <button class="btn-primary" id="lihatEventBtn">
            <span class="plus">▶</span> Lihat Event
          </button>
        </div>

      </section>
    </main>
  <script src="file js/profile.js"></script>
  </body>
</html>
