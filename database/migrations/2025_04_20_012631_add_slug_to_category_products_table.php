<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('category_products', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('name_category');
        });
    }
    
    public function down(): void
    {
        Schema::table('category_products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
    
};