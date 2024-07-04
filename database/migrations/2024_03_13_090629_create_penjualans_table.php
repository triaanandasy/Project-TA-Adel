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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan')->constrained('pelanggans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('alamat');
            $table->String('metode_pembayaran');
            $table->enum('status_penjualan',['dipesan','disiapkan','dikirim','diterima']);
            $table->enum('status_pembayaran',['sedang diperiksa','lunas']);
            $table->string('jumlah_bayar');
            $table->string('bukti_bayar');
            $table->string('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
