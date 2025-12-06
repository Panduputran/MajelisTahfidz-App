<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use Illuminate\Http\Request;

class DaftarUlangController extends Controller
{
    // Tampilkan Form
    public function create()
    {
        return view('daftar-ulang.form');
    }

    // Simpan Data
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'nis' => 'nullable|string',
            'jenis_kelamin' => 'required|in:L,P',
            'nama_wali' => 'required|string',
            'no_hp_wali' => 'required|numeric',
            'alamat' => 'required|string',

            'program_sebelumnya' => 'required|string',
            'kelas_sebelumnya' => 'required|string',
            'naik_ke_kelas' => 'required|string',
            'tahun_ajaran' => 'required|string',

            'foto_diri' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        // Simpan Foto
        $path = $request->file('foto_diri')->store('foto-santri', 'public');

        DaftarUlang::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nis' => $request->nis,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama_wali' => $request->nama_wali,
            'no_hp_wali' => $request->no_hp_wali,
            'alamat' => $request->alamat,
            'program_sebelumnya' => $request->program_sebelumnya,
            'kelas_sebelumnya' => $request->kelas_sebelumnya,
            'naik_ke_kelas' => $request->naik_ke_kelas,
            'tahun_ajaran' => $request->tahun_ajaran,
            'foto_diri' => $path,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Data daftar ulang berhasil dikirim. Admin akan memverifikasi data Anda.');
    }
}
