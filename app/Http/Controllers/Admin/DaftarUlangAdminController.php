<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarUlang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaftarUlangAdminController extends Controller
{
    public function index()
    {
        $data = DaftarUlang::orderByRaw("FIELD(status, 'pending', 'verified', 'rejected')")
            ->latest()
            ->paginate(10);

        return view('admin.daftar-ulang.index', compact('data'));
    }

    // === EXPORT EXCEL TANPA LIBRARY (FORMAT HTML TABLE) ===
    public function export()
    {
        $data = DaftarUlang::latest()->get();
        $fileName = 'Data_Daftar_Ulang_' . date('d-m-Y') . '.xls';

        // Header agar dibaca sebagai Excel
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        // Panggil View khusus Export
        return view('admin.daftar-ulang.export', compact('data'));
    }

    // ... method show, verify, reject, destroy biarkan tetap ada ...
    public function show($id)
    {
        $item = DaftarUlang::findOrFail($id);
        return view('admin.daftar-ulang.show', compact('item'));
    }

    public function verify($id)
    {
        $item = DaftarUlang::findOrFail($id);
        $item->update(['status' => 'verified']);
        return back()->with('success', 'Data berhasil diverifikasi.');
    }

    public function reject($id)
    {
        $item = DaftarUlang::findOrFail($id);
        $item->update(['status' => 'rejected']);
        return back()->with('error', 'Data ditolak.');
    }

    public function destroy($id)
    {
        $item = DaftarUlang::findOrFail($id);
        if ($item->foto_diri && Storage::disk('public')->exists($item->foto_diri)) {
            Storage::disk('public')->delete($item->foto_diri);
        }
        $item->delete();
        return redirect()->route('admin.daftar-ulang.index')->with('success', 'Data dihapus.');
    }
}
