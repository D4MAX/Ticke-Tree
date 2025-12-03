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
          onclick="window.location.href='dashboard.php'"
          style="cursor: pointer"
          class="title"
          >TickeTree Dashboard</span
        >
      </div>
      <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="login.php">Logout</a>
      </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="container">
      <!-- Welcome Card -->
      <section class="card">
        <h2 class="judul">Mau buat acara apa hari ini?</h2>
        <form action="simpan_tiket.php" method="POST">
  <table>
    <tr>
      <td>Judul event?</td>
      <td><input name="nama_event" type="text" required /></td>
    </tr>

    <tr>
      <td>Deskripsi event</td>
      <td><input name="deskripsi_event" type="text" /></td>
    </tr>

    <tr>
      <td>Kategori Event</td>
      <td><input name="kategori_event" type="text" /></td>
    </tr>

    <tr>
      <td>Tanggal event</td>
      <td><input name="tanggal_event" type="date" required /></td>
    </tr>

    <tr>
      <td>Kuota event</td>
      <td><input name="kuota_event" type="number" required /></td>
    </tr>

    <tr>
      <td>Status event</td>
      <td>
        <select name="status_event" class="dropdown-status">
          <option value="aktif">aktif</option>
          <option value="selesai">selesai</option>
          <option value="dibatalkan">dibatalkan</option>
        </select>

      </td>
    </tr>

    <tr>
      <td>Price tiket</td>
      <td><input name="harga_event" type="number" step="0.01" required /></td>
    </tr>
  </table>

  <button type="submit" class="btn-primary">
    <span class="plus">+</span> Buat acara baru
  </button>
</form>
      </section>
    </main>
  </body>
</html>
