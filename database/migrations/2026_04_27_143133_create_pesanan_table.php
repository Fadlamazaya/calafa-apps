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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('pesanan_id');
            $table->string('nama_pelanggan', 100);
            $table->text('pesanan_item', 200);
            $table->integer('harga')->nullable();
            $table->date('tgl_pesan')->nullable();
            $table->enum('pembayaran', ['Transfer', 'Tunai', 'E-Wallet'])->nullable();
            $table->enum('status', ['Belum_bayar', 'Selesai'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
