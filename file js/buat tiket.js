function simpanTiket() {
  const inputs = document.querySelectorAll("input");

  const data = {
    judul: inputs[0].value,
    deskripsi: inputs[1].value,
    kategori: inputs[2].value,
    tanggal: inputs[3].value,
    kuota: inputs[4].value,
    status: inputs[5].value,
    price: inputs[6].value,
  };

  // Validasi dasar
  if (!data.judul || !data.tanggal) {
    alert("Judul dan tanggal acara wajib diisi!");
    return;
  }

  // Konfirmasi dulu sebelum simpan
  let yakin = confirm("Apakah sudah yakin?");
  if (!yakin) {
    alert("Aksi dibatalkan.");
    return; // HENTIKAN di sini (tidak lanjut simpan)
  }

  // Baru simpan kalau user setuju
  let semuaTiket = JSON.parse(localStorage.getItem("tiketList")) || [];
  semuaTiket.push(data);
  localStorage.setItem("tiketList", JSON.stringify(semuaTiket));

  alert("Tiket berhasil dibuat!");
  window.location.href = "dashboard.html";
}
