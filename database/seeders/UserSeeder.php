<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin Account (if not exists)
        if (! User::where('email', 'admin@karangtaruna.id')->exists()) {
            User::create([
                'name' => 'Admin Karang Taruna',
                'username' => 'admin',
                'email' => 'admin@karangtaruna.id',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]);
            echo "[OK] Admin account created\n";
        } else {
            echo "[INFO] Admin account already exists\n";
        }

        // Create Anggota Account (if not exists)
        if (! Anggota::where('email', 'budi@karangtaruna.id')->exists()) {
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
            echo "[OK] Anggota 1 (Budi) created\n";
        } else {
            echo "[INFO] Anggota 1 (Budi) already exists\n";
        }

        // Create Additional Anggota Account (if not exists)
        if (! Anggota::where('email', 'siti@karangtaruna.id')->exists()) {
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
            echo "[OK] Anggota 2 (Siti) created\n";
        } else {
            echo "[INFO] Anggota 2 (Siti) already exists\n";
        }

        echo '[OK] Akun berhasil dibuat!'.PHP_EOL;
        echo PHP_EOL.'[INFO] INFORMASI LOGIN:'.PHP_EOL;
        echo '=========================================='.PHP_EOL;
        echo '[ADMIN]'.PHP_EOL;
        echo '   Username : admin'.PHP_EOL;
        echo '   Email    : admin@karangtaruna.id'.PHP_EOL;
        echo '   Password : admin123'.PHP_EOL;
        echo PHP_EOL.'[ANGGOTA 1]'.PHP_EOL;
        echo '   Username : budi'.PHP_EOL;
        echo '   Email    : budi@karangtaruna.id'.PHP_EOL;
        echo '   Password : anggota123'.PHP_EOL;
        echo PHP_EOL.'[ANGGOTA 2]'.PHP_EOL;
        echo '   Username : siti'.PHP_EOL;
        echo '   Email    : siti@karangtaruna.id'.PHP_EOL;
        echo '   Password : anggota123'.PHP_EOL;
        echo '=========================================='.PHP_EOL;
    }
}
