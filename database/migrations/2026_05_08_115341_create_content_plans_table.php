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
        Schema::create('content_plans', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal_upload');
        $table->time('time_upload');
        $table->enum('jenis_konten', [
            'Carausel',
            'Single',
        ])->default('Single');
        $table->string('judul_konten');
        $table->string('brief');
        $table->string('link_draft');
        $table->text('caption')->nullable();
        $table->string('feedback');
        $table->enum('status', [
            'Draft',
            'Review',
            'Approved',
            'Published'
        ])->default('Draft');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_plans');
    }
};
