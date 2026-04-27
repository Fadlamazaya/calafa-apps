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
        Schema::create('katalog', function (Blueprint $table) {
            $table->increments('katalog_id');
            $table->string('nama_katalog', 100);
            $table->text('deskripsi', 200);
            $table->integer('harga')->nullable();
            $table->enum('ketersediaan', ['Tersedia', 'Habis', 'Pre-order'])->nullable();
            $table->string('kategori', 100);
            $table->date('tgl_rilis')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog');
    }
};
