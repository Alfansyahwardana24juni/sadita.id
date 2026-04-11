<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       
        Schema::create('detail_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('category_products')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('img')->nullable(); // gambar utama kategori
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_categories');
    }
};