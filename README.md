# InstaApp - Aplikasi Berbagi Foto Sederhana

## Deskripsi

InstaApp adalah aplikasi web sederhana yang memungkinkan pengguna untuk berbagi foto, memberikan like, dan berkomentar pada postingan. Aplikasi ini meniru beberapa fitur dasar dari platform media sosial populer.

## Fitur Utama

* **Autentikasi Pengguna:**
    * **Mendaftar User Baru (POST `/register`):** Pengguna dapat membuat akun baru dengan nama, email, dan kata sandi.
    * **Melakukan Login (POST `/login`):** Pengguna terdaftar dapat masuk ke aplikasi menggunakan email dan kata sandi mereka.
    * **Logout (POST `/logout`):** Pengguna yang sudah login dapat keluar dari aplikasi.
* **Post:**
    * **Membuat Postingan Baru (POST `/posts` - memerlukan autentikasi):** Pengguna yang login dapat mengunggah foto dengan deskripsi (caption).
    * **Mengambil Daftar Semua Post (GET `/posts`):** Menampilkan daftar semua postingan yang tersedia.
    * **Mengambil Detail Post Tertentu (GET `/posts/{id}`):** Menampilkan detail lengkap dari sebuah postingan berdasarkan ID.
* **Like:**
    * **Menambahkan Like pada Sebuah Post (POST `/posts/{post}/like` - memerlukan autentikasi):** Pengguna yang login dapat menyukai sebuah postingan.
    * **Menghapus Like pada Sebuah Post (DELETE `/posts/{post}/like` - memerlukan autentikasi):** Pengguna yang login dapat membatalkan like pada sebuah postingan.
* **Comment:**
    * **Menambahkan Komentar pada Sebuah Post (POST `/posts/{post}/comments` - memerlukan autentikasi):** Pengguna yang login dapat menulis komentar pada sebuah postingan.
    * **Menghapus Komentar (DELETE `/comments/{comment}` - memerlukan autentikasi):** Pengguna yang login dapat menghapus komentar mereka sendiri.
* **Profil Pengguna:**
    * **Melihat Profil Pengguna (GET `/profile/{user?}` - memerlukan autentikasi):** Menampilkan profil pengguna. Jika tanpa parameter, menampilkan profil pengguna yang sedang login. Jika dengan parameter `{user}`, menampilkan profil pengguna lain.
    * **Membuat Postingan di Profil (POST `/posts` - memerlukan autentikasi):** Postingan yang dibuat akan terkait dengan profil pengguna yang membuatnya.
    * **Menampilkan Postingan di Profil:** Postingan pengguna akan ditampilkan di halaman profil mereka.

## Teknologi yang Digunakan

* **PHP:** Bahasa pemrograman backend utama.
* **Laravel:** Framework PHP yang digunakan untuk membangun aplikasi.
* **MySQL (atau database lain yang dikonfigurasi Laravel):** Sistem manajemen database untuk menyimpan data pengguna, postingan, likes, dan komentar.
* **Blade:** Templating engine Laravel untuk membuat tampilan antarmuka pengguna.
* **HTML, CSS, JavaScript:** Untuk struktur, gaya, dan interaktivitas frontend.
* **Font Awesome (atau library ikon lain):** Untuk ikon-ikon seperti kamera, plus, like, dll.

## Instalasi

1.  **Clone Repository:**
    ```bash
    git clone [URL_REPOSITORY_ANDA]
    cd InstaApp
    ```

2.  **Install Composer Dependencies:**
    ```bash
    composer install
    ```

3.  **Salin File `.env.example` menjadi `.env` dan Konfigurasi Database:**
    ```bash
    cp .env.example .env
    ```
    Buka file `.env` dan sesuaikan pengaturan database (`DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) sesuai dengan konfigurasi database Anda.

4.  **Generate Application Key:**
    ```bash
    php artisan key:generate
    ```

5.  **Jalankan Migrasi Database:**
    ```bash
    php artisan migrate --seed
    ```
    Perintah ini akan membuat tabel-tabel yang diperlukan di database Anda dan menjalankan seeder (jika ada) untuk data awal.

6.  **Buat Symbolic Link untuk Storage:**
    ```bash
    php artisan storage:link
    ```
    Ini akan membuat link `public/storage` yang mengarah ke `storage/app/public` agar aset yang diunggah dapat diakses melalui web.

7.  **Jalankan Server Pengembangan:**
    ```bash
    php artisan serve
    ```
    Aplikasi akan berjalan di `http://localhost:8000`.

## Penggunaan

1.  **Buka aplikasi** melalui URL yang diberikan oleh server pengembangan.
2.  **Daftar akun baru** melalui link atau form registrasi.
3.  **Login** menggunakan akun yang sudah terdaftar.
4.  **Buat postingan** dengan mengklik tombol atau link "Buat Postingan" dan mengunggah foto dengan deskripsi. Postingan akan muncul di profil Anda dan di halaman utama (jika diimplementasikan).
5.  **Lihat profil** Anda atau profil pengguna lain melalui link profil. Postingan pengguna akan ditampilkan di halaman profil mereka.
6.  **Berikan like** pada postingan dengan mengklik ikon like.
7.  **Tambahkan komentar** pada postingan melalui form komentar.
8.  **Logout** dari aplikasi melalui link atau tombol logout.

## Catatan Tambahan

* Aplikasi ini adalah implementasi sederhana dan mungkin tidak mencakup semua fitur yang ada pada platform media sosial yang lebih kompleks.
* Untuk pengembangan lebih lanjut, Anda dapat menambahkan fitur seperti following/followers, notifikasi, edit profil, dan lain-lain.
------
##
Link Postman : https://documenter.getpostman.com/view/43024881/2sB2j7cUJu
