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
        // membuat tabel data barang
        Schema::create('data_barang', function (Blueprint $table) {
            //menambahkan kolom 'idbarang' sebagai primary key dengan tipe data string
            $table->string('idbarang')->primary();
            $table->string('nama_barang');
            $table->decimal('harga', 15, 2);
            $table->integer('stok');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //menghapus tabel data_barang jika tabel tersebut ada
        Schema::dropIfExists('data_barang');
    }
};
