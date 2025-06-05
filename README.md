# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the _public_ folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's _public_ folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter _public/..._, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> The end of life date for PHP 7.4 was November 28, 2022.
> The end of life date for PHP 8.0 was November 26, 2023.
> If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> The end of life date for PHP 8.1 will be November 25, 2024.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

# 🎟️ Penjualan Tiket Sepakbola Online

Selamat datang di **Penjualan Tiket Sepakbola Online** – aplikasi web modern untuk membeli tiket pertandingan sepakbola favorit Anda secara mudah, cepat, dan aman!

---

## ⚽ Tentang Aplikasi

Aplikasi ini dibangun menggunakan **CodeIgniter 4** dan didesain khusus untuk memudahkan penggemar sepakbola mendapatkan tiket pertandingan secara online.  
Nikmati pengalaman membeli tiket tanpa antri, cukup beberapa klik dari perangkat Anda!

---

## ✨ Fitur Unggulan

- **Daftar & Login User**  
  Registrasi mudah dan login aman untuk setiap pengguna.

- **Daftar Pertandingan Lengkap**  
  Lihat jadwal pertandingan dari berbagai liga dan event.

- **Pembelian Tiket Online**  
  Proses pembelian tiket yang cepat, transparan, dan real-time.

- **Status Pembelian**  
  Pantau status tiket yang sudah Anda beli.

- **Tampilan Modern & Responsif**  
  Desain UI bertema sepakbola yang menarik dan nyaman di semua perangkat.

- **Admin Panel**  
  Kelola data pertandingan, tiket, dan status pembelian dengan mudah.

---

## 🚀 Cara Instalasi

1. **Clone repository ini**

   ```bash
   git clone https://github.com/dinoharahap/penjualan-tiket.git
   cd penjualan-tiket
   ```

2. **Install dependency dengan Composer**

   ```bash
   composer install
   ```

3. **Copy file environment**

   ```bash
   cp env .env
   ```

   Atur `baseURL` dan konfigurasi database sesuai kebutuhan Anda di file `.env`.

4. **Migrasi & seeding database** (jika tersedia)

   ```bash
   php spark migrate
   php spark db:seed
   ```

5. **Jalankan server lokal**
   ```bash
   php spark serve
   ```
   atau gunakan XAMPP dan akses via `http://localhost/penjualantiket`

---

## 🖥️ Struktur Fitur Utama

- **Halaman Login & Register**  
  Akses mudah untuk pengguna baru dan lama.

- **Dashboard User**  
  Lihat daftar pertandingan, beli tiket, dan cek status pembelian.

- **Dashboard Admin**  
  Kelola pertandingan, tiket, dan data user.

---

## 📸 Preview

![Preview](https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=800&q=80)

---

## 📋 Persyaratan Server

- PHP 8.1 atau lebih baru
- Ekstensi PHP: intl, mbstring, json, mysqlnd, curl
- Composer

---

## 🙌 Kontribusi

Kontribusi sangat terbuka!  
Silakan fork repo ini, buat branch baru, dan ajukan pull request untuk fitur atau perbaikan bug.

---

## 📞 Kontak & Bantuan

Jika ada pertanyaan, saran, atau ingin bekerja sama, silakan hubungi:

- Email: dinohrp04@gmail.com
- Instagram: [@dinohrp](https://instagram.com/dinohrp)

---

Terima kasih telah menggunakan aplikasi **Penjualan Tiket Sepakbola Online**!  
Dukung tim favoritmu dan rasakan atmosfer stadion secara langsung! ⚽🎉
