<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\PembayaranSantri;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // 1. Tampilkan Halaman Cek Status
    public function index()
    {
        return view('pembayaran.cek');
    }

    // 2. Cek Status Kelulusan
    public function checkStatus(Request $request)
    {
        $request->validate(['identifier' => 'required|string']);

        // Cari data santri berdasarkan Email ATAU No HP
        $santri = Santri::where('email', $request->identifier)
            ->orWhere('no_hp_wali', $request->identifier)
            ->first();

        if (!$santri) {
            return back()->with('error', 'Data tidak ditemukan. Pastikan No. WA / Email sesuai saat mendaftar.');
        }

        // Logika Status
        if ($santri->status == 'pending') {
            return back()->with('warning', 'Data pendaftaran Ananda <strong>' . $santri->nama_lengkap . '</strong> masih dalam proses seleksi/verifikasi admin. Mohon ditunggu.');
        }

        if ($santri->status == 'ditolak') {
            return back()->with('error', 'Mohon maaf, Ananda belum lolos seleksi penerimaan santri baru tahun ini.');
        }

        // Jika status == 'diterima', tampilkan form upload
        // Jika sudah 'aktif' (sudah lunas), form akan menampilkan status lunas (diatur di view)
        return view('pembayaran.form', compact('santri'));
    }

    // 3. Simpan Bukti Pembayaran
    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'nominal' => 'required|numeric',
            'nama_pengirim' => 'required|string',
            'bank_asal' => 'nullable|string',
            'tanggal_transfer' => 'required|date',
            'bukti_transfer' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('bukti_transfer')->store('bukti-pembayaran', 'public');

        // Gunakan updateOrCreate agar jika ditolak bisa upload ulang di record yang sama/baru
        PembayaranSantri::updateOrCreate(
            ['santri_id' => $request->santri_id],
            [
                'nominal' => $request->nominal,
                'nama_pengirim' => $request->nama_pengirim,
                'bank_asal' => $request->bank_asal,
                'tanggal_transfer' => $request->tanggal_transfer,
                'bukti_transfer' => $path,
                'status' => 'pending', // Reset jadi pending agar admin cek ulang
                'catatan_admin' => null // Hapus catatan penolakan sebelumnya
            ]
        );

        return redirect()->route('pembayaran.cek')->with('success', 'Alhamdulillah! Bukti pembayaran berhasil dikirim. Admin akan segera melakukan verifikasi.');
    }
}
