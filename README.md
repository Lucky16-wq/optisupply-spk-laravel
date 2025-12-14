# OptiSupply - SPK Supplier UMKM

Aplikasi Sistem Pendukung Keputusan (SPK) berbasis Laravel
untuk pemilihan supplier bahan baku UMKM menggunakan metode SAW.

## Fitur
- Login Admin
- CRUD Supplier
- CRUD Kriteria (Bobot Dinamis)
- Perhitungan SAW
- Ranking & Top 5 Supplier

## Teknologi
- Laravel 10
- MySQL
- PHP 8
- jQuery AJAX

## Cara Menjalankan
1. composer install
2. cp .env.example .env
3. php artisan key:generate
4. php artisan migrate --seed
5. php artisan serve