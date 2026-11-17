<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('transactions')->onDelete('cascade');
            $table->foreignId('sparepart_id')->constrained('spareparts')->onDelete('cascade');
            $table->integer('qty');
            $table->decimal('price', 12, 2); // Kolom harga saat transaksi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};