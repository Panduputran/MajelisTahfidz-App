@extends('layouts.admin')

@section('title', 'Detail Pendaftar')

@section('content')
    <div class="max-w-4xl mx-auto">

        <a href="{{ route('admin.santri.index') }}"
            class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 mb-6 transition">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
        </a>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            {{-- Header --}}
            <div class="bg-slate-50 px-8 py-6 border-b border-slate-200 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">{{ $santri->nama_lengkap }}</h1>
                    <p class="text-slate-500 text-sm mt-1">
                        Mendaftar pada: {{ $santri->created_at->format('d F Y, H:i') }}
                    </p>
                </div>
                <div>
                    @if($santri->status == 'pending')
                        <span
                            class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-800 font-bold border border-yellow-200 text-sm">Pending</span>
                    @elseif($santri->status == 'diterima')
                        <span
                            class="px-4 py-2 rounded-full bg-green-100 text-green-800 font-bold border border-green-200 text-sm">Diterima</span>
                    @elseif($santri->status == 'aktif')
                        <span
                            class="px-4 py-2 rounded-full bg-blue-100 text-blue-800 font-bold border border-blue-200 text-sm">Aktif</span>
                    @else
                        <span
                            class="px-4 py-2 rounded-full bg-red-100 text-red-800 font-bold border border-red-200 text-sm">Ditolak</span>
                    @endif
                </div>
            </div>

            {{-- Body Content --}}
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- Data Santri --}}
                <div>
                    <h3
                        class="text-sm font-bold text-indigo-600 uppercase tracking-wider mb-4 border-b border-indigo-100 pb-2">
                        Data Pribadi
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-xs text-slate-400">Jenis Kelamin</p>
                            <p class="text-slate-800 font-medium">
                                {{ $santri->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Program Minat</p>
                            <p class="text-slate-800 font-medium">{{ $santri->program_minat }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Asal Sekolah</p>
                            <p class="text-slate-800 font-medium">{{ $santri->asal_sekolah }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Email Santri</p>
                            <p class="text-slate-800 font-medium">{{ $santri->email ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Data Wali --}}
                <div>
                    <h3
                        class="text-sm font-bold text-indigo-600 uppercase tracking-wider mb-4 border-b border-indigo-100 pb-2">
                        Data Wali & Alamat
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-xs text-slate-400">Nama Orang Tua/Wali</p>
                            <p class="text-slate-800 font-medium">{{ $santri->nama_wali }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Nomor WhatsApp</p>
                            <a href="https://wa.me/62{{ $santri->no_hp_wali }}" target="_blank"
                                class="text-emerald-600 font-medium hover:underline flex items-center gap-2">
                                <i class="fa-brands fa-whatsapp"></i> {{ $santri->no_hp_wali }}
                            </a>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Alamat Domisili</p>
                            <p class="text-slate-800 font-medium leading-relaxed">{{ $santri->alamat }}</p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Footer Actions --}}
            @if($santri->status == 'pending')
                <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 flex gap-3">
                    <form action="{{ route('admin.santri.update-status', $santri->id) }}" method="POST" class="w-full">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="diterima">
                        <button type="submit"
                            class="w-full py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl font-bold transition shadow-sm"
                            onclick="return confirm('Terima calon santri ini?')">
                            <i class="fa-solid fa-check mr-2"></i> Terima Santri
                        </button>
                    </form>

                    <form action="{{ route('admin.santri.update-status', $santri->id) }}" method="POST" class="w-full">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="ditolak">
                        <button type="submit"
                            class="w-full py-3 bg-white border border-red-200 text-red-600 hover:bg-red-50 rounded-xl font-bold transition"
                            onclick="return confirm('Tolak calon santri ini?')">
                            <i class="fa-solid fa-xmark mr-2"></i> Tolak
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection