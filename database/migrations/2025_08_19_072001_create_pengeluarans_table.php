<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->string('pengeluaran');
            $table->string('kategori');
            $table->decimal('jumlah', 15, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
