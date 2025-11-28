<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $table = 'santris';

    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'asal_sekolah',
        'nama_wali',
        'no_hp_wali',
        'email',
        'alamat',
        'program_minat',
        'status',
    ];

    // Helper untuk format tanggal
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
