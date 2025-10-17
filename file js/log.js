document.addEventListener("DOMContentLoaded", function () {
  const button = document.getElementById("login");
  button.addEventListener("click", function (e) {
    e.preventDefault();
    proses();
  });
});

function proses() {
  console.log("Fungsi dipanggil!"); // Debug
  let User = document.getElementById("User").value.trim();
  let password = document.getElementById("Password").value.trim();
  let hasil = document.getElementById("hasil");

  // Validasi input kosong
  if (!User || !password) {
    hasil.innerHTML = "<b>Login Gagal!</b><br>Isi semua data!";
    hasil.className = "error";
    return;
  }

  // Validasi panjang password
  if (password.length < 8) {
    hasil.innerHTML = "<b>Login Gagal!</b><br>Password minimal 8 karakter!";
    hasil.className = "error";
    return;
  }

  // Simpan user di localStorage
  localStorage.setItem("loggedInUser", User);

  // Kosongkan input password
  document.getElementById("Password").value = "";

  // Redirect setelah 2 detik
  setTimeout(() => {
    console.log("Redirect ke dashboard.html...");
    window.location.href = "dashboard.html";
  }, 2000);
}

function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function () {
    x.className = x.className.replace("show", "");
  }, 3000);
}
