<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PembayaranSantri;
use Illuminate\Http\Request;

class PembayaranAdminController extends Controller
{
    public function index()
    {
        $pembayaran = PembayaranSantri::with('santri')
            ->orderByRaw("FIELD(status, 'pending', 'verified', 'rejected')")
            ->latest()
            ->paginate(10);

        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    // === FITUR BARU: EXPORT EXCEL (.xls) ===
    public function export()
    {
        // Ambil semua data dengan relasi santri
        $data = PembayaranSantri::with('santri')->latest()->get();
        $fileName = 'Data_Pembayaran_Santri_Baru_' . date('d-m-Y_H-i') . '.xls';

        // Return View sebagai file Excel
        return response(view('admin.pembayaran.export', compact('data')))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    // === FITUR BARU: SHOW DETAIL ===
    public function show($id)
    {
        $item = PembayaranSantri::with('santri')->findOrFail($id);
        return view('admin.pembayaran.show', compact('item'));
    }

    public function verify($id)
    {
        $bayar = PembayaranSantri::findOrFail($id);
        $bayar->update(['status' => 'verified']);

        if ($bayar->santri) {
            $bayar->santri->update(['status' => 'aktif']);
        }

        return back()->with('success', 'Pembayaran diverifikasi. Status santri kini AKTIF.');
    }

    public function reject(Request $request, $id)
    {
        $bayar = PembayaranSantri::findOrFail($id);

        $bayar->update([
            'status' => 'rejected',
            'catatan_admin' => $request->alasan ?? 'Bukti tidak valid/kurang jelas. Silakan upload ulang.'
        ]);

        return back()->with('error', 'Pembayaran ditolak. Santri diminta upload ulang.');
    }
}
