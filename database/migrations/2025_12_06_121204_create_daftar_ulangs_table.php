<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('daftar_ulangs', function (Blueprint $table) {
            $table->id();

            // A. Data Diri Santri
            $table->string('nama_lengkap');
            $table->string('nis')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('nama_wali');
            $table->string('no_hp_wali');
            $table->text('alamat');

            // B. Data Akademik
            $table->string('program_sebelumnya'); // Tahfidz/Tahsin
            $table->string('kelas_sebelumnya');   // 1 Ula
            $table->string('naik_ke_kelas');      // 2 Ula
            $table->string('tahun_ajaran');       // 2025/2026

            // C. File
            $table->string('foto_diri'); // Path foto santri

            $table->string('status')->default('pending'); // pending, verified
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daftar_ulangs');
    }
};
