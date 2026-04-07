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
        Schema::table('anggota', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->unique()->after('id');
            $table->integer('points')->default(0)->after('status');
        });

        // Set UUID for existing records
        $anggotas = \Illuminate\Support\Facades\DB::table('anggota')->whereNull('uuid')->get();
        foreach ($anggotas as $anggota) {
            \Illuminate\Support\Facades\DB::table('anggota')
                ->where('id', $anggota->id)
                ->update(['uuid' => \Illuminate\Support\Str::uuid()]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->dropColumn(['uuid', 'points']);
        });
    }
};
