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
        Schema::table('transaksi', function (Blueprint $table) {
            // Menambahkan kolom untuk menyimpan nilai laba atau rugi.
            // Dibuat nullable karena mungkin tidak semua baris transaksi akan memiliki nilai ini.
            // Menggunakan bigInteger agar bisa menampung nilai negatif (rugi).
            $table->bigInteger('total_laba')->nullable()->after('total');

            // Menambahkan kolom status dengan pilihan 'profit' atau 'loss'.
            $table->enum('status', ['profit', 'loss'])->nullable()->after('total_laba');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Menghapus kolom jika migrasi di-rollback
            $table->dropColumn(['total_laba', 'status']);
        });
    }
};
