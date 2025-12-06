<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PembayaranSantri;
use Illuminate\Http\Request;

class PembayaranAdminController extends Controller
{
    public function index()
    {
        // Menampilkan list pembayaran, diurutkan: Pending dulu, baru Verified/Rejected
        $pembayaran = PembayaranSantri::with('santri')
            ->orderByRaw("FIELD(status, 'pending', 'verified', 'rejected')")
            ->latest()
            ->paginate(10);

        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    public function verify($id)
    {
        $bayar = PembayaranSantri::findOrFail($id);

        // 1. Update status pembayaran jadi Verified
        $bayar->update(['status' => 'verified']);

        // 2. Update status santri jadi 'aktif' (Resmi jadi santri)
        // Pastikan relasi santri ada
        if ($bayar->santri) {
            $bayar->santri->update(['status' => 'aktif']);
        }

        return back()->with('success', 'Pembayaran diverifikasi. Status santri kini AKTIF.');
    }

    public function reject(Request $request, $id)
    {
        $bayar = PembayaranSantri::findOrFail($id);

        // Update jadi rejected dengan alasan (jika ada input alasan di form)
        $bayar->update([
            'status' => 'rejected',
            'catatan_admin' => $request->alasan ?? 'Bukti tidak valid/kurang jelas. Silakan upload ulang.'
        ]);

        return back()->with('error', 'Pembayaran ditolak. Santri diminta upload ulang.');
    }
}
