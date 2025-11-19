<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TickeTree Dashboard</title>
    <link rel="stylesheet" href="file css/event.css" />
  </head>
  <body>
    <!-- NAVBAR -->
    <header class="navbar">
      <div class="logo">
        <div class="icon">TT</div>
        <span
          onclick="window.location.href='dashboard.html'"
          style="cursor: pointer"
          class="title"
          >TickeTree</span
        >
      </div>
      <nav>
        <a href="tiket.php">My Ticket</a>
        <a href="login.php">Login</a>
      </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="utama">
      <section class="event">
        <!-- Welcome Card -->
        <h2 class="judul">TickeTree</h2>
        <p class="desk">
          Nikmati event-event seru ini dan temukan pengalaman tak terlupakan
          bersama komunitasmu hari ini!
        </p>

        <!-- Event Table -->
        <h3 class="header">Acara Tersedia</h3>
        <div class="event-list">
          <div class="card-tiket">
            <img src="gambar/tur itn.jpg" alt="mole" class="poster" />
          </div>
          <div class="card-tiket">
            <img src="gambar/image.png" alt="shopee" class="poster" />
          </div>
          <div class="card-tiket">
            <img src="gambar/indomaret.jpg" alt="indomaret" class="poster" />
          </div>
          <div class="card-tiket">
            <img src="gambar/porprov.jpg" alt="porprov" class="poster" />
          </div>
        </div>
      </section>
    </main>
    <script src="file js/dash.js"></script>
  </body>
</html>
