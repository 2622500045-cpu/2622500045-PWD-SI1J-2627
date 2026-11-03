<?php
/**
 * HALAMAN TAMBAHAN KREATIF: GALERI & PORTOFOLIO HOBI
 * Memenuhi poin: "Silahkan jika ada penambahan menu lainnya."
 * Memadukan PHP Data Array dengan JavaScript Category Filtering
 */
$galleryItems = [
  [
    "title" => "Desain UI Glassmorphism",
    "category" => "coding",
    "badge" => "Web Design",
    "icon" => "🎨",
    "desc" => "Eksplorasi antarmuka modern dengan efek blur kaca dan palet warna indigo."
  ],
  [
    "title" => "Hunting Senja di Jembatan Emas",
    "category" => "fotografi",
    "badge" => "Landscape",
    "icon" => "🌅",
    "desc" => "Foto golden hour di ikon jembatan kebanggaan Bangka Belitung."
  ],
  [
    "title" => "Script Routing PHP Modular",
    "category" => "coding",
    "badge" => "PHP Code",
    "icon" => "⚙️",
    "desc" => "Pengembangan arsitektur file modular include untuk proyek UTS Web Dasar."
  ],
  [
    "title" => "Koleksi Buku Rekayasa Perangkat Lunak",
    "category" => "kegiatan",
    "badge" => "Edukasi",
    "icon" => "📖",
    "desc" => "Membaca konsep software engineering dan struktur algoritma data."
  ],


[
    "title" => "Turnamen Mini E-Sport Kampus",
    "category" => "kegiatan",
    "badge" => "Community",
    "icon" => "🏆",
    "desc" => "Kebersamaan bersama rekan mahasiswa Sistem Informasi Atma Luhur."
  ],
  [
    "title" => "Fotografi Makro Flora & Serangga",
    "category" => "fotografi",
    "badge" => "Macro Shots",
    "icon" => "🌿",
    "desc" => "Eksplorasi lensa makro menangkap detail embun dan dedaunan pagi."
  ]
];
?>
<div class="section-heading" style="margin-top: 0;">
  <h3><span>✨</span> Galeri Kreativitas & Dokumentasi Aktivitas</h3>
  <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 600;">Menu Tambahan Interaktif</span>
</div>
<p style="color: var(--text-muted); font-size: 0.92rem; margin-bottom: 20px;">
  Koleksi visual dari ragam hobi dan eksperimen karya. Anda dapat menggunakan tombol filter kategori di bawah ini (ditenagai oleh JavaScript DOM Manipulation).
</p>


<!-- FILTER BUTTONS (JS POWERED) -->
<div class="gallery-filters">
  <button type="button" class="filter-btn active" data-filter="all">Semua Koleksi (<?php echo count($galleryItems); ?>)</button>
  <button type="button" class="filter-btn" data-filter="coding">💻 Coding & Web</button>
  <button type="button" class="filter-btn" data-filter="fotografi">📸 Fotografi</button>
  <button type="button" class="filter-btn" data-filter="kegiatan">🎯 Kegiatan & Buku</button>
</div>
<!-- GALLERY GRID ITEMS -->
<div class="gallery-grid">
  <?php foreach ($galleryItems as $item): ?>
    <div class="gallery-item" data-category="<?php echo $item['category']; ?>">
      <div class="gallery-thumb">
        <?php echo $item['icon']; ?>
      </div>
      <div class="gallery-info">
        <span class="hobby-badge" style="display: inline-block; margin-bottom: 6px;">
          <?php echo $item['badge']; ?>
        </span>
        <h5><?php echo $item['title']; ?></h5>
        <p><?php echo $item['desc']; ?></p>
      </div>
    </div>
  <?php endforeach; ?>
</div>
