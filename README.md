# Belleza Salon

Web manajemen salon (PHP + MySQL) yang dibungkus Docker.
Fitur utama: kelola data customer (lihat, tambah, hapus).

## Prasyarat
- Docker Desktop (diuji: Docker 28.5.1, Compose v2)
- Git

## Cara menjalankan
1. Clone repo:
   git clone https://github.com/hannyamanda66-design/Belleza_Salon.git
   cd Belleza_Salon
   git checkout chore/dockerize-project
2. Siapkan environment:
   copy .env.example .env   (Windows)
   cp .env.example .env     (Mac/Linux)
   Lalu edit password di .env sesuai keinginan.
3. Build dan jalankan:
   docker compose up --build -d

## Akses
- URL: http://localhost:8080
- Port host: 8080, port container: 80
- Port bisa diubah lewat APP_PORT di .env

## Environment variable
Lihat .env.example: APP_PORT, DB_HOST, DB_NAME, DB_USER, DB_PASS, DB_ROOT_PASSWORD

## Verifikasi
1. docker compose ps -> app "Up", db "healthy"
2. Buka http://localhost:8080 -> daftar customer tampil
3. Klik "Add New Queen", tambah data -> muncul di daftar

## Log dan status
docker compose ps
docker compose logs
docker compose logs -f app

## Stop dan bersihkan
docker compose down        (stop, data DB tetap)
docker compose down -v     (stop + hapus data DB)

## Troubleshooting
- Table 'Customer' doesn't exist: MySQL Linux case-sensitive. Sudah diatasi dengan lower_case_table_names=1. Jalankan docker compose down -v lalu up lagi.
- Port 8080 bentrok: ubah APP_PORT di .env.
- Matikan XAMPP (Apache/MySQL) saat menjalankan Docker.
- Tabel kosong: file db/belleza_salon.sql hanya di-import saat volume baru dibuat; pakai docker compose down -v.

## Known limitations
- Data awal berasal dari db/belleza_salon.sql.
- Opsi lower_case_table_names hanya berlaku pada database baru.
