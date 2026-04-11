<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // CATEGORY_PRODUCTS
        Schema::table('category_products', function (Blueprint $table) {
            $table->string('name_category_en')->nullable()->after('name_category');
        });

        // DETAIL_CATEGORIES
        Schema::table('detail_categories', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->text('description_en')->nullable()->after('description');
        });

        // PRODUCTS
        Schema::table('products', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->string('image_top_en')->nullable()->after('image_top');
            $table->string('image_bottom_en')->nullable()->after('image_bottom');
        });
    }

    public function down(): void
    {
        Schema::table('category_products', function (Blueprint $table) {
            $table->dropColumn('name_category_en');
        });

        Schema::table('detail_categories', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'description_en']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'image_top_en', 'image_bottom_en']);
        });
    }
};