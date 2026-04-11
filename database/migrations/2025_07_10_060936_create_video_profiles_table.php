<?php

// database/migrations/xxxx_xx_xx_create_video_profiles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('video_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('video_id')->nullable(); // Youtube Indonesia
            $table->string('video_en')->nullable(); // Youtube English
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('video_profiles');
    }
};
