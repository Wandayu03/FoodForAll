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
        Schema::create('historys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payments_id')->constrained()->onDelete('cascade'); // Relasi dengan payments
            $table->enum('status', ['in-progress', 'completed', 'failed']);
            $table->text('description')->nullable(); // Deskripsi status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
