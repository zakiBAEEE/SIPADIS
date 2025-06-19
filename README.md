# SIPADIS (Sistem Informasi Persuratan dan Disposisi)

SIPADIS adalah aplikasi berbasis web yang dirancang untuk mencatat data surat masuk dan  disposisi secara digital di lingkungan LLDIKTI Wilayah 2. Aplikasi ini bertujuan untuk alat untuk mencatat data surat dan beserta disposisinya. Dilengkapi dengan fitur pencarian dengan berbagai filter untuk mempermudah mencari surat. Selain itu juga aplikasi ini memudahkan admin dalam melihat rekapitulasi surat dalam rentang tanggal tertentu.

## Fitur Utama

-   **Manajemen Surat Masuk:** Pencatatan (CRUD) semua surat masuk beserta metadatanya.
-   **Penyimpanan Dokumen:** Kemampuan untuk mengunggah dan menyimpan file scan dari surat fisik.
-   **Pencarian & Filter:** Kemampuan untuk mencari dan memfilter data surat berdasarkan berbagai kriteria.
-   **Cetak Dokumen:** Fitur untuk mencetak lembar disposisi dan laporan agenda.

## Teknologi yang Digunakan

-   **Backend:** PHP 8.2+, [Laravel](https://laravel.com/) 11.x
-   **Frontend:** HTML5, [Tailwind CSS](https://tailwindcss.com/), JavaScript
-   **Database:** MySQL
-   **Server Pengembangan:** `php artisan serve`
-   **Build Tool:** [Vite](https://vitejs.dev/)

## Prasyarat Sistem

Pastikan environment lokal Anda memenuhi kebutuhan berikut sebelum instalasi:

-   PHP >= 8.2
-   Composer 2.x
-   Node.js >= 18.x
-   NPM atau Yarn
-   Database MySQL

## Panduan Instalasi & Setup Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di mesin lokal Anda:

1.  **Clone Repository**
    ```bash
    git clone [URL_REPOSITORY_ANDA]
    cd nama-folder-proyek
    ```

2.  **Install Dependensi PHP**
    Jalankan Composer untuk menginstal semua package PHP yang dibutuhkan.
    ```bash
    composer install
    ```

3.  **Buat File Environment**
    Salin file `.env.example` menjadi file `.env` baru. File ini akan menyimpan semua konfigurasi Anda.
    ```bash
    cp .env.example .env
    ```

4.  **Generate Application Key**
    Setiap aplikasi Laravel membutuhkan kunci enkripsi yang unik.
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database**
    Buka file `.env` dan sesuaikan pengaturan database sesuai dengan konfigurasi lokal Anda:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=root
    DB_PASSWORD=password_anda
    ```
    Pastikan Anda sudah membuat database kosong dengan nama yang sesuai di MySQL Anda.

6.  **Jalankan Migrasi & Seeder**
    Perintah ini akan membuat semua tabel di database dan mengisinya dengan data awal (termasuk data peran dan akun user default).
    ```bash
    php artisan migrate --seed
    ```

7.  **Install Dependensi Frontend**
    Jalankan NPM (atau Yarn) untuk menginstal semua package JavaScript yang dibutuhkan.
    ```bash
    npm install
    ```

8.  **Link Storage**
    Perintah ini akan membuat symbolic link dari `public/storage` ke `storage/app/public` agar file yang diunggah bisa diakses secara publik.
    ```bash
    php artisan storage:link
    ```

9.  **Jalankan Server Pengembangan**
    Aplikasi Anda sekarang siap dijalankan. Jalankan dua perintah ini di dua terminal terpisah:

    -   Terminal 1 (Untuk menjalankan server backend Laravel):
        ```bash
        php artisan serve
        ```
    -   Terminal 2 (Untuk mengkompilasi aset frontend dan memantau perubahan):
        ```bash
        npm run dev
        ```

10. **Akses Aplikasi**
    Buka browser Anda dan kunjungi alamat yang diberikan oleh `php artisan serve` (biasanya `http://127.0.0.1:8000`).



---
