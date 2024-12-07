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
        Schema::create('tracking_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('historys_id')->constrained(); // Relasi dengan history
            $table->string('status');
            $table->text('description')->nullable(); // Deskripsi pembaruan status
            $table->string('photo_url')->nullable();  // Foto yang diupload admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracking_update');
    }
};
