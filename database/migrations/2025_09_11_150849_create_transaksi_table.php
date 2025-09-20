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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_transaksi', ['pemasukan', 'pengeluaran']);
            $table->foreignId('id_kategori')->nullable()->constrained('kategori')->onDelete('set null');
            $table->decimal('jumlah', 15, 2)->default(0);
            $table->decimal('total', 15, 2);
            $table->enum('status', ['profit', 'loss'])->nullable();
            $table->string('bukti_transaksi')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
