<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
// Migrasi articles
public function up(): void
{
    Schema::create('articles', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('slug')->unique(); // Hapus 'after'
        $table->string('thumbnail');
        $table->text('konten');
        $table->datetime('tanggal_publikasi');
        $table->enum('category', ['news', 'tips']); // Langsung gunakan enum di sini
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};