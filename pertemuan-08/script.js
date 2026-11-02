// 1. Fungsi Navigasi Halaman (Tab Switching)
function switchPage(pageName, event) {
  if (event) {
    event.preventDefault();
  }
  // Sembunyikan semua section konten
  const sections = document.querySelectorAll(".content-section");
  sections.forEach((sec) => {
    sec.classList.remove("active");
  });
  // Hapus kelas active dari semua link navigasi
  const navLinks = document.querySelectorAll("#nav-list a");
  navLinks.forEach((link) => {
    link.classList.remove("active");
  });
  // Tampilkan section yang dipilih
  const targetSection = document.getElementById("page-" + pageName);
  if (targetSection) {
    targetSection.classList.add("active");
  }
  // Beri highlight aktif pada link navigasi yang diklik
  const activeLink = document.getElementById("nav-" + pageName);
  if (activeLink) {
    activeLink.classList.add("active");
  }

    // Scroll ke bagian atas konten dengan halus
  window.scrollTo({ top: 0, behavior: "smooth" });
  // Update hash pada URL browser tanpa reload
  if (history.pushState) {
    history.pushState(null, null, "#" + pageName);
  } else {
    location.hash = "#" + pageName;
  }
}
// Fungsi untuk mereset tampilan form kembali setelah submit berhasil
function resetFormView() {
  const resultBox = document.getElementById("result-box");
  const formContainer = document.getElementById("form-container");
  const form = document.getElementById("contactForm");
  if (resultBox) resultBox.style.display = "none";
  if (formContainer) formContainer.style.display = "block";
  if (form) form.reset();
}
document.addEventListener("DOMContentLoaded", function () {
  // Cek apakah ada hash di URL saat halaman dimuat (contoh: index.html#profile)
  const currentHash = window.location.hash.replace("#", "");
  if (currentHash && document.getElementById("page-" + currentHash)) {
    switchPage(currentHash);
  }

    // 2. Real-time Digital Clock & Dynamic Greeting
  function updateClockAndGreeting() {
    const clockElement = document.getElementById("digital-clock");
    const greetingElement = document.getElementById("greeting-text");
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, "0");
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const seconds = String(now.getSeconds()).padStart(2, "0");
    if (clockElement) {
      clockElement.innerText = `${hours}:${minutes}:${seconds} WIB`;
    }
    if (greetingElement) {
      const currentHour = now.getHours();
      let greeting = "Selamat Datang!";
      if (currentHour >= 5 && currentHour < 11) {
        greeting = "Selamat Pagi, Semangat!";
      } else if (currentHour >= 11 && currentHour < 15) {
        greeting = "Selamat Siang!";
      } else if (currentHour >= 15 && currentHour < 18) {
        greeting = "Selamat Sore!";
      } else {
        greeting = "Selamat Malam!";
      }
      greetingElement.innerText = greeting;
    }
  }
  setInterval(updateClockAndGreeting, 1000);
  updateClockAndGreeting();

    // 3. Validasi Form Sisi Klien (Materi P7: nama, email, semester, tanggal, jenis_pesan, prodi, minat, pesan)
  const contactForm = document.getElementById("contactForm");
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      const nama = document.getElementById("nama")?.value.trim() || "";
      const email = document.getElementById("email")?.value.trim() || "";
      const semester = document.getElementById("semester")?.value.trim() || "";
      const tanggal = document.getElementById("tanggal")?.value.trim() || "";
      const jenisPesan = document.querySelector('input[name="jenis_pesan"]:checked');
      const prodi = document.getElementById("prodi")?.value || "";
      const minatCheckboxes = document.querySelectorAll('input[name="minat[]"]:checked');
      const pesan = document.getElementById("pesan")?.value.trim() || "";

      const errorBox = document.getElementById("form-error-msg");
      let errorMessage = "";
      if (nama === "") {
        errorMessage = "Nama lengkap wajib diisi.";
      } else if (nama.length < 3) {
        errorMessage = "Nama lengkap minimal 3 karakter.";
      } else if (email === "" || !email.includes("@") || !email.includes(".")) {
        errorMessage = "Format email tidak valid (contoh: user@atmaluhur.ac.id).";
      } else if (semester === "" || isNaN(semester) || parseInt(semester) < 1 || parseInt(semester) > 14) {
        errorMessage = "Semester harus berupa bilangan bulat antara 1 dan 14.";
      } else if (tanggal === "") {
        errorMessage = "Tanggal kunjungan / pendaftaran wajib diisi.";
      } else if (!jenisPesan) {
        errorMessage = "Silakan pilih jenis pesan / tujuan formulir.";
      } else if (prodi === "") {
        errorMessage = "Silakan pilih Program Studi (SI atau TI).";
      } else if (minatCheckboxes.length === 0) {
        errorMessage = "Topik minat wajib dipilih minimal satu.";
      } else if (pesan === "") {
        errorMessage = "Pesan / motivasi pendaftaran wajib diisi.";
      }

      if (errorMessage !== "") {
        e.preventDefault(); // Batalkan pengiriman jika validasi gagal
        if (errorBox) {
          errorBox.innerHTML = "⚠️ <strong>Peringatan Validasi (JavaScript):</strong> " + errorMessage;
          errorBox.className = "form-alert error";
          errorBox.style.display = "block";
          errorBox.scrollIntoView({ behavior: "smooth" });
        } else {
          alert("Peringatan: " + errorMessage);
        }
        return false;
      }
      // Konfirmasi sebelum pengiriman data
      const confirmSubmit = confirm(`Halo ${nama}, apakah Anda yakin ingin mengirim data formulir pendaftaran ini?`);
      if (!confirmSubmit) {
        e.preventDefault();
        return false;
      }
      // Jika membuka file secara langsung (file:/// protocol tanpa web server PHP)
      if (window.location.protocol === "file:") {
        e.preventDefault(); // Cegah redirect error file:///

        // Kumpulkan data minat yang dicek
        const minatList = [];
        minatCheckboxes.forEach((cb) => minatList.push(cb.value));
        // Tampilkan resume data di halaman
        document.getElementById("res-nama").innerText = nama;
        document.getElementById("res-email").innerText = email;
        document.getElementById("res-semester").innerText = "Semester " + semester;
        document.getElementById("res-tanggal").innerText = tanggal;
        document.getElementById("res-jenis-pesan").innerText = jenisPesan.value.toUpperCase();
        document.getElementById("res-prodi").innerText = (prodi === "SI") ? "Sistem Informasi (SI)" : "Teknik Informatika (TI)";
        document.getElementById("res-minat").innerHTML = minatList.join(", ");
        document.getElementById("res-pesan").innerText = pesan;

        // Buka box hasil
        document.getElementById("result-box").style.display = "block";
        document.getElementById("form-container").style.display = "none";
        if (errorBox) errorBox.style.display = "none";
        document.getElementById("result-box").scrollIntoView({ behavior: "smooth" });
      }
      // Jika di web server (http://localhost/...), biarkan form submit secara normal ke proses.php
    });
  }
  // 4. Multimedia Video Box Interactive Demo
  const playButtons = document.querySelectorAll(".play-btn");
  playButtons.forEach(function (btn) {
    btn.addEventListener("click", function () {
      alert("Memutar video cuplikan kegiatan blog dan hobi mahasiswa ISB Atma Luhur!");
    });
  });
});