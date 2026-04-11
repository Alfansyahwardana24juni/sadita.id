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
        Schema::create('dokter_hewan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokter');
            $table->string('pengalaman');
            $table->string('lokasi_praktik');
            $table->string('nomor_telepon');
            $table->string('img')->nullable();
            $table->text('default_message')->nullable(); // For customizable WhatsApp message
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter_hewan');
    }
};