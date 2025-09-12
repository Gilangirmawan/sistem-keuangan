# Aplikasi Manajemen Keuangan - PT. Techade Indonesia

Selamat datang di repositori Proyek Sistem Keuangan. Aplikasi ini dikembangkan sebagai bagian dari program magang di **PT. Techade Indonesia**. Tujuannya adalah untuk menyediakan platform yang sederhana namun kuat untuk mengelola dan melacak transaksi keuangan, baik pemasukan maupun pengeluaran.

-----

## 📸 Pratinjau Aplikasi

*(Sangat disarankan untuk menambahkan screenshot atau GIF singkat dari aplikasi Anda di sini untuk membuatnya lebih menarik. Ganti `link-ke-gambar-anda.gif` dengan URL gambar Anda)*

*Contoh tampilan Dashboard Utama*

## ✨ Fitur Utama

  - **Dashboard Analitik:** Visualisasi ringkasan keuangan, termasuk total pemasukan, pengeluaran, dan saldo akhir dalam bentuk grafik yang interaktif.
  - **💸 Manajemen Transaksi:** Catat, edit, dan hapus transaksi pemasukan dan pengeluaran dengan mudah.
  - **📑 Kategori Transaksi:** Kelompokkan setiap transaksi ke dalam kategori yang bisa disesuaikan untuk analisis yang lebih mendalam.
  - **📄 Ekspor Laporan PDF:** Hasilkan laporan keuangan periodik dalam format PDF dengan mudah menggunakan integrasi Laravel DOMPDF.
  - **🔐 Otentikasi Pengguna:** Sistem otentikasi bawaan Laravel untuk keamanan data.
  - **📱 Desain Responsif:** Tampilan yang optimal di berbagai perangkat, dari desktop hingga mobile, berkat Tailwind CSS.

## 🛠️ Teknologi yang Digunakan

  - **Backend:** Laravel 11
  - **Frontend:** Tailwind CSS & Alpine.js
  - **Database:** MySQL 
  - **Lainnya:**
      - `barryvdh/laravel-dompdf`: Untuk fungsionalitas pembuatan laporan PDF.
      - `maatwebsite/excel`: Untuk fungsionalitas pembuatan laporan Excel.

## 🚀 Panduan Instalasi & Setup

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek ini di lingkungan lokal Anda.

### Prasyarat

  - PHP \>= 8.2
  - Composer
  - Node.js & NPM
  - Database Server (cth: MySQL, MariaDB)

### Langkah-langkah Instalasi

1.  **Clone repositori ini:**

    ```bash
    git clone https://github.com/Gilangirmawan/sistem-keuangan.git
    cd sistem-keuangan
    ```

2.  **Install dependensi Composer:**

    ```bash
    composer install
    ```

    *(Catatan: `barryvdh/laravel-dompdf` sudah termasuk di dalam `composer.json` Anda, jadi `composer install` akan menginstalnya secara otomatis)*

3.  **Install dependensi NPM:**

    ```bash
    npm install
    ```

4.  **Buat file `.env`:**
    Salin file `.env.example` menjadi `.env`.

    ```bash
    cp .env.example .env
    ```

5.  **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

6.  **Konfigurasi Database:**
    Buka file `.env` dan sesuaikan konfigurasi database Anda.

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=sistem_keuangan
    DB_USERNAME=root
    DB_PASSWORD=
    ```

    Pastikan Anda sudah membuat database dengan nama `sistem_keuangan`.

7.  **Jalankan Migrasi & Seeder:**
    Perintah ini akan membuat struktur tabel dan mengisi data awal (contoh) ke database.

    ```bash
    php artisan migrate --seed
    ```

8.  **Buat Symbolic Link untuk Storage:**

    ```bash
    php artisan storage:link
    ```

9.  **Compile Aset Frontend:**

    ```bash
    npm run dev
    ```

10. **Jalankan Development Server:**

    ```bash
    php artisan serve
    ```

Aplikasi Anda sekarang berjalan di `http://127.0.0.1:8000`.

## 🧑‍💻 Akun Demo

Setelah menjalankan `db:seed`, Anda bisa login menggunakan akun demo berikut:

  - **Email:** `admin@gmail.com`
  - **Password:** `admin123`

## 🙏 Ucapan Terima Kasih

Proyek ini tidak akan terwujud tanpa kesempatan dan bimbingan yang diberikan oleh **PT. Techade Indonesia** selama periode magang. Terima kasih atas semua ilmu dan pengalaman yang berharga.

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE.md).
