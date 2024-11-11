<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# API_Baca Berita - Portal Berita

**API_Baca Berita** adalah sebuah API yang dikembangkan menggunakan **Laravel** untuk menyediakan layanan *portal berita*. API ini memungkinkan klien untuk melakukan login, mendapatkan daftar berita, membaca detail berita, dan menambah berita baru.

## Fitur API

- **Login**: Endpoint untuk otentikasi pengguna.
- **News**: Endpoint untuk mendapatkan daftar berita yang tersedia.
- **Add News**: Endpoint bagi pengguna yang memiliki akses untuk menambahkan berita baru.

## Teknologi yang Digunakan

- **Laravel**: Framework utama untuk membangun REST API.
- **MySQL**: Digunakan sebagai basis data utama (bisa disesuaikan dengan kebutuhan).
- **JWT (JSON Web Token)**: Digunakan untuk autentikasi dan otorisasi.

## Persiapan dan Instalasi

### Prasyarat

Pastikan sudah menginstall:
- [PHP](https://www.php.net/downloads) >= 8.0
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://dev.mysql.com/downloads/installer/) atau database lain yang didukung oleh Laravel
- [Laravel](https://laravel.com/docs/installation)

### Langkah Instalasi

1. Clone repositori ini:
   ```bash
   git clone https://github.com/username/API_BacaBerita.git
   cd API_BacaBerita
