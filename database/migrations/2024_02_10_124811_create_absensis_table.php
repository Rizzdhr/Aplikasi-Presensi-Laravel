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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->foreignId('siswa_id')->constrained('siswas');
            $table->enum('status', ['Hadir', 'Izin', 'Sakit', 'Alpha']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_absensis');
    }
};
