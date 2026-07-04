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
    Schema::create('finances', function (Blueprint $table) {
        $table->id();
        $table->date('tanggal');
        $table->enum('jenis', ['pemasukan', 'pengeluaran']);
        $table->string('kategori'); // Uang Kas, Donasi, Beli Alat, Sewa Lapangan
        $table->string('keterangan');
        $table->decimal('nominal', 15, 2);
        $table->decimal('saldo_akhir', 15, 2)->default(0); // Tracking saldo akhir otomatis
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finances');
    }
};
