<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->integer('kuota_peserta')->nullable()->after('jumlah_peserta');
            $table->boolean('is_pendaftaran_open')->default(true)->after('status');
            $table->text('qr_token')->nullable()->after('is_pendaftaran_open');
        });

        Schema::table('pendaftaran_kegiatan', function (Blueprint $table) {
            $table->text('qr_token')->nullable()->after('waktu_hadir');
            $table->integer('nomor_urut')->nullable()->after('qr_token');
            $table->text('catatan_admin')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->dropColumn(['kuota_peserta', 'is_pendaftaran_open', 'qr_token']);
        });

        Schema::table('pendaftaran_kegiatan', function (Blueprint $table) {
            $table->dropColumn(['qr_token', 'nomor_urut', 'catatan_admin']);
        });
    }
};
