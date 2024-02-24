<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->uuid('detail_transaksi_id')->primary();
            $table->foreignUuid('detail_transaksi_transaksi_id')->references('transaksi_id')->on('transaksis');
            $table->foreignUuid('detail_transaksi_barang_id')->references('barang_id')->on('barangs');
            $table->string('detail_transaksi_jumlah');
            $table->datetime('detail_transaksi_created_at')->useCurrent(); // Tambahkan nilai default 'now()'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksis');
    }
};
