# pertemuan-03 Formulir HTML dan CSS Dasar

## Ringkasan Pelaksanaan
- Menyalin baseline dari pertemuan-02/.
- Menambahkan formulir kontak pada section#contact.
- Mengimplementasikan 6 tipe input (text, email, number, date, radio, checkbox), <select>, dan <textarea>.
- Mengatur tata letak dan keterbacaan formulir menggunakan CSS dasar.
- Menguji pengiriman data metode GET di peramban serta mengamati perilaku URL encoding.

## Catatan Pengujian & Perbaikan Galat
1. *Galat:* Label tidak mengarahkan kursor ke input saat diklik.
   - *Solusi:* Menyesuaikan nilai atribut for pada label agar sama persis dengan id pada input.
2. *Galat:* Parameter input tidak muncul di URL saat disubmit.
   - *Solusi:* Menambahkan atribut name pada elemen input.