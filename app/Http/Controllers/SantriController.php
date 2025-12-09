<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    // ... method create dan store untuk frontend tetap ada di atas ...

    public function create()
    {
        return view('pendaftaran');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'asal_sekolah' => 'required|string|max:255',
            'nama_wali' => 'required|string|max:255',
            'no_hp_wali' => 'required|numeric',
            'email' => 'nullable|email',
            'alamat' => 'required|string',
            'program_minat' => 'required|string',
        ]);

        Santri::create($validated);

        return redirect()->route('pendaftaran')->with('success', 'Alhamdulillah, data pendaftaran berhasil dikirim. Kami akan segera menghubungi via WhatsApp.');
    }

    // === BAGIAN ADMIN ===

    public function index()
    {
        $pendaftar = Santri::orderByRaw("FIELD(status, 'pending', 'diterima', 'ditolak', 'aktif')")
            ->latest()
            ->paginate(10);

        return view('admin.santri.index', compact('pendaftar'));
    }

    // === FITUR BARU: EXPORT EXCEL (.xls) ===
    public function export()
    {
        $data = Santri::latest()->get();
        $fileName = 'Data_Pendaftar_Baru_' . date('d-m-Y_H-i') . '.xls';

        return response(view('admin.santri.export', compact('data')))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    // === FITUR BARU: SHOW DETAIL ===
    public function show($id)
    {
        // Menggunakan findOrFail dengan ID
        $santri = Santri::findOrFail($id);
        return view('admin.santri.show', compact('santri'));
    }

    public function updateStatus(Request $request, Santri $santri)
    {
        $santri->update(['status' => $request->status]);
        return back()->with('success', 'Status pendaftar diperbarui.');
    }
}
