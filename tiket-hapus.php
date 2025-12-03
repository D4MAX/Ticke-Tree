  <?php
  include 'koneksi.php';

  // Aktifkan error reporting untuk debug
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  if ($koneksi->connect_error) {
      die("Koneksi gagal: " . $koneksi->connect_error);
  }

  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      $id = (int) $_GET['id'];
      
      // Cek apakah data ada
      $check_stmt = $koneksi->prepare("SELECT id_tiket FROM tiket WHERE id_tiket = ?");
      $check_stmt->bind_param("i", $id);
      $check_stmt->execute();
      $check_result = $check_stmt->get_result();
      if ($check_result->num_rows == 0) {
          echo "<script>alert('Data tiket tidak ditemukan!'); window.location='dashboard.php';</script>";
          exit;
      }
      $check_stmt->close();
      
      // Hapus data
      $stmt = $koneksi->prepare("DELETE FROM tiket WHERE id_tiket = ?");
      if (!$stmt) {
          die("Error prepare: " . $koneksi->error);
      }
      
      $stmt->bind_param("i", $id);
      
      if ($stmt->execute()) {
          echo "<script>alert('Tiket berhasil dihapus!'); window.location='dashboard.php';</script>";
          exit;
      } else {
          echo "<script>alert('Gagal hapus: " . $stmt->error . "'); window.location='dashboard.php';</script>";
          exit;
      }
      
      $stmt->close();
  } else {
      echo "<script>alert('ID tiket tidak valid!'); window.location='dashboard.php';</script>";
      exit;
  }
  
  $koneksi->close();
  ?>