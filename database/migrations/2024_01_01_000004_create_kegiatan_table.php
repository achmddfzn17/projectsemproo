<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->enum('jenis_kegiatan', ['sosial', 'olahraga', 'pendidikan', 'keagamaan', 'lingkungan', 'lainnya']);
            $table->text('deskripsi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->string('lokasi');
            $table->string('penanggung_jawab');
            $table->integer('jumlah_peserta')->default(0);
            $table->string('foto')->nullable();
            $table->enum('status', ['rencana', 'berlangsung', 'selesai'])->default('rencana');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
