@extends('layouts.admin')

@section('title', 'Data Daftar Ulang (Santri Lama)')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <div>
                <h2 class="text-lg font-bold text-slate-800">Verifikasi Kenaikan Kelas</h2>
                <p class="text-sm text-slate-500">Data registrasi ulang santri lama.</p>
            </div>
            <div class="flex gap-2">
                {{-- TOMBOL EXPORT EXCEL (SUDAH DIPERBAIKI) --}}
                <a href="{{ route('admin.daftar-ulang.export') }}"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-bold transition shadow-sm flex items-center">
                    <i class="fa-solid fa-file-excel mr-2"></i> Export Excel
                </a>

                <span
                    class="bg-indigo-100 text-indigo-800 text-xs font-bold px-3 py-2 rounded-full border border-indigo-200 flex items-center">
                    Total: {{ $data->total() }}
                </span>
            </div>
        </div>

        {{-- Tabel Data Tetap Sama --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 text-slate-500 border-b uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-4 py-4 min-w-[150px]">Nama Santri</th>
                        <th class="px-4 py-4">NIS</th>
                        <th class="px-4 py-4">L/P</th>
                        <th class="px-4 py-4 bg-slate-100/50">Program</th>
                        <th class="px-4 py-4 bg-slate-100/50">Thn. Ajaran</th>
                        <th class="px-4 py-4 bg-slate-100/50">Kls. Lama</th>
                        <th class="px-4 py-4 bg-slate-100/50">Naik Ke</th>
                        <th class="px-4 py-4">Wali</th>
                        <th class="px-4 py-4 text-center">Status</th>
                        <th class="px-4 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($data as $item)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-4 py-4 font-bold text-slate-800">{{ $item->nama_lengkap }}</td>
                            <td class="px-4 py-4 text-slate-500 font-mono text-xs">{{ $item->nis ?? '-' }}</td>
                            <td class="px-4 py-4 text-center">
                                @if($item->jenis_kelamin == 'L')
                                    <span class="bg-blue-100 text-blue-700 text-[10px] px-2 py-0.5 rounded font-bold">L</span>
                                @else
                                    <span class="bg-pink-100 text-pink-700 text-[10px] px-2 py-0.5 rounded font-bold">P</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 bg-slate-50/50 text-slate-600">{{ $item->program_sebelumnya }}</td>
                            <td class="px-4 py-4 bg-slate-50/50 text-slate-600 whitespace-nowrap">{{ $item->tahun_ajaran }}</td>
                            <td class="px-4 py-4 bg-slate-50/50 text-slate-500">{{ $item->kelas_sebelumnya }}</td>
                            <td class="px-4 py-4 bg-slate-50/50 font-bold text-indigo-600">{{ $item->naik_ke_kelas }}</td>
                            <td class="px-4 py-4">
                                <div class="text-xs text-slate-700 font-medium">{{ $item->nama_wali }}</div>
                                <div class="text-[10px] text-slate-400">{{ $item->no_hp_wali }}</div>
                            </td>
                            <td class="px-4 py-4 text-center">
                                @if($item->status == 'pending')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full font-bold">Pending</span>
                                @elseif($item->status == 'verified')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-bold">Verified</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full font-bold">Rejected</span>
                                @endif
                            </td>
                            <td class="px-4 py-4 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('admin.daftar-ulang.show', $item->id) }}"
                                        class="p-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-600 hover:text-white transition"
                                        title="Lihat Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    @if($item->status == 'pending')
                                        <form action="{{ route('admin.daftar-ulang.verify', $item->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button
                                                class="p-1.5 bg-green-50 text-green-600 rounded hover:bg-green-600 hover:text-white transition"
                                                title="Verifikasi" onclick="return confirm('Verifikasi?')">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="px-6 py-12 text-center text-slate-400 italic">Belum ada data daftar ulang.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($data->hasPages())
            <div class="p-4 border-t border-slate-100 bg-slate-50">
                {{ $data->links() }}
            </div>
        @endif
    </div>
@endsection