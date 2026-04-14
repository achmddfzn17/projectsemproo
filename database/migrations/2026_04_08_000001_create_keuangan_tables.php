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
        Schema::create('kategori_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->enum('jenis', ['masuk', 'keluar']);
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });

        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->enum('jenis', ['masuk', 'keluar']);
            $table->foreignId('kategori_id')->constrained('kategori_transaksi')->onDelete('cascade');
            $table->string('keterangan');
            $table->decimal('jumlah', 15, 2);
            $table->string('bukti_transaksi')->nullable();
            $table->string('penerima')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('kategori_transaksi');
    }
};
