@extends('layouts.admin')

@section('title', 'Data Pendaftar Santri')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

        {{-- Toolbar --}}
        <div
            class="p-6 border-b border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4 bg-slate-50/50">
            <div class="w-full md:w-1/3 relative">
                <input type="text" placeholder="Cari nama santri..."
                    class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                <i class="fa-solid fa-search absolute left-3 top-2.5 text-slate-400 text-sm"></i>
            </div>

            <div class="flex gap-2">
                {{-- TOMBOL EXPORT BARU --}}
                <a href="{{ route('admin.santri.export') }}"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-sm flex items-center">
                    <i class="fa-solid fa-file-excel mr-2"></i> Export Excel
                </a>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-slate-500 uppercase bg-slate-100 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Nama Santri</th>
                        <th class="px-6 py-4 font-semibold">Program</th>
                        <th class="px-6 py-4 font-semibold">Wali & Kontak</th>
                        <th class="px-6 py-4 font-semibold">Sekolah</th>
                        <th class="px-6 py-4 font-semibold text-center">Status</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($pendaftar as $santri)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-800">{{ $santri->nama_lengkap }}</div>
                                <div class="text-xs text-slate-500">
                                    {{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }} •
                                    {{ \Carbon\Carbon::parse($santri->created_at)->format('d M Y') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $santri->program_minat }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-slate-700 font-medium">{{ $santri->nama_wali }}</div>
                                <a href="https://wa.me/62{{ $santri->no_hp_wali }}" target="_blank"
                                    class="text-emerald-600 hover:text-emerald-700 text-xs flex items-center gap-1 mt-1 font-medium">
                                    <i class="fa-brands fa-whatsapp"></i> {{ $santri->no_hp_wali }}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-slate-600">{{ $santri->asal_sekolah }}</td>
                            <td class="px-6 py-4 text-center">
                                @if($santri->status == 'pending')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">Pending</span>
                                @elseif($santri->status == 'diterima')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">Diterima</span>
                                @elseif($santri->status == 'aktif')
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">Aktif</span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">Ditolak</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Tombol Show Baru --}}
                                    <a href="{{ route('admin.santri.show', $santri->id) }}"
                                        class="p-2 bg-white border border-slate-200 rounded-lg text-slate-600 hover:text-blue-600 hover:border-blue-300 transition shadow-sm"
                                        title="Lihat Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    @if($santri->status == 'pending')
                                        <form action="{{ route('admin.santri.update-status', $santri->id) }}" method="POST"
                                            class="inline">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="status" value="diterima">
                                            <button type="submit"
                                                class="p-2 bg-white border border-slate-200 rounded-lg text-slate-600 hover:text-green-600 hover:border-green-300 transition shadow-sm"
                                                title="Terima Santri" onclick="return confirm('Terima santri ini?')">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-400">
                                    <i class="fa-regular fa-folder-open text-4xl mb-3 opacity-50"></i>
                                    <p class="text-sm">Belum ada data pendaftar baru.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pendaftar->hasPages())
            <div class="px-6 py-4 border-t border-slate-100 bg-slate-50">
                {{ $pendaftar->links() }}
            </div>
        @endif
    </div>
@endsection