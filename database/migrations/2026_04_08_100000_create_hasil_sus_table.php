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
        Schema::create('hasil_sus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->integer('usia');
            $table->string('pendidikan');
            $table->string('pengalaman_komputer');

            // 10 pertanyaan SUS
            $table->integer('q1'); // Saya ingin menggunakan sistem ini sering
            $table->integer('q2'); // Saya merasa sistem ini sulit digunakan
            $table->integer('q3'); // Saya merasa sistem ini mudah digunakan
            $table->integer('q4'); // Saya membutuhkan bantuan orang lain
            $table->integer('q5'); // Saya merasa fitur-fitur berjalan dengan baik
            $table->integer('q6'); // Saya merasa ada yang tidak konsisten
            $table->integer('q7'); // Orang lain akan memahami dengan cepat
            $table->integer('q8'); // Saya merasa sistem ini membingungkan
            $table->integer('q9'); // Saya merasa percaya diri
            $table->integer('q10'); // Saya perlu belajar banyak

            // Skor
            $table->float('total_score');
            $table->float('sus_score');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_sus');
    }
};
