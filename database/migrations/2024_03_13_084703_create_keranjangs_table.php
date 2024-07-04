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
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id(); $table->foreignId('id_pelanggan')->constrained('pelanggans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_produk')->constrained('produks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('harga_jual');
            $table->string('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjangs');
    }
};
