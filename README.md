# Perpustakaan Buku Digital (CodeIgniter 3)

## Fitur
- CRUD Buku (upload PDF)
- Login admin (session)
- Search & Pagination

## Cara Menjalankan

1. **Clone/Copy folder ini ke htdocs XAMPP**
2. **Buat database MySQL bernama `perpustakaan`**
3. **Import file `perpustakaan.sql` ke database**
4. **Jalankan XAMPP (Apache & MySQL)**
5. **Akses di browser:**
   - `http://localhost/UAS/`
6. **Login admin:**
   - Username: `admin`
   - Password: `admin123` (ganti hash di SQL jika ingin password lain)

## Catatan
- File PDF buku akan tersimpan di folder `uploads/`
- Untuk ganti password admin, update hash di tabel `users` (gunakan PHP password_hash)
- Jika ingin menjalankan dengan PHP built-in server:
  ```
  php -S localhost:8000
  ```
  lalu akses `http://localhost:8000/` 