<?php

namespace Database\Seeders;

use App\Models\KategoriTransaksi;
use Illuminate\Database\Seeder;

class KategoriTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kategori Kas Masuk
        $kategoriMasuk = [
            ['nama_kategori' => 'Iuran Bulanan', 'jenis' => 'masuk', 'deskripsi' => 'Iuran wajib anggota setiap bulan'],
            ['nama_kategori' => 'Iuran Masuk', 'jenis' => 'masuk', 'deskripsi' => 'Iuran pendaftaran anggota baru'],
            ['nama_kategori' => 'Donasi', 'jenis' => 'masuk', 'deskripsi' => 'Donasi dari masyarakat/pihak lain'],
            ['nama_kategori' => 'Sponsor', 'jenis' => 'masuk', 'deskripsi' => 'Bantuan dari sponsor kegiatan'],
            ['nama_kategori' => 'Hasil Kegiatan', 'jenis' => 'masuk', 'deskripsi' => 'Pendapatan dari pelaksanaan kegiatan'],
            ['nama_kategori' => 'Lainnya', 'jenis' => 'masuk', 'deskripsi' => 'Pemasukan lainnya'],
        ];

        // Kategori Kas Keluar
        $kategoriKeluar = [
            ['nama_kategori' => 'Alat Tulis Kantor (ATK)', 'jenis' => 'keluar', 'deskripsi' => 'Pembelian perlengkapan kantor'],
            ['nama_kategori' => 'Konsumsi', 'jenis' => 'keluar', 'deskripsi' => 'Biaya makanan dan minuman kegiatan'],
            ['nama_kategori' => 'Transportasi', 'jenis' => 'keluar', 'deskripsi' => 'Biaya transportasi kegiatan'],
            ['nama_kategori' => 'Publikasi', 'jenis' => 'keluar', 'deskripsi' => 'Biaya cetak, desain, dan publikasi'],
            ['nama_kategori' => 'Honor', 'jenis' => 'keluar', 'deskripsi' => 'Pembayaran honor nara sumber/pemateri'],
            ['nama_kategori' => 'Event Organizer', 'jenis' => 'keluar', 'deskripsi' => 'Biaya sewa tenda, sound system, dll'],
            ['nama_kategori' => 'Operasional', 'jenis' => 'keluar', 'deskripsi' => 'Biaya operasional organisasi'],
            ['nama_kategori' => 'Lainnya', 'jenis' => 'keluar', 'deskripsi' => 'Pengeluaran lainnya'],
        ];

        foreach ($kategoriMasuk as $kategori) {
            KategoriTransaksi::create($kategori);
        }

        foreach ($kategoriKeluar as $kategori) {
            KategoriTransaksi::create($kategori);
        }
    }
}
