document.addEventListener("DOMContentLoaded", function () {
  // ============================================================
  // TAMPILKAN NAMA USER
  // ============================================================
  // const user = localStorage.getItem("loggedInUser");
  // const welcomeEl = document.getElementById("welcomeUser");
  //
  // if (user) {
  //   welcomeEl.textContent = `Selamat Datang, ${user}`;
  // } else {
  //   window.location.href = "login.html";
  // }

  // ============================================================
  // TAMPILKAN DATA TIKET
  // ============================================================
  // const tbody = document.querySelector("tbody");
  // const dataTersimpan = JSON.parse(localStorage.getItem("tiketList")) || [];
  //
  // dataTersimpan.forEach((event, index) => {
  //   const row = document.createElement("tr");
  //   row.innerHTML = `
  //     <td>${event.judul}</td>
  //     <td>${event.tanggal}</td>
  //     <td>0</td>
  //     <td>${event.status}</td>
  //     <td>
  //       <img src="gambar/setting.png" width="24" height="24" alt="Kelola" class="icon-action" />
  //       <img src="gambar/delete.png" width="24" height="24" alt="hapus" class="icon-action delete-btn" data-index="${index}" />
  //     </td>
  //   `;
  //   tbody.appendChild(row);
  // });
  //

  // ============================================================
  // HAPUS TIKET
  // ============================================================
  // document.querySelectorAll(".delete-btn").forEach((btn) => {
  //   btn.addEventListener("click", function () {
  //     const index = this.getAttribute("data-index");
  //     let semuaTiket = JSON.parse(localStorage.getItem("tiketList")) || [];
  //
  //     const yakin = confirm("Yakin ingin menghapus tiket ini?");
  //     if (!yakin) return;
  //
  //     semuaTiket.splice(index, 1);
  //     localStorage.setItem("tiketList", JSON.stringify(semuaTiket));
  //     location.reload();
  //   });
  // });

  // ============================================================
  // EFEK ROTATE ICON
  // ============================================================
  document.querySelectorAll(".icon-action").forEach((icon) => {
    icon.addEventListener("mouseover", function () {
      this.style.transform = "rotate(90deg)";
      this.style.transition = "transform 0.3s";
    });

    icon.addEventListener("mouseout", function () {
      this.style.transform = "rotate(0deg)";
    });
  });

  // ============================================================
  // PINDAH KE HALAMAN BUAT TIKET
  // ============================================================
  const btnBuat = document.getElementById("buatTiketBtn");
  if (btnBuat) {
    btnBuat.addEventListener("click", function () {
      window.location.href = "buat_tiket.php"; // disesuaikan dengan versi PHP
    });
  } else {
    console.log("Button tidak ditemukan!");
  }
});
