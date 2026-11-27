<?php
// Memulai session jika belum aktif.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Mengamankan keluaran HTML (mencegah XSS). Menerima tipe apa pun.
function bersihkan($teks): string
{
    return htmlspecialchars((string) $teks, ENT_QUOTES, "UTF-8");
}

// Menampilkan teks tebal yang sudah diamankan.
function tebal($teks): string
{
    return "<strong>" . bersihkan($teks) . "</strong>";
}