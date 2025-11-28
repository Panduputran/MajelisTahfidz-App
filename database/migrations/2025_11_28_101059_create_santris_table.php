<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('asal_sekolah');
            $table->string('nama_wali');
            $table->string('no_hp_wali'); // WhatsApp
            $table->string('email')->nullable(); // Opsional untuk notifikasi
            $table->text('alamat');
            $table->string('program_minat')->nullable(); // Tahfidz/Tahsin
            $table->string('status')->default('pending'); // pending, verified, accepted
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('santris');
    }
};