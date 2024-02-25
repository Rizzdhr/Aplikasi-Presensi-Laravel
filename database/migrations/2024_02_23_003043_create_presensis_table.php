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
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('kelas_id')->references('id')->on('kelas');
            $table->foreignId('siswa_id')->references('id')->on('siswas');
            $table->foreignId('mapel_id')->references('id')->on('mapels');
            $table->date('tanggal')->nullable();
            $table->enum('keterangan', ['Hadir', 'Izin', 'Sakit', 'Alpha']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};
