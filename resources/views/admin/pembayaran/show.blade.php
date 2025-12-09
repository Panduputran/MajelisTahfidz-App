@extends('layouts.admin')

@section('title', 'Detail Pembayaran')

@section('content')
    <div class="max-w-4xl mx-auto">

        <a href="{{ route('admin.pembayaran.index') }}"
            class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 mb-6 transition">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- KIRI: Bukti & Status --}}
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                    <h3 class="font-bold text-slate-800 mb-4">Bukti Transfer</h3>

                    <div class="relative group rounded-xl overflow-hidden border border-slate-100 bg-slate-50">
                        <a href="{{ asset('storage/' . $item->bukti_transfer) }}" target="_blank">
                            <img src="{{ asset('storage/' . $item->bukti_transfer) }}" alt="Bukti Transfer"
                                class="w-full h-auto object-contain hover:scale-105 transition-transform duration-300">
                            <div
                                class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                <span class="text-white text-sm font-bold bg-black/50 px-3 py-1 rounded-full"><i
                                        class="fa-solid fa-magnifying-glass-plus mr-1"></i> Perbesar</span>
                            </div>
                        </a>
                    </div>

                    <div class="mt-4 flex items-center justify-between p-3 bg-slate-50 rounded-lg">
                        <span class="text-sm text-slate-500">Status Saat Ini:</span>
                        @if($item->status == 'pending')
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-3 py-1 rounded-full font-bold">Pending</span>
                        @elseif($item->status == 'verified')
                            <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-bold">Verified</span>
                        @else
                            <span class="bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full font-bold">Ditolak</span>
                        @endif
                    </div>
                </div>

                @if($item->status == 'pending')
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                        <h3 class="font-bold text-slate-800 mb-4">Aksi Verifikasi</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <form action="{{ route('admin.pembayaran.verify', $item->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit"
                                    class="w-full py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg font-bold text-sm transition shadow-sm"
                                    onclick="return confirm('Verifikasi pembayaran ini? Status santri akan menjadi AKTIF.')">
                                    <i class="fa-solid fa-check mr-1"></i> Terima
                                </button>
                            </form>

                            <form action="{{ route('admin.pembayaran.reject', $item->id) }}" method="POST">
                                @csrf @method('PATCH')
                                <button type="submit"
                                    class="w-full py-2.5 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg font-bold text-sm transition"
                                    onclick="return confirm('Tolak pembayaran ini?')">
                                    <i class="fa-solid fa-xmark mr-1"></i> Tolak
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>

            {{-- KANAN: Detail Data --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 h-fit">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="text-lg font-bold text-slate-800">Rincian Transaksi</h3>
                </div>
                <div class="p-6 space-y-6">

                    {{-- Info Santri --}}
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Data Santri</p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center font-bold">
                                {{ substr($item->santri->nama_lengkap ?? 'X', 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">
                                    {{ $item->santri->nama_lengkap ?? 'Data Terhapus' }}</p>
                                <p class="text-xs text-slate-500">{{ $item->santri->program_minat ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Info Pengirim --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-slate-400 mb-1">Nama Pengirim</p>
                            <p class="text-sm font-medium text-slate-800">{{ $item->nama_pengirim }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 mb-1">Bank Asal</p>
                            <p class="text-sm font-medium text-slate-800">{{ $item->bank_asal ?? '-' }}</p>
                        </div>
                    </div>

                    {{-- Info Nominal --}}
                    <div class="p-4 bg-emerald-50 rounded-xl border border-emerald-100">
                        <p class="text-xs text-emerald-600 mb-1">Total Nominal</p>
                        <p class="text-2xl font-mono font-bold text-emerald-700">Rp
                            {{ number_format($item->nominal, 0, ',', '.') }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-slate-400 mb-1">Tanggal Transfer</p>
                            <p class="text-sm font-medium text-slate-800">
                                {{ \Carbon\Carbon::parse($item->tanggal_transfer)->format('d F Y') }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 mb-1">Tanggal Upload</p>
                            <p class="text-sm font-medium text-slate-800">{{ $item->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    @if($item->catatan_admin)
                        <div class="p-3 bg-red-50 text-red-700 text-xs rounded-lg border border-red-100">
                            <strong>Catatan Penolakan:</strong> {{ $item->catatan_admin }}
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
@endsection