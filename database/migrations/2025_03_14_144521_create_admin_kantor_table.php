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
        Schema::create('admin_kantor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_admin');
            $table->string('hari_kerja');
            $table->string('lokasi_admin');
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
        Schema::dropIfExists('admin_kantor');
    }
};