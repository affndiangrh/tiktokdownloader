# TikTok Downloader

Website ini memungkinkan pengguna untuk mengunduh video TikTok tanpa watermark dengan mudah. Pengguna cukup menempelkan link video TikTok, dan situs ini akan menampilkan video yang dapat diunduh.

## Fitur

- **Download Video TikTok**: Pengguna dapat mengunduh video TikTok tanpa watermark.
- **Tampilan Responsif**: Desain responsif yang dapat menyesuaikan dengan ukuran layar, baik di perangkat mobile, tablet, maupun desktop.
- **Mudah Digunakan**: Cukup dengan menempelkan URL video TikTok dan klik tombol "Download Sekarang" untuk memulai pengunduhan.

## Teknologi yang Digunakan

- **HTML**: Struktur halaman web.
- **Tailwind CSS**: Framework CSS yang digunakan untuk styling, memungkinkan pembuatan antarmuka yang responsif dan modern.
- **JavaScript**: Digunakan untuk menangani pengunduhan video dan interaksi pengguna.
- **API Tikwm**: Menggunakan API eksternal (Tikwm) untuk mengambil video TikTok.

## Cara Penggunaan

1. **Masukkan URL TikTok**: Salin dan tempelkan URL video TikTok yang ingin diunduh ke dalam kolom input yang tersedia.
2. **Klik "Download Sekarang"**: Setelah memasukkan URL, klik tombol "Download Sekarang" untuk mulai memproses video.
3. **Unduh Video**: Setelah proses selesai, tombol unduh akan muncul dan Anda dapat menyimpan video TikTok tanpa watermark ke perangkat Anda.

## Langkah Pengaturan

Jika Anda ingin menjalankan proyek ini di komputer lokal, Anda perlu memastikan bahwa server proxy yang sesuai telah disiapkan untuk menghindari masalah CORS.

### 1. Menyiapkan Server Proxy

Website ini menggunakan PHP (`proxy.php`) untuk menghindari masalah CORS dengan API Tikwm. Anda perlu memastikan bahwa `proxy.php` dapat menerima permintaan dan mengirim data ke API Tikwm.

### 2. Menjalankan Website

- **Langkah 1**: Unduh semua file dan simpan di direktori web server lokal Anda (misalnya, XAMPP, WAMP, atau LAMP).
- **Langkah 2**: Pastikan server PHP Anda berjalan dengan benar.
- **Langkah 3**: Buka file `index.html` di browser untuk mulai menggunakan website.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
