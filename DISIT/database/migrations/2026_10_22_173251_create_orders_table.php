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
        // PERBAIKAN: Menggunakan Schema::create agar dikenali sebagai tabel database MySQL
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_pembeli');
            $table->string('produk');
            $table->string('total_bayar');
            $table->string('bukti_transfer');
            $table->string('status_pesanan')->default('MENUNGGU_VALIDASI');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
