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
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->foreignId('athlete_id')->constrained('athletes')->cascadeOnDelete();
        $table->string('periode', 50); // Misal: "Semester 1 - 2026", "Bulan Juli 2026"
        $table->json('daftar_nilai')->nullable(); // Menyimpan array nilai taktik, fisik, mental
        $table->text('progres_skill')->nullable();
        $table->text('prestasi')->nullable();
        $table->text('catatan_pelatih')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
