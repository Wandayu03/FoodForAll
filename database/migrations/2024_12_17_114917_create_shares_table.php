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
        Schema::create('shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('history_id')->nullable()->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->string('event_name');
            $table->string('food_type');
            $table->integer('estimated_people');
            $table->decimal('amount', 10, 2);
            $table->date('distribution_date');
            $table->string('distribution_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shares');
    }
};
