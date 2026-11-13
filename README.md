# PresensiGPS – BPRS Barkah Gemadana Banjarmasin

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="350" alt="Laravel Logo">
</p>

<p align="center">
  **Sistem Informasi Presensi Karyawan Berbasis GPS**
</p>

---

## Tentang PresensiGPS

**PresensiGPS** merupakan aplikasi berbasis web yang dikembangkan untuk mendukung proses pengelolaan kehadiran karyawan di **PT BPRS Barkah Gemadana Banjarmasin**.

Aplikasi ini dirancang untuk mempermudah proses pencatatan, pemantauan, dan pengelolaan presensi karyawan dengan memanfaatkan teknologi Global Positioning System (GPS) untuk memvalidasi lokasi saat karyawan melakukan presensi.

Selain pencatatan kehadiran, aplikasi ini juga menyediakan fitur administrasi untuk membantu pengelolaan data karyawan, perizinan, serta laporan presensi secara terpusat.

## Fitur Utama

### 1. Presensi Karyawan
- Pencatatan presensi masuk dan pulang.
- Validasi lokasi presensi menggunakan GPS.
- Pencatatan waktu kehadiran karyawan.
- Pemantauan riwayat presensi.

### 2. Pengelolaan Data Karyawan
- Manajemen data karyawan.
- Pengelolaan informasi dan akun karyawan.
- Pengaturan data karyawan oleh administrator.

### 3. Pengajuan Izin dan Sakit
- Pengajuan izin dan sakit secara online.
- Pengelolaan data pengajuan izin.
- Pemantauan status pengajuan oleh administrator.

### 4. Dashboard Administrator
- Ringkasan data presensi karyawan.
- Monitoring kehadiran karyawan.
- Pengelolaan data karyawan.
- Pengelolaan data izin dan sakit.

### 5. Laporan Presensi
- Rekapitulasi presensi karyawan.
- Laporan kehadiran berdasarkan periode.
- Penyajian data presensi untuk kebutuhan administrasi dan evaluasi.

## Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| PHP | Bahasa pemrograman backend |
| Laravel | Backend web framework |
| MySQL / MariaDB | Database management system |
| JavaScript | Interaksi pada antarmuka |
| AJAX | Komunikasi data asynchronous |
| HTML5 & CSS3 | Struktur dan tampilan aplikasi |
| Bootstrap | Framework antarmuka |
| GPS Geolocation API | Validasi lokasi presensi |

## Struktur Aplikasi

Aplikasi ini dikembangkan menggunakan arsitektur Laravel dengan pendekatan Model-View-Controller (MVC).

- **Models** – Mengelola representasi dan interaksi data dengan database.
- **Views** – Menampilkan antarmuka aplikasi kepada pengguna.
- **Controllers** – Mengelola logika bisnis dan alur pemrosesan aplikasi.
- **Routes** – Mengatur endpoint dan navigasi aplikasi.
- **Migrations** – Mengelola perubahan struktur database.

## Instalasi dan Konfigurasi

### 1. Clone Repository

```bash
git clone <repository-url>
```

### 2. Masuk ke Direktori Project

```bash
cd presensigps
```

### 3. Install Dependencies

```bash
composer install
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`.

```bash
cp .env.example .env
```

Sesuaikan konfigurasi database pada file `.env`.

```env
APP_NAME=PresensiGPS
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=presensigps
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Migrasi Database

```bash
php artisan migrate
```

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

## Penggunaan Aplikasi

Aplikasi memiliki dua jenis akses utama:

- **Karyawan:** Digunakan untuk melakukan presensi masuk dan pulang, melihat riwayat kehadiran, serta mengajukan izin atau sakit.
- **Administrator:** Digunakan untuk mengelola data karyawan, memantau aktivitas presensi, memproses pengajuan izin, dan melihat laporan kehadiran.

## Tujuan Pengembangan

Pengembangan PresensiGPS bertujuan untuk:

1. Meningkatkan efisiensi proses administrasi kehadiran karyawan.
2. Meminimalkan pencatatan presensi secara manual.
3. Meningkatkan akurasi pencatatan waktu dan lokasi kehadiran.
4. Mempermudah monitoring kehadiran karyawan.
5. Menyediakan data presensi yang terstruktur untuk kebutuhan pelaporan perusahaan.

---

<p align="center">
  **PresensiGPS**
  <br>
  Sistem Informasi Presensi Karyawan
  <br>
  **PT BPRS Barkah Gemadana Banjarmasin**
</p>
