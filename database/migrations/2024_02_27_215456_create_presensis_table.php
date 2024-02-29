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
            $table->foreignId('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreignId('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreignId('mapel_id')->references('id')->on('mapels')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->enum('presensi', ['Hadir', 'Izin', 'Sakit', 'Alpha']);

            // kunci unik untuk mencegah duplikasi data
            $table->unique(['kelas_id', 'siswa_id', 'mapel_id', 'user_id', 'created_at']);
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
