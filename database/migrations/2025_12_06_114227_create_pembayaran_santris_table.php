<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id')->constrained('santris')->onDelete('cascade');
            $table->string('bukti_transfer'); // Path gambar
            $table->decimal('nominal', 12, 2);
            $table->string('nama_pengirim');
            $table->string('bank_asal')->nullable();
            $table->date('tanggal_transfer');
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->text('catatan_admin')->nullable(); // Jika ditolak, alasannya apa
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran_santris');
    }
};
