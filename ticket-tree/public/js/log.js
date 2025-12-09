document.addEventListener("DOMContentLoaded", function () {
  const button = document.getElementById("login");

  button.addEventListener("click", function () {
    proses(); // panggil fungsi proses saat tombol diklik
  });
});

function proses() {
  let User = document.getElementById("User").value.trim();
  let password = document.getElementById("Password").value.trim();

  // ================== VALIDASI DASAR DI JS ==================
  if (!User || !password) {
    alert("Login Gagal!\nIsi semua data!");
    return;
  }

  if (password.length < 8) {
    alert("Login Gagal!\nPassword minimal 8 karakter!");
    return;
  }

  // ================== HILANGKAN LOCAL STORAGE ==================
  // localStorage.setItem("loggedInUser", User);

  // ================== EFEK SNACKBAR + SUBMIT ==================
  // myFunction();
}

function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function () {
    x.className = x.className.replace("show", "");
    document.querySelector(".login-form").submit(); // kirim form ke PHP
  }, 1000); // delay 1 detik sebelum kirim ke PHP
}
