/**
 * UTS PEMROGRAMAN WEB DASAR - ISB ATMA LUHUR
 * JavaScript Modern Interaktif
 * Fitur: Realtime Clock, Dynamic Greeting, Dark Mode Switcher, Form Validation, Gallery Filter
 */
document.addEventListener("DOMContentLoaded", () => {
  initLiveClock();
  initThemeToggle();
  initGalleryFilter();
  initFormValidation();
  initSkillBarAnimation();
});
/* ==========================================
   1. REALTIME LIVE CLOCK & GREETING
   ========================================== */
function initLiveClock() {
  const clockElement = document.getElementById("liveClock");
  const greetingElement = document.getElementById("dynamicGreeting");
  
  if (!clockElement) return;
  function updateClock() {
    const now = new Date();
    
    // Format Waktu Indonesia (HH:MM:SS WIB)
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    clockElement.textContent = `${hours}:${minutes}:${seconds} WIB`;

        // Dynamic Greeting
        if (greetingElement) {
          const currentHour = now.getHours();
          let greeting = "Selamat Datang";
          if (currentHour >= 4 && currentHour < 11) {
            greeting = "🌅 Selamat Pagi";
          } else if (currentHour >= 11 && currentHour < 15) {
            greeting = "☀️ Selamat Siang";
          } else if (currentHour >= 15 && currentHour < 18) {
            greeting = "🌤️ Selamat Sore";
          } else {
            greeting = "🌙 Selamat Malam";
          }
          greetingElement.textContent = greeting;
        }
      }
    
        updateClock();
        setInterval(updateClock, 1000);
      }
      /* ==========================================
         2. DARK / LIGHT MODE SWITCHER (LocalStorage)
         ========================================== */
      function initThemeToggle() {
        const toggleBtn = document.getElementById("themeToggleBtn");
        if (!toggleBtn) return;
        const currentTheme = localStorage.getItem("blog_theme") || "light";
        
        if (currentTheme === "dark") {
          document.body.classList.add("dark-theme");
          updateThemeBtnIcon(true);
        }
        toggleBtn.addEventListener("click", () => {
          document.body.classList.toggle("dark-theme");
          const isDark = document.body.classList.contains("dark-theme");
          localStorage.setItem("blog_theme", isDark ? "dark" : "light");
          updateThemeBtnIcon(isDark);
        });
        function updateThemeBtnIcon(isDark) {
          toggleBtn.innerHTML = isDark 
            ? '<span>☀️</span> Mode Terang' 
            : '<span>🌙</span> Mode Gelap';
        }
      }
      
      /* ==========================================
         3. CLIENT-SIDE FORM VALIDATION & CONFIRMATION
         ========================================== */
      function initFormValidation() {
        const form = document.getElementById("registrationForm");
        if (!form) return;
        form.addEventListener("submit", (e) => {
          const nama = document.getElementById("nama_lengkap")?.value.trim();
          const email = document.getElementById("email")?.value.trim();
          const telepon = document.getElementById("telepon")?.value.trim();
          if (!nama || !email || !telepon) {
            e.preventDefault();
            alert("⚠️ Harap lengkapi semua kolom wajib bertanda bintang (*).");
            return;
          }
          // Konfirmasi submit interaktif
          const confirmSubmit = confirm(`Konfirmasi Pengiriman Data:\n\nNama: ${nama}\nEmail: ${email}\n\nApakah data sudah benar?`);
          if (!confirmSubmit) {
            e.preventDefault();
          }
        });
      }
      
      /* ==========================================
         4. GALLERY FILTER (MENU TAMBAHAN)
         ========================================== */
      function initGalleryFilter() {
        const filterBtns = document.querySelectorAll(".filter-btn");
        const galleryItems = document.querySelectorAll(".gallery-item");
        if (!filterBtns.length || !galleryItems.length) return;
        filterBtns.forEach(btn => {
          btn.addEventListener("click", () => {
            // Toggle active class
            filterBtns.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            const category = btn.getAttribute("data-filter");
            galleryItems.forEach(item => {
              const itemCategory = item.getAttribute("data-category");
              if (category === "all" || itemCategory === category) {
                item.style.display = "block";
                setTimeout(() => {
                  item.style.opacity = "1";
                  item.style.transform = "scale(1)";
                }, 50);
              } else {
                item.style.opacity = "0";
                item.style.transform = "scale(0.85)";
                setTimeout(() => {
                  item.style.display = "none";
                }, 250);
              }
            });
          });
        });
      }
      
      /* ==========================================
         5. SKILL PROGRESS BAR ANIMATION
         ========================================== */
      function initSkillBarAnimation() {
        const skillBars = document.querySelectorAll(".skill-progress");
        if (!skillBars.length) return;
        skillBars.forEach(bar => {
          const targetWidth = bar.getAttribute("data-width");
          if (targetWidth) {
            bar.style.width = "0%";
            setTimeout(() => {
              bar.style.width = targetWidth;
            }, 200);
          }
        });
      }
      