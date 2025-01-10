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
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('share_id')->onDelete('cascade');
            $table->enum('status', ['Donation accepted', 'Order in process', 'Food is ready', 'Food has been distributed', 'Process is completed'])->default('Donation accepted');
            $table->text('description')->nullable(); 
            $table->string('photo_url')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackings');
    }
};
