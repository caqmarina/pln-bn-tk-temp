<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Izinkan sementara nilai lama dan nilai baru
        DB::statement("
            ALTER TABLE content_plans
            MODIFY jenis_konten
            ENUM('Carausel', 'Carousel', 'Single')
            NOT NULL DEFAULT 'Single'
        ");

        // 2. Ubah data lama dari Carausel menjadi Carousel
        DB::table('content_plans')
            ->where('jenis_konten', 'Carausel')
            ->update([
                'jenis_konten' => 'Carousel',
            ]);

        // 3. Hapus Carausel dari enum
        DB::statement("
            ALTER TABLE content_plans
            MODIFY jenis_konten
            ENUM('Carousel', 'Single')
            NOT NULL DEFAULT 'Single'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Izinkan sementara nilai lama dan nilai baru
        DB::statement("
            ALTER TABLE content_plans
            MODIFY jenis_konten
            ENUM('Carausel', 'Carousel', 'Single')
            NOT NULL DEFAULT 'Single'
        ");

        // 2. Kembalikan data Carousel menjadi Carausel
        DB::table('content_plans')
            ->where('jenis_konten', 'Carousel')
            ->update([
                'jenis_konten' => 'Carausel',
            ]);

        // 3. Kembalikan enum ke kondisi sebelumnya
        DB::statement("
            ALTER TABLE content_plans
            MODIFY jenis_konten
            ENUM('Carausel', 'Single')
            NOT NULL DEFAULT 'Single'
        ");
    }
};