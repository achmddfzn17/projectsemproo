<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\Berita;
use App\Models\Artikel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin Karang Taruna',
            'email' => 'admin@karangtaruna.id',
            'password' => Hash::make('password123'),
        ]);

        // Create Sample Anggota
        Anggota::create([
            'nama' => 'Budi Santoso',
            'nik' => '3201012001950001',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1995-01-20',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Merdeka No. 123, Jakarta',
            'no_hp' => '081234567890',
            'email' => 'budi@example.com',
            'pendidikan_terakhir' => 'S1',
            'pekerjaan' => 'Karyawan Swasta',
            'status' => 'aktif',
        ]);

        Anggota::create([
            'nama' => 'Siti Nurhaliza',
            'nik' => '3201012001960002',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1996-05-15',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Sudirman No. 456, Bandung',
            'no_hp' => '081234567891',
            'email' => 'siti@example.com',
            'pendidikan_terakhir' => 'S1',
            'pekerjaan' => 'Guru',
            'status' => 'aktif',
        ]);

        // Create Sample Kegiatan
        Kegiatan::create([
            'nama_kegiatan' => 'Bakti Sosial Ramadan',
            'jenis_kegiatan' => 'sosial',
            'deskripsi' => 'Kegiatan bakti sosial memberikan bantuan kepada masyarakat kurang mampu di bulan Ramadan',
            'tanggal_mulai' => now()->addDays(10),
            'lokasi' => 'Kelurahan Merdeka',
            'penanggung_jawab' => 'Budi Santoso',
            'jumlah_peserta' => 50,
            'status' => 'rencana',
        ]);

        Kegiatan::create([
            'nama_kegiatan' => 'Turnamen Futsal Antar RT',
            'jenis_kegiatan' => 'olahraga',
            'deskripsi' => 'Turnamen futsal untuk mempererat tali silaturahmi antar warga',
            'tanggal_mulai' => now()->addDays(20),
            'tanggal_selesai' => now()->addDays(22),
            'lokasi' => 'Lapangan Futsal Merdeka',
            'penanggung_jawab' => 'Ahmad Fauzi',
            'jumlah_peserta' => 80,
            'status' => 'rencana',
        ]);

        // Create Sample Program
        Program::create([
            'nama_program' => 'Pemberdayaan UMKM Pemuda',
            'deskripsi' => 'Program pelatihan dan pendampingan UMKM untuk pemuda',
            'tanggal_mulai' => now(),
            'koordinator' => 'Siti Nurhaliza',
            'anggaran' => 50000000,
            'target_capaian' => '50 UMKM pemuda terbentuk',
            'status' => 'aktif',
        ]);

        // Create Sample Berita
        $user = User::first();
        
        Berita::create([
            'judul' => 'Karang Taruna Gelar Bakti Sosial',
            'slug' => 'karang-taruna-gelar-bakti-sosial',
            'konten' => 'Karang Taruna menggelar kegiatan bakti sosial untuk membantu masyarakat kurang mampu. Kegiatan ini diikuti oleh 50 anggota dan memberikan bantuan berupa sembako kepada 100 keluarga.',
            'user_id' => $user->id,
            'is_published' => true,
        ]);

        Berita::create([
            'judul' => 'Pelatihan Kewirausahaan untuk Pemuda',
            'slug' => 'pelatihan-kewirausahaan-untuk-pemuda',
            'konten' => 'Karang Taruna menyelenggarakan pelatihan kewirausahaan untuk pemuda. Pelatihan ini bertujuan untuk meningkatkan kemampuan pemuda dalam berwirausaha dan menciptakan lapangan kerja.',
            'user_id' => $user->id,
            'is_published' => true,
        ]);

        // Create Sample Artikel
        Artikel::create([
            'judul' => 'Tips Membangun Jiwa Kepemimpinan',
            'slug' => 'tips-membangun-jiwa-kepemimpinan',
            'konten' => 'Kepemimpinan adalah keterampilan penting yang harus dimiliki oleh setiap pemuda. Berikut adalah beberapa tips untuk membangun jiwa kepemimpinan: 1. Belajar dari pengalaman, 2. Berani mengambil keputusan, 3. Komunikasi yang efektif.',
            'kategori' => 'kepemimpinan',
            'user_id' => $user->id,
            'is_published' => true,
        ]);

        Artikel::create([
            'judul' => 'Pentingnya Pemberdayaan Pemuda di Era Digital',
            'slug' => 'pentingnya-pemberdayaan-pemuda-di-era-digital',
            'konten' => 'Di era digital ini, pemuda harus mampu beradaptasi dengan perkembangan teknologi. Pemberdayaan pemuda melalui pelatihan digital marketing, coding, dan keterampilan teknologi lainnya sangat penting untuk masa depan.',
            'kategori' => 'pemberdayaan',
            'user_id' => $user->id,
            'is_published' => true,
        ]);
    }
}
