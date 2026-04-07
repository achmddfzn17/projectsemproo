<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            // SQLite doesn't support modifying columns directly
            // So we need to recreate the table
        });
        
        // For SQLite, we'll use raw SQL
        DB::statement('PRAGMA foreign_keys=off;');
        
        // Create new table with nullable columns
        DB::statement('CREATE TABLE kegiatan_new (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            nama_kegiatan VARCHAR NOT NULL,
            jenis_kegiatan VARCHAR NOT NULL,
            deskripsi TEXT NOT NULL,
            tanggal_mulai DATE NOT NULL,
            tanggal_selesai DATE NOT NULL,
            lokasi VARCHAR NOT NULL,
            penanggung_jawab VARCHAR,
            jumlah_peserta INTEGER,
            foto VARCHAR,
            qr_token VARCHAR,
            status VARCHAR NOT NULL,
            created_at DATETIME,
            updated_at DATETIME
        );');
        
        // Copy data
        DB::statement('INSERT INTO kegiatan_new SELECT * FROM kegiatan;');
        
        // Drop old table
        DB::statement('DROP TABLE kegiatan;');
        
        // Rename new table
        DB::statement('ALTER TABLE kegiatan_new RENAME TO kegiatan;');
        
        DB::statement('PRAGMA foreign_keys=on;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Cannot reverse this migration easily in SQLite
    }
};
