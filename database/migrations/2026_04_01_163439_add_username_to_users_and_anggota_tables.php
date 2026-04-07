<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add username to users table
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('name');
        });

        // Add username to anggota table
        Schema::table('anggota', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('nama');
        });

        // Set default usernames for existing records (if any) to avoid nulls
        DB::statement("UPDATE users SET username = SUBSTR(email, 1, INSTR(email, '@') - 1) WHERE username IS NULL");
        DB::statement("UPDATE anggota SET username = SUBSTR(email, 1, INSTR(email, '@') - 1) WHERE username IS NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });

        Schema::table('anggota', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
