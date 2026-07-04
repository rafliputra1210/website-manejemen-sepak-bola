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
    Schema::create('athletes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // Relasi ke akun Wali Murid
        $table->string('nama');
        $table->string('nomor_punggung', 10)->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->string('posisi_bermain', 50)->nullable(); // Penyerang, Gelandang, Bek, Kiper
        $table->text('alamat')->nullable();
        $table->string('nomor_wa', 20)->nullable();
        $table->string('nomor_wa_ortu', 20)->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athletes');
    }
};
