<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    // === FRONTEND ===

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

    // === BACKEND (ADMIN) ===

    public function index()
    {
        $pendaftar = Santri::latest()->paginate(10);
        return view('admin.santri.index', compact('pendaftar'));
    }

    public function show(Santri $santri)
    {
        return view('admin.santri.show', compact('santri'));
    }

    public function updateStatus(Request $request, Santri $santri)
    {
        $santri->update(['status' => $request->status]);
        return back()->with('success', 'Status pendaftar diperbarui.');
    }
}
