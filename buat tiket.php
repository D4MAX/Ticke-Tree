<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TickeTree Dashboard</title>
    <link rel="stylesheet" href="file css/dash.css" />
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
          >TickeTree Dashboard</span
        >
      </div>
      <nav>
        <a href="dashboard.html">Dashboard</a>
        <a href="login.html">Logout</a>
      </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="container">
      <!-- Welcome Card -->
      <section class="card">
        <h2 class="judul">Mau buat acara apa hari ini?</h2>
        <table>
          <thead></thead>
          <tbody>
            <tr>
              <td>Judul event?</td>
              <td><input type="text" placeholder="Masukkan Judul Event" /></td>
            </tr>
            <tr>
              <td>Deskripsi event</td>
              <td>
                <input type="text" placeholder="Masukkan Deskripsi Event" />
              </td>
            </tr>
            <tr>
              <td>Kategori Event</td>
              <td>
                <input type="text" placeholder="Masukkan Kategori Event" />
              </td>
            </tr>
            <tr>
              <td>Tanggal event</td>
              <td>
                <input type="text" placeholder="Masukkan Tanggal Event" />
              </td>
            </tr>
            <tr>
              <td>Kuota event</td>
              <td><input type="text" placeholder="Masukkan Kuota Event" /></td>
            </tr>
            <tr>
              <td>Status event</td>
              <td><input type="text" placeholder="Masukkan Status Event" /></td>
            </tr>
            <tr>
              <td>Price tiket</td>
              <td><input type="text" placeholder="Masukkan Price Tiket" /></td>
            </tr>
          </tbody>
        </table>
        <button class="new-tiket" onclick="simpanTiket()">
          <span class="plus">+</span> Buat acara baru
        </button>
      </section>
    </main>
    <script src="file js/buat tiket.js"></script>
  </body>
</html>
