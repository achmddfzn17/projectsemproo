<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Anggota;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin Account (if not exists)
        if (!User::where('email', 'admin@karangtaruna.id')->exists()) {
            User::create([
                'name' => 'Admin Karang Taruna',
                'username' => 'admin',
                'email' => 'admin@karangtaruna.id',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]);
            echo "✅ Admin account created\n";
        } else {
            echo "ℹ️  Admin account already exists\n";
        }

        // Create Anggota Account (if not exists)
        if (!Anggota::where('email', 'budi@karangtaruna.id')->exists()) {
            Anggota::create([
                'nama' => 'Budi Santoso',
                'nik' => '3201012345678901',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-05-15',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Merdeka No. 123, Jakarta Pusat',
                'no_hp' => '081234567890',
                'username' => 'budi',
                'email' => 'budi@karangtaruna.id',
                'password' => Hash::make('anggota123'),
                'pendidikan_terakhir' => 'S1',
                'pekerjaan' => 'Mahasiswa',
                'status' => 'aktif',
            ]);
            echo "✅ Anggota 1 (Budi) created\n";
        } else {
            echo "ℹ️  Anggota 1 (Budi) already exists\n";
        }

        // Create Additional Anggota Account (if not exists)
        if (!Anggota::where('email', 'siti@karangtaruna.id')->exists()) {
            Anggota::create([
                'nama' => 'Siti Nurhaliza',
                'nik' => '3201012345678902',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2001-08-20',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Sudirman No. 456, Bandung',
                'no_hp' => '082345678901',
                'username' => 'siti',
                'email' => 'siti@karangtaruna.id',
                'password' => Hash::make('anggota123'),
                'pendidikan_terakhir' => 'SMA',
                'pekerjaan' => 'Karyawan Swasta',
                'status' => 'aktif',
            ]);
            echo "✅ Anggota 2 (Siti) created\n";
        } else {
            echo "ℹ️  Anggota 2 (Siti) already exists\n";
        }

        echo "✅ Akun berhasil dibuat!\n";
        echo "\n📋 INFORMASI LOGIN:\n";
        echo "==========================================\n";
        echo "🔐 ADMIN:\n";
        echo "   Username : admin\n";
        echo "   Email    : admin@karangtaruna.id\n";
        echo "   Password : admin123\n";
        echo "\n👤 ANGGOTA 1:\n";
        echo "   Username : budi\n";
        echo "   Email    : budi@karangtaruna.id\n";
        echo "   Password : anggota123\n";
        echo "\n👤 ANGGOTA 2:\n";
        echo "   Username : siti\n";
        echo "   Email    : siti@karangtaruna.id\n";
        echo "   Password : anggota123\n";
        echo "==========================================\n\n";
    }
}
