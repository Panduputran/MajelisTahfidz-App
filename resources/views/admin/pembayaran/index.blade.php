@extends('layouts.admin')

@section('title', 'Verifikasi Pembayaran')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <div>
                <h2 class="text-lg font-bold text-slate-800">Riwayat Pembayaran</h2>
                <p class="text-sm text-slate-500">Verifikasi bukti transfer administrasi santri baru.</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 text-slate-500 border-b">
                    <tr>
                        <th class="px-6 py-4">Santri</th>
                        <th class="px-6 py-4">Pengirim</th>
                        <th class="px-6 py-4">Nominal</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Bukti</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($pembayaran as $item)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-slate-800">{{ $item->santri->nama_lengkap ?? 'Tanpa Nama' }}</div>
                                <div class="text-xs text-slate-500">{{ $item->santri->program_minat ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-slate-700 font-medium">{{ $item->nama_pengirim }}</div>
                                <div class="text-xs text-slate-400">{{ $item->bank_asal ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 font-mono font-bold text-emerald-600">
                                Rp {{ number_format($item->nominal, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-slate-500">
                                {{ \Carbon\Carbon::parse($item->tanggal_transfer)->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ asset('storage/' . $item->bukti_transfer) }}" target="_blank"
                                    class="inline-flex items-center gap-1 text-blue-600 hover:underline text-xs bg-blue-50 px-2 py-1 rounded border border-blue-100">
                                    <i class="fa-solid fa-image"></i> Lihat
                                </a>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($item->status == 'pending')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs px-2.5 py-1 rounded-full font-bold border border-yellow-200">Pending</span>
                                @elseif($item->status == 'verified')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-bold border border-green-200">Lunas</span>
                                @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs px-2.5 py-1 rounded-full font-bold border border-red-200">Ditolak</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($item->status == 'pending')
                                    <div class="flex justify-center gap-2">
                                        {{-- Tombol Terima --}}
                                        <form action="{{ route('admin.pembayaran.verify', $item->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button type="submit"
                                                class="w-8 h-8 rounded bg-green-100 text-green-600 hover:bg-green-600 hover:text-white transition flex items-center justify-center border border-green-200"
                                                title="Verifikasi Lunas"
                                                onclick="return confirm('Verifikasi pembayaran ini sebagai Lunas?')">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </form>

                                        {{-- Tombol Tolak --}}
                                        <form action="{{ route('admin.pembayaran.reject', $item->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button type="submit"
                                                class="w-8 h-8 rounded bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition flex items-center justify-center border border-red-200"
                                                title="Tolak / Minta Upload Ulang"
                                                onclick="return confirm('Tolak pembayaran ini?')">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-slate-400 text-xs">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-slate-400">Belum ada data pembayaran masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pembayaran->hasPages())
            <div class="p-4 border-t border-slate-100 bg-slate-50">
                {{ $pembayaran->links() }}
            </div>
        @endif
    </div>
@endsection