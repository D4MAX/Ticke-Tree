document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".login-form");
  const inputs = form.querySelectorAll("input");
  const hasil = document.getElementById("hasil");
  const daftarBtn = form.querySelector("button");

  daftarBtn.addEventListener("click", function (e) {
    e.preventDefault();

    const nama = inputs[0].value.trim();
    const user = inputs[1].value.trim();
    const email = inputs[2].value.trim();
    const wa = inputs[3].value.trim();
    const pass = inputs[4].value.trim();

    // Validasi input kosong
    if (!nama || !user || !email || !wa || !pass) {
      hasil.innerHTML = "<b>Gagal Daftar!</b><br>Semua data wajib diisi.";
      return;
    }

    // Validasi panjang password
    if (pass.length < 8) {
      hasil.innerHTML = "<b>Gagal Daftar!</b><br>Password minimal 8 karakter!";
      return;
    }

    // Simpan ke localStorage (simulasi database)
    localStorage.setItem("registeredUser", user);
    localStorage.setItem("registeredPass", pass);

    hasil.innerHTML =
      "<b>Berhasil Daftar!</b><br>Silakan login menggunakan akun kamu...";

    // Redirect ke halaman login setelah 2 detik
    setTimeout(() => {
      window.location.href = "login.html";
    }, 2000);
  });
});
