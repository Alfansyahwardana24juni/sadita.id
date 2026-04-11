<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
         Schema::table('products', function (Blueprint $table) {
            $table->text('alt_top')->nullable();
            $table->text('alt_top_en')->nullable();
            $table->text('alt_bottom')->nullable();
            $table->text('alt_bottom_en')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['alt_top', 'alt_list', 'alt_bottom']);
        });
    }
};
