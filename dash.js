document.addEventListener("DOMContentLoaded", function () {
  // Ambil username dari localStorage
  const user = localStorage.getItem("loggedInUser");

  // Ambil elemen H2
  const welcomeEl = document.getElementById("welcomeUser");

  if (user) {
    // Ubah teksnya pakai nama user
    welcomeEl.textContent = `Selamat Datang, ${user}`;
  } else {
    // Kalau belum login, kembalikan ke halaman login
    window.location.href = "login.html";
  }
});
