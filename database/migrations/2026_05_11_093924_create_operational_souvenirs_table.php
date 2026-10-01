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
        Schema::create('operational_souvenirs', function (Blueprint $table) {

            $table->id();

            // tanggal operasional
            $table->date('tanggal');

            // relasi employee
            $table->foreignId('employee_id')
                ->constrained('employees')
                ->onDelete('cascade');

            // keperluan
            $table->text('keperluan');

            // relasi souvenir
            $table->foreignId('souvenir_id')
                ->constrained('list_souvenirs')
                ->onDelete('cascade');

            // jumlah keluar
            $table->integer('jumlah');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operational_souvenirs');
    }
};
