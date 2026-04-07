<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop absensi table
        Schema::dropIfExists('absensi');
        
        // Drop qr_token column from kegiatan table
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->dropColumn('qr_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recreate absensi table
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained('kegiatan')->onDelete('cascade');
            $table->foreignId('anggota_id')->constrained('anggota')->onDelete('cascade');
            $table->timestamp('waktu_absen');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('status')->default('hadir');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
        
        // Add back qr_token column
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->string('qr_token', 32)->nullable()->unique();
        });
    }
};
