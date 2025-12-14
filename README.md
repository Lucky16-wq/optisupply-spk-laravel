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

## Struktur File
app/
  Http/
    Controllers/
      AuthController.php
      SpkController.php
      CriteriaController.php
      AlternativeController.php
    Middleware/
      CustomAuth.php
  Models/
    Criterion.php
    Alternative.php
    Value.php

database/
  migrations/
    2025_01_01_000001_create_criteria_table.php
    2025_01_01_000002_create_alternatives_table.php
    2025_01_01_000003_create_values_table.php
  seeders/
    DatabaseSeeder.php

routes/
  web.php

resources/
  views/
    layouts/
      app.blade.php
    auth/
      login.blade.php
    spk/
      index.blade.php
      top5.blade.php
      show.blade.php
    criteria/
      index.blade.php
      create.blade.php
      edit.blade.php
    alternatives/
      index.blade.php
      create.blade.php
      edit.blade.php
    partials/
      _criteria_form.blade.php
      _alternative_form.blade.php
