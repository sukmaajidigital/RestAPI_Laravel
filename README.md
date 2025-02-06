# Laravel REST API

## Pendahuluan

Proyek ini adalah REST API yang dibangun menggunakan Laravel. API ini menyediakan fitur autentikasi pengguna, manajemen postingan, dan komentar.

## Instalasi

1. Clone repository:
    ```sh
    git clone <repository-url>
    cd <project-directory>
    ```
2. Install dependensi:
    ```sh
    composer install
    ```
3. Konfigurasi environment:

    ```sh
    cp .env.example .env
    ```

    Edit file `.env` dan sesuaikan konfigurasi database.

4. Generate application key:

    ```sh
    php artisan key:generate
    ```

5. Jalankan migrasi database:

    ```sh
    php artisan migrate --seed
    ```

6. Jalankan server lokal:
    ```sh
    php artisan serve
    ```

## Endpoint API

### Autentikasi

| Method | Endpoint | Deskripsi                               |
| ------ | -------- | --------------------------------------- |
| POST   | /login   | Login dan mendapatkan token             |
| POST   | /logout  | Logout (wajib login)                    |
| GET    | /me      | Mendapatkan data pengguna (wajib login) |

### Manajemen Postingan

| Method | Endpoint   | Deskripsi                                       |
| ------ | ---------- | ----------------------------------------------- |
| GET    | /post      | Mendapatkan semua postingan                     |
| GET    | /post/me   | Mendapatkan postingan milik pengguna yang login |
| GET    | /post/{id} | Mendapatkan detail postingan berdasarkan ID     |
| POST   | /post      | Membuat postingan baru (wajib login)            |
| PATCH  | /post/{id} | Mengupdate postingan (wajib login & akses)      |
| DELETE | /post/{id} | Menghapus postingan (wajib login & akses)       |

### Manajemen Komentar

| Method | Endpoint | Deskripsi                  |
| ------ | -------- | -------------------------- |
| GET    | /comment | Mendapatkan semua komentar |

### Manajemen Pengguna

| Method | Endpoint | Deskripsi                         |
| ------ | -------- | --------------------------------- |
| GET    | /user    | Mendapatkan daftar semua pengguna |

## Middleware

-   **auth:sanctum**: Digunakan untuk melindungi endpoint yang membutuhkan autentikasi.
-   **aksespost**: Middleware khusus untuk memeriksa kepemilikan postingan sebelum update atau delete.

## Contoh Penggunaan

### Login

Request:

```sh
curl -X POST \
  http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"username": "user1", "password": "password"}'
```

Response:

```json
"token_string"
```

Gunakan token ini pada header Authorization untuk mengakses endpoint yang membutuhkan autentikasi.

### Membuat Postingan

Request:

```sh
curl -X POST \
  http://localhost:8000/api/post \
  -H "Authorization: Bearer token_string" \
  -H "Content-Type: application/json" \
  -d '{"title": "Judul", "news_content": "Isi konten"}'
```

### Logout

Request:

```sh
curl -X POST \
  http://localhost:8000/api/logout \
  -H "Authorization: Bearer token_string"
```

## Lisensi

Proyek ini menggunakan lisensi [MIT](LICENSE).
