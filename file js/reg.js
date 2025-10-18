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
      alert("Daftar Gagal!\nSemua Data Wajib Diisi!");
      return;
    }
    // Validasi panjang password
    if (pass.length < 8) {
      alert("Daftar Gagal!\nPassword minimal 8 karakter!");
      return;
    }

    // Simpan ke localStorage (simulasi database)
    localStorage.setItem("registeredUser", user);
    localStorage.setItem("registeredPass", pass);

    alert(
      "Berhasil Daftar! \nSilahkan Login Menggunakan Akun Yang Telah Dibuat!"
    );

    // Redirect ke halaman login setelah 2 detik
    setTimeout(() => {
      window.location.href = "login.html";
    }, 2000);
  });
});
