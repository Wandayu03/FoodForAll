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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('donation_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('share_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('transaction_id'); // ID transaksi unik dari Midtrans
            $table->enum('activity_type', ['donation', 'share']);
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });                
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
