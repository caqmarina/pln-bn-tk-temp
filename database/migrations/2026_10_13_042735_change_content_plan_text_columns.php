
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('content_plans', function (Blueprint $table) {
            $table->text('judul_konten')->change();
            $table->longText('brief')->change();
            $table->longText('caption')->nullable()->change();
            $table->longText('feedback')->change();
        });
    }

    public function down(): void
    {
        Schema::table('content_plans', function (Blueprint $table) {
            $table->string('judul_konten', 255)->change();
            $table->string('brief', 255)->change();
            $table->text('caption')->nullable()->change();
            $table->string('feedback', 255)->change();
        });
    }
};
