# LAMPIRAN PENGUJIAN BLACK-BOX TESTING
## Sistem Informasi Manajemen Karang Taruna "Generasi Emas" Berbasis Web

---

## 1. PENDAHULUAN

### 1.1 Tujuan Pengujian
Dokumen ini berisi hasil pengujian Black-Box Testing pada Sistem Informasi Manajemen Karang Taruna "Generasi Emas" Berbasis Web. Pengujian dilakukan untuk memastikan bahwa seluruh fitur sistem berfungsi sesuai dengan spesifikasi yang telah ditetapkan, dengan pendekatan pengujian yang tidak memerlukan pengetahuan tentang struktur internal atau kode program.

### 1.2 Cakupan Pengujian
Pengujian mencakup seluruh fitur utama sistem:
- Manajemen Data Anggota
- Manajemen Data Kegiatan
- Manajemen Data Program Kerja
- Manajemen Berita
- Manajemen Artikel
- Manajemen Keuangan
- Manajemen Galeri
- Sistem Autentikasi (Login/Logout)
- Pendaftaran Kegiatan oleh Anggota

### 1.3 Pendekatan Pengujian
Pengujian Black-Box Testing dilakukan dengan metode:
- **Equivalence Partitioning**: Membagi input menjadi kelompok-kelompok yang setara
- **Boundary Value Analysis**: Menguji nilai batas dari input
- **Error Guessing**: Mengantisipasi kesalahan yang mungkin terjadi berdasarkan pengalaman

### 1.4 Referensi
1. Pressman, R.S. & Maxim, B.R. (2020). *Software Engineering: A Practitioner's Approach* (9th ed.). McGraw-Hill Education.
2. Sommerville, I. (2016). *Software Engineering* (10th ed.). Pearson Education Limited.
3. Jorgensen, P.C. (2014). *Software Testing* (3rd ed.). CRC Press.

---

## 2. PENGUJIAN MANAJEMEN DATA ANGGOTA

### 2.1 Tabel Pengujian Login Autentikasi

| **ID Test** | **TC-001** |
|-------------|------------|
| **Nama Test** | Login dengan kredensial valid |
| **Prioritas** | High |
| ** precondition** | User belum login ke sistem |
| **Langkah Pengujian** | 1. Buka halaman login<br>2. Masukkan email/username yang valid<br>3. Masukkan password yang benar<br>4. Klik tombol Login |
| **Data Uji** | Email: admin@katargenerasigold.com<br>Password: password123 |
| **Hasil yang Diharapkan** | User berhasil login dan diarahkan ke halaman dashboard admin |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-002** |
|-------------|------------|
| **Nama Test** | Login dengan password salah |
| **Prioritas** | High |
| **Precondition** | User belum login ke sistem |
| **Langkah Pengujian** | 1. Buka halaman login<br>2. Masukkan email/username yang valid<br>3. Masukkan password yang salah<br>4. Klik tombol Login |
| **Data Uji** | Email: admin@katargenerasigold.com<br>Password: salahpassword |
| **Hasil yang Diharapkan** | Muncul pesan error "Email/Username atau password salah" dan user tetap di halaman login |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-003** |
|-------------|------------|
| **Nama Test** | Login dengan field kosong |
| **Prioritas** | Medium |
| **Precondition** | User belum login ke sistem |
| **Langkah Pengujian** | 1. Buka halaman login<br>2. Klik tombol Login tanpa mengisi field |
| **Data Uji** | Email: (kosong)<br>Password: (kosong) |
| **Hasil yang Diharapkan** | Muncul pesan validasi "Login harus diisi" dan "Password harus diisi" |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

### 2.2 Tabel Pengujian CRUD Anggota

| **ID Test** | **TC-004** |
|-------------|------------|
| **Nama Test** | Menampilkan daftar anggota |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Anggota" pada sidebar<br>2. Perhatikan daftar anggota yang ditampilkan |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan daftar seluruh anggota dengan informasi: Nama, Email, Jabatan, Status |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-005** |
|-------------|------------|
| **Nama Test** | Menambah anggota baru dengan data lengkap |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Anggota"<br>2. Klik tombol "Tambah Anggota Baru"<br>3. Isi seluruh field dengan data lengkap<br>4. Klik tombol "Simpan" |
| **Data Uji** | Nama: Test Anggota<br>Email: test@contoh.com<br>Password: Test123456<br>NIK: 1234567890123456<br>Tempat Lahir: Jakarta<br>Tanggal Lahir: 2000-01-01<br>Jenis Kelamin: Laki-laki<br>Alamat: Jl. Test No. 1<br>No. HP: 081234567890<br>Jabatan: Anggota |
| **Hasil yang Diharapkan** | Muncul pesan "Anggota berhasil ditambahkan" dan anggota baru muncul di daftar |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-006** |
|-------------|------------|
| **Nama Test** | Menambah anggota baru dengan email duplikat |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Anggota"<br>2. Klik tombol "Tambah Anggota Baru"<br>3. Isi email dengan email yang sudah ada<br>4. Isi field lainnya dengan data valid<br>5. Klik tombol "Simpan" |
| **Data Uji** | Email: admin@katargenerasigold.com (email yang sudah ada) |
| **Hasil yang Diharapkan** | Muncul pesan error validasi "Email sudah digunakan" |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-007** |
|-------------|------------|
| **Nama Test** | Mengedit data anggota |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat anggota di database |
| **Langkah Pengujian** | 1. Klik menu "Data Anggota"<br>2. Pilih anggota yang akan diedit<br>3. Klik tombol "Edit"<br>4. Ubah beberapa data<br>5. Klik tombol "Update" |
| **Data Uji** | Nama: Diubah menjadi "Nama Baru" |
| **Hasil yang Diharapkan** | Muncul pesan "Anggota berhasil diperbarui" dan data berubah di daftar |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-008** |
|-------------|------------|
| **Nama Test** | Menghapus anggota |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat anggota di database |
| **Langkah Pengujian** | 1. Klik menu "Data Anggota"<br>2. Pilih anggota yang akan dihapus<br>3. Klik tombol "Hapus"<br>4. Konfirmasi penghapusan |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Muncul pesan "Anggota berhasil dihapus" dan anggota tidak muncul lagi di daftar |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-009** |
|-------------|------------|
| **Nama Test** | Export profil anggota ke PDF |
| **Prioritas** | Medium |
| **Precondition** | User telah login sebagai anggota |
| **Langkah Pengujian** | 1. Login sebagai anggota<br>2. Buka menu "Profil"<br>3. Klik tombol "Export PDF" |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | File PDF terunduh dengan data profil anggota |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

---

## 3. PENGUJIAN MANAJEMEN DATA KEGIATAN

| **ID Test** | **TC-010** |
|-------------|------------|
| **Nama Test** | Menampilkan daftar kegiatan |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Kegiatan" pada sidebar<br>2. Perhatikan daftar kegiatan yang ditampilkan |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan daftar seluruh kegiatan dengan informasi: Judul, Tanggal, Lokasi, Status |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-011** |
|-------------|------------|
| **Nama Test** | Menambah kegiatan baru |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Kegiatan"<br>2. Klik tombol "Tambah Kegiatan Baru"<br>3. Isi seluruh field<br>4. Upload poster kegiatan<br>5. Klik tombol "Simpan" |
| **Data Uji** | Judul: Test Kegiatan<br>Tanggal Mulai: 2025-01-15<br>Tanggal Selesai: 2025-01-16<br>Lokasi: Aula Desa<br>Deskripsi: Kegiatan uji coba<br>Kuota: 50 |
| **Hasil yang Diharapkan** | Muncul pesan "Kegiatan berhasil ditambahkan" |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-012** |
|-------------|------------|
| **Nama Test** | Mengubah status kegiatan |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat kegiatan di database |
| **Langkah Pengujian** | 1. Klik menu "Data Kegiatan"<br>2. Pilih kegiatan<br>3. Klik tombol "Edit"<br>4. Ubah status menjadi "selesai"<br>5. Klik tombol "Update" |
| **Data Uji** | Status: selesai |
| **Hasil yang Diharapkan** | Status kegiatan berubah dan kegiatan muncul di daftar pendaftaran |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-013** |
|-------------|------------|
| **Nama Test** | Menghapus kegiatan |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat kegiatan di database |
| **Langkah Pengujian** | 1. Klik menu "Data Kegiatan"<br>2. Pilih kegiatan yang akan dihapus<br>3. Klik tombol "Hapus"<br>4. Konfirmasi penghapusan |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Kegiatan terhapus dari database beserta pendaftaran terkait |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

---

## 4. PENGUJIAN PENDAFTARAN KEGIATAN

| **ID Test** | **TC-014** |
|-------------|------------|
| **Nama Test** | Pendaftaran kegiatan oleh anggota (login) |
| **Prioritas** | High |
| **Precondition** | User belum login sebagai anggota |
| **Langkah Pengujian** | 1. Buka halaman pendaftaran kegiatan<br>2. Klik tombol "Daftar"<br>3. Login dengan kredensial anggota<br>4. Lengkapi formulir pendaftaran |
| **Data Uji** | Email: anggota@contoh.com<br>Password: anggota123 |
| **Hasil yang Diharapkan** | Berhasil login dan form pendaftaran tampil |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-015** |
|-------------|------------|
| **Nama Test** | Submit pendaftaran kegiatan |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai anggota dan terdapat kegiatan dengan kuota tersedia |
| **Langkah Pengujian** | 1. Buka halaman detail kegiatan<br>2. Klik tombol "Daftar Sekarang"<br>3. Submit formulir |
| **Data Uji** | Kegiatan dengan kuota > 0 |
| **Hasil yang Diharapkan** | Muncul halaman sukses dengan detail pendaftaran |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-016** |
|-------------|------------|
| **Nama Test** | Pendaftaran kegiatan dengan kuota penuh |
| **Prioritas** | Medium |
| **Precondition** | Terdapat kegiatan dengan kuota = 0 |
| **Langkah Pengujian** | 1. Buka halaman detail kegiatan penuh<br>2. Klik tombol "Daftar Sekarang" |
| **Data Uji** | Kegiatan dengan kuota = 0 |
| **Hasil yang Diharapkan** | Muncul pesan "Kuota sudah penuh" atau tombol daftar tidak aktif |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-017** |
|-------------|------------|
| **Nama Test** | Approve pendaftaran oleh admin |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat pendaftaran pending |
| **Langkah Pengujian** | 1. Buka detail kegiatan<br>2. Klik tab "Pendaftaran"<br>3. Klik tombol "Approve" pada pendaftaran |
| **Data Uji** | Pendaftaran dengan status "pending" |
| **Hasil yang Diharapkan** | Status pendaftaran berubah menjadi "approved" |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-018** |
|-------------|------------|
| **Nama Test** | Reject pendaftaran oleh admin |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat pendaftaran pending |
| **Langkah Pengujian** | 1. Buka detail kegiatan<br>2. Klik tab "Pendaftaran"<br>3. Klik tombol "Reject" pada pendaftaran |
| **Data Uji** | Pendaftaran dengan status "pending" |
| **Hasil yang Diharapkan** | Status pendaftaran berubah menjadi "rejected" |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-019** |
|-------------|------------|
| **Nama Test** | Check-in peserta kegiatan |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat pendaftaran approved |
| **Langkah Pengujian** | 1. Buka detail kegiatan<br>2. Klik tab "Pendaftaran"<br>3. Klik tombol "Check-in" pada pendaftaran approved |
| **Data Uji** | Pendaftaran dengan status "approved" |
| **Hasil yang Diharapkan** | Status pendaftaran berubah menjadi "checked_in" |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-020** |
|-------------|------------|
| **Nama Test** | Export absensi kegiatan ke PDF |
| **Prioritas** | Medium |
| **Precondition** | User telah login sebagai admin dan terdapat pendaftaran |
| **Langkah Pengujian** | 1. Buka detail kegiatan<br>2. Klik tombol "Export Absensi PDF" |
| **Data Uji** | Kegiatan dengan minimal 1 pendaftaran |
| **Hasil yang Diharapkan** | File PDF absensi terunduh |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

---

## 5. PENGUJIAN MANAJEMEN KEUANGAN

| **ID Test** | **TC-021** |
|-------------|------------|
| **Nama Test** | Menampilkan dashboard keuangan |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Keuangan" pada sidebar<br>2. Perhatikan dashboard yang ditampilkan |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan: Total Kas Masuk, Total Kas Keluar, Saldo, Ringkasan Transaksi Terbaru |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-022** |
|-------------|------------|
| **Nama Test** | Menambah transaksi kas masuk |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Keuangan"<br>2. Klik "Kas Masuk"<br>3. Klik tombol "Tambah Kas Masuk"<br>4. Isi formulir<br>5. Klik "Simpan" |
| **Data Uji** | Kategori: Iuran Bulanan<br>Jumlah: 50000<br>Keterangan: Iuran bulan Januari 2025<br>Tanggal: 2025-01-15 |
| **Hasil yang Diharapkan** | Muncul pesan "Transaksi berhasil disimpan" dan total kas masuk bertambah |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-023** |
|-------------|------------|
| **Nama Test** | Menambah transaksi kas keluar |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Keuangan"<br>2. Klik "Kas Keluar"<br>3. Klik tombol "Tambah Kas Keluar"<br>4. Isi formulir<br>5. Klik "Simpan" |
| **Data Uji** | Kategori: Peralatan<br>Jumlah: 150000<br>Keterangan: Beli ATK untuk kegiatan<br>Tanggal: 2025-01-20 |
| **Hasil yang Diharapkan** | Muncul pesan "Transaksi berhasil disimpan" dan total kas keluar bertambah |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-024** |
|-------------|------------|
| **Nama Test** | Input nominal dengan karakter non-numerik |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Keuangan" > "Kas Masuk"<br>2. Klik "Tambah Kas Masuk"<br>3. Isi jumlah dengan huruf atau simbol |
| **Data Uji** | Jumlah: "Lima Puluh Ribu" atau "50.000abc" |
| **Hasil yang Diharapkan** | Muncul pesan validasi "Jumlah harus berupa angka" |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-025** |
|-------------|------------|
| **Nama Test** | Menghapus transaksi |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat transaksi |
| **Langkah Pengujian** | 1. Klik menu "Keuangan"<br>2. Pilih transaksi<br>3. Klik tombol "Hapus"<br>4. Konfirmasi |
| **Data Uji** | Transaksi apapun |
| **Hasil yang Diharapkan** | Transaksi terhapus dan saldo diperbarui |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-026** |
|-------------|------------|
| **Nama Test** | Generate laporan keuangan |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Keuangan"<br>2. Klik "Laporan"<br>3. Pilih rentang tanggal<br>4. Klik "Filter" |
| **Data Uji** | Tanggal: 2025-01-01 s/d 2025-01-31 |
| **Hasil yang Diharapkan** | Menampilkan transaksi sesuai rentang tanggal dengan rekap total |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-027** |
|-------------|------------|
| **Nama Test** | Export laporan keuangan ke PDF |
| **Prioritas** | Medium |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Keuangan"<br>2. Klik "Laporan"<br>3. Pilih rentang tanggal<br>4. Klik "Export PDF" |
| **Data Uji** | Tanggal: 2025-01-01 s/d 2025-01-31 |
| **Hasil yang Diharapkan** | File PDF laporan keuangan terunduh |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-028** |
|-------------|------------|
| **Nama Test** | Menambah kategori transaksi baru |
| **Prioritas** | Medium |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Keuangan"<br>2. Klik "Kategori"<br>3. Klik "Tambah Kategori"<br>4. Isi nama dan jenis kategori<br>5. Klik "Simpan" |
| **Data Uji** | Nama: Bantuan Sosial<br>Jenis: keluar |
| **Hasil yang Diharapkan** | Kategori baru muncul di daftar |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

---

## 6. PENGUJIAN MANAJEMEN GALERI

| **ID Test** | **TC-029** |
|-------------|------------|
| **Nama Test** | Menampilkan daftar galeri |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Galeri" pada sidebar<br>2. Perhatikan daftar galeri yang ditampilkan |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan grid foto dengan Judul, Kegiatan terkait, dan Tanggal |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-030** |
|-------------|------------|
| **Nama Test** | Upload foto baru |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Galeri"<br>2. Klik "Tambah Foto"<br>3. Pilih kegiatan terkait<br>4. Isi judul dan deskripsi<br>5. Upload file foto<br>6. Klik "Simpan" |
| **Data Uji** | Judul: Dokumentasi Kegiatan<br>Foto: file.jpg (maks 5MB) |
| **Hasil yang Diharapkan** | Foto tampil di daftar galeri |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-031** |
|-------------|------------|
| **Nama Test** | Upload foto dengan format tidak valid |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Galeri"<br>2. Klik "Tambah Foto"<br>3. Upload file non-gambar (misal: .pdf, .exe) |
| **Data Uji** | File: dokumen.pdf |
| **Hasil yang Diharapkan** | Muncul pesan validasi "File harus berupa gambar (jpg, png, gif, webp)" |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-032** |
|-------------|------------|
| **Nama Test** | Upload foto dengan ukuran terlalu besar |
| **Prioritas** | Medium |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Galeri"<br>2. Klik "Tambah Foto"<br>3. Upload file > 5MB |
| **Data Uji** | File: gambar10mb.jpg |
| **Hasil yang Diharapkan** | Muncul pesan validasi "Ukuran file maksimal 5MB" |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-033** |
|-------------|------------|
| **Nama Test** | Edit foto galeri |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat foto di galeri |
| **Langkah Pengujian** | 1. Klik menu "Galeri"<br>2. Pilih foto<br>3. Klik tombol "Edit"<br>4. Ubah judul<br>5. Klik "Update" |
| **Data Uji** | Judul baru: "Judul Diubah" |
| **Hasil yang Diharapkan** | Judul foto berubah di daftar |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-034** |
|-------------|------------|
| **Nama Test** | Hapus foto galeri |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat foto di galeri |
| **Langkah Pengujian** | 1. Klik menu "Galeri"<br>2. Pilih foto<br>3. Klik tombol "Hapus"<br>4. Konfirmasi |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Foto terhapus dari database dan storage |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-035** |
|-------------|------------|
| **Nama Test** | Filter galeri berdasarkan kegiatan |
| **Prioritas** | Medium |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Galeri"<br>2. Pilih kegiatan dari dropdown filter<br>3. Klik "Filter" |
| **Data Uji** | Kegiatan: "Gotong Royong" |
| **Hasil yang Diharapkan** | Hanya menampilkan foto yang terkait dengan kegiatan tersebut |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

---

## 7. PENGUJIAN MANAJEMEN PROGRAM KERJA

| **ID Test** | **TC-036** |
|-------------|------------|
| **Nama Test** | Menampilkan daftar program kerja |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Program" pada sidebar<br>2. Perhatikan daftar program yang ditampilkan |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan daftar program dengan informasi: Judul, Periode, Status |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-037** |
|-------------|------------|
| **Nama Test** | Menambah program kerja baru |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Program"<br>2. Klik "Tambah Program Baru"<br>3. Isi formulir<br>4. Klik "Simpan" |
| **Data Uji** | Judul: Program Pengembangan Keterampilan<br>Periode: 2025<br>Deskripsi: Program pelatihan kerja |
| **Hasil yang Diharapkan** | Muncul pesan "Program berhasil ditambahkan" |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-038** |
|-------------|------------|
| **Nama Test** | Mengedit program kerja |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat program di database |
| **Langkah Pengujian** | 1. Klik menu "Data Program"<br>2. Pilih program<br>3. Klik "Edit"<br>4. Ubah data<br>5. Klik "Update" |
| **Data Uji** | Judul: "Judul Program Diubah" |
| **Hasil yang Diharapkan** | Program berhasil diperbarui |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-039** |
|-------------|------------|
| **Nama Test** | Menghapus program kerja |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat program di database |
| **Langkah Pengujian** | 1. Klik menu "Data Program"<br>2. Pilih program<br>3. Klik "Hapus"<br>4. Konfirmasi |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Program terhapus dari database |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

---

## 8. PENGUJIAN MANAJEMEN BERITA

| **ID Test** | **TC-040** |
|-------------|------------|
| **Nama Test** | Menampilkan daftar berita |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Berita" pada sidebar<br>2. Perhatikan daftar berita yang ditampilkan |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan daftar berita dengan informasi: Judul, Penulis, Tanggal, Status Publikasi |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-041** |
|-------------|------------|
| **Nama Test** | Menambah berita baru dengan rich text |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Berita"<br>2. Klik "Tambah Berita Baru"<br>3. Isi judul, konten dengan format HTML<br>4. Upload gambar<br>5. Klik "Simpan" |
| **Data Uji** | Judul: Berita Test<br>Konten: <p>Paragraf pertama</p><p>Paragraf kedua</p> |
| **Hasil yang Diharapkan** | Berita tampil di halaman publik dengan format yang sama |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-042** |
|-------------|------------|
| **Nama Test** | Upload gambar non-berita |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Berita"<br>2. Klik "Tambah Berita Baru"<br>3. Upload file non-gambar |
| **Data Uji** | File: video.mp4 |
| **Hasil yang Diharapkan** | Muncul pesan validasi error |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-043** |
|-------------|------------|
| **Nama Test** | Publish/unpublish berita |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat berita |
| **Langkah Pengujian** | 1. Klik menu "Data Berita"<br>2. Pilih berita<br>3. Toggle status publish |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Berita tampil atau tersembunyi di halaman publik sesuai status |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-044** |
|-------------|------------|
| **Nama Test** | Menghapus berita |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat berita |
| **Langkah Pengujian** | 1. Klik menu "Data Berita"<br>2. Pilih berita<br>3. Klik "Hapus"<br>4. Konfirmasi |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Berita terhapus dan tidak tampil di halaman publik |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

---

## 9. PENGUJIAN MANAJEMEN ARTIKEL

| **ID Test** | **TC-045** |
|-------------|------------|
| **Nama Test** | Menampilkan daftar artikel |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Artikel" pada sidebar<br>2. Perhatikan daftar artikel yang ditampilkan |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan daftar artikel dengan informasi: Judul, Penulis, Kategori, Tanggal |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-046** |
|-------------|------------|
| **Nama Test** | Menambah artikel baru |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Data Artikel"<br>2. Klik "Tambah Artikel Baru"<br>3. Isi formulir lengkap<br>4. Klik "Simpan" |
| **Data Uji** | Judul: Artikel Test<br>Kategori: Tips<br>Konten: Isi artikel |
| **Hasil yang Diharapkan** | Artikel berhasil ditambahkan |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-047** |
|-------------|------------|
| **Nama Test** | Menghapus artikel |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat artikel |
| **Langkah Pengujian** | 1. Klik menu "Data Artikel"<br>2. Pilih artikel<br>3. Klik "Hapus"<br>4. Konfirmasi |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Artikel terhapus dari database |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

---

## 10. PENGUJIAN HALAMAN PUBLIK

| **ID Test** | **TC-048** |
|-------------|------------|
| **Nama Test** | Menampilkan halaman beranda |
| **Prioritas** | High |
| **Precondition** | Tidak ada (public access) |
| **Langkah Pengujian** | 1. Buka URL homepage |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan: Hero section, Kegiatan terbaru, Berita terbaru, Statistik |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-049** |
|-------------|------------|
| **Nama Test** | Menampilkan daftar berita publik |
| **Prioritas** | High |
| **Precondition** | Terdapat berita dengan status publish |
| **Langkah Pengujian** | 1. Klik menu "Berita" di navbar |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan daftar berita yang dipublikasikan |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-050** |
|-------------|------------|
| **Nama Test** | Menampilkan detail berita |
| **Prioritas** | High |
| **Precondition** | Terdapat berita dengan slug valid |
| **Langkah Pengujian** | 1. Buka halaman daftar berita<br>2. Klik salah satu berita |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan halaman detail berita dengan konten lengkap |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-051** |
|-------------|------------|
| **Nama Test** | Menampilkan daftar kegiatan publik |
| **Prioritas** | High |
| **Precondition** | Terdapat kegiatan di database |
| **Langkah Pengujian** | 1. Klik menu "Kegiatan" di navbar |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan daftar kegiatan yang akan datang |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-052** |
|-------------|------------|
| **Nama Test** | Menampilkan detail kegiatan |
| **Prioritas** | High |
| **Precondition** | Terdapat kegiatan valid |
| **Langkah Pengujian** | 1. Buka halaman daftar kegiatan<br>2. Klik salah satu kegiatan |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan detail kegiatan dengan tombol "Daftar" |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-053** |
|-------------|------------|
| **Nama Test** | Menampilkan halaman tentang |
| **Prioritas** | Medium |
| **Precondition** | Tidak ada |
| **Langkah Pengujian** | 1. Klik menu "Tentang" di navbar |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan informasi tentang Karang Taruna |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

---

## 11. PENGUJIAN KELOLA ADMIN

| **ID Test** | **TC-054** |
|-------------|------------|
| **Nama Test** | Menampilkan daftar admin |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Kelola Admin" pada sidebar |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Menampilkan daftar admin dengan informasi: Nama, Email, Username |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-055** |
|-------------|------------|
| **Nama Test** | Menambah admin baru |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Kelola Admin"<br>2. Klik "Tambah Admin Baru"<br>3. Isi formulir<br>4. Klik "Simpan" |
| **Data Uji** | Nama: Admin Baru<br>Email: adminbaru@contoh.com<br>Username: adminbaru<br>Password: Admin123456 |
| **Hasil yang Diharapkan** | Admin baru dapat login dengan kredensial yang dibuat |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-056** |
|-------------|------------|
| **Nama Test** | Mengedit data admin |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat admin lain |
| **Langkah Pengujian** | 1. Klik menu "Kelola Admin"<br>2. Pilih admin<br>3. Klik "Edit"<br>4. Ubah data<br>5. Klik "Update" |
| **Data Uji** | Nama: "Nama Admin Diubah" |
| **Hasil yang Diharapkan** | Data admin berhasil diperbarui |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-057** |
|-------------|------------|
| **Nama Test** | Menghapus admin lain |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin dan terdapat admin lain |
| **Langkah Pengujian** | 1. Klik menu "Kelola Admin"<br>2. Pilih admin lain<br>3. Klik "Hapus"<br>4. Konfirmasi |
| **Data Uji** | - |
| **Hasil yang Diharapkan** | Admin terhapus dari database |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

| **ID Test** | **TC-058** |
|-------------|------------|
| **Nama Test** | Proteksi penghapusan diri sendiri |
| **Prioritas** | High |
| **Precondition** | User telah login sebagai admin |
| **Langkah Pengujian** | 1. Klik menu "Kelola Admin"<br>2. Pilih admin yang sedang login<br>3. Klik "Hapus" |
| **Data Uji** | Admin yang sedang login |
| **Hasil yang Diharapkan** | Muncul pesan error atau tombol hapus tidak tersedia |
| **Hasil Aktual** | [Diisi setelah pengujian] |
| **Status** | PASS / FAIL |

---

## 12. RINGKASAN HASIL PENGUJIAN

### 12.1 Summary Table

| **Modul** | **Total Test Case** | **Pass** | **Fail** | **Not Executed** | **Pass Rate** |
|-----------|---------------------|----------|----------|------------------|---------------|
| Autentikasi | 3 | 0 | 0 | 3 | - |
| Data Anggota | 6 | 0 | 0 | 6 | - |
| Data Kegiatan | 4 | 0 | 0 | 4 | - |
| Pendaftaran | 7 | 0 | 0 | 7 | - |
| Keuangan | 8 | 0 | 0 | 8 | - |
| Galeri | 7 | 0 | 0 | 7 | - |
| Program Kerja | 4 | 0 | 0 | 4 | - |
| Berita | 5 | 0 | 0 | 5 | - |
| Artikel | 3 | 0 | 0 | 3 | - |
| Halaman Publik | 6 | 0 | 0 | 6 | - |
| Kelola Admin | 5 | 0 | 0 | 5 | - |
| **TOTAL** | **58** | **0** | **0** | **58** | **-** |

### 12.2 Kategori Kesalahan (Error Categories)

| **Kategori Error** | **Deskripsi** | **Jumlah** |
|--------------------|---------------|------------|
| - | - | - |

---

## 13. KESIMPULAN DAN REKOMENDASI

### 13.1 Kesimpulan Pengujian
Berdasarkan pengujian Black-Box Testing yang telah dilakukan terhadap Sistem Informasi Manajemen Karang Taruna "Generasi Emas" Berbasis Web, dapat disimpulkan bahwa:

1. **[Diisi setelah pengujian dilakukan]**

### 13.2 Rekomendasi
Berdasarkan hasil pengujian, disarankan:

1. **[Diisi berdasarkan temuan pengujian]**

---

## 14. LAMPIRAN

### 14.1 Screenshot Bukti Pengujian
*[Tambahkan screenshot setiap langkah pengujian di sini]*

### 14.2 Daftar Tester
| **Nama** | **Role** | **Tanggal** | **Tanda Tangan** |
|----------|----------|-------------|------------------|
| [Nama Tester 1] | Tester | [Tanggal] | |
| [Nama Tester 2] | Tester | [Tanggal] | |

---

*Dokumen ini merupakan bagian dari dokumentasi proyek TA/KP
Sistem Informasi Manajemen Karang Taruna "Generasi Emas" Berbasis Web*
