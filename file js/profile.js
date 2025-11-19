document.addEventListener("DOMContentLoaded", function () {
  const btnEvent = document.getElementById("lihatEventBtn");

  if (btnEvent) {
    btnEvent.addEventListener("click", function () {
      window.location.href = "login.php";
      // ganti ke halaman event yang kamu mau
    });
  } else {
    console.log("Button Lihat Event tidak ditemukan!");
  }
});
