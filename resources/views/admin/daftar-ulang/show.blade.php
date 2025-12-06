@extends('layouts.admin')

@section('title', 'Detail Daftar Ulang')

@section('content')
    <div class="max-w-5xl mx-auto">

        <!-- Tombol Kembali -->
        <a href="{{ route('admin.daftar-ulang.index') }}"
            class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 mb-6 transition">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- KOLOM KIRI: FOTO & STATUS -->
            <div class="lg:col-span-1 space-y-6">

                <!-- Kartu Foto -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 text-center">
                    <div class="relative inline-block group">
                        @if($item->foto_diri)
                            <img src="{{ asset('storage/' . $item->foto_diri) }}" alt="Foto Santri"
                                class="w-40 h-40 rounded-full object-cover border-4 border-slate-100 shadow-md mx-auto">
                            <a href="{{ asset('storage/' . $item->foto_diri) }}" target="_blank"
                                class="absolute bottom-2 right-2 bg-indigo-600 text-white p-2 rounded-full shadow-lg hover:bg-indigo-700 transition"
                                title="Lihat Full Size">
                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                            </a>
                        @else
                            <div
                                class="w-40 h-40 rounded-full bg-slate-100 flex items-center justify-center mx-auto text-slate-400">
                                <i class="fa-solid fa-user text-5xl"></i>
                            </div>
                        @endif
                    </div>

                    <h2 class="text-xl font-bold text-slate-800 mt-4">{{ $item->nama_lengkap }}</h2>
                    <p class="text-slate-500 text-sm">NIS: {{ $item->nis ?? '-' }}</p>

                    <div class="mt-4">
                        @if($item->status == 'pending')
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span> Pending
                            </span>
                        @elseif($item->status == 'verified')
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-green-100 text-green-800">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> Verified
                            </span>
                        @else
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-red-100 text-red-800">
                                <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span> Ditolak
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Kartu Aksi -->
                @if($item->status == 'pending')
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                        <h3 class="font-bold text-slate-800 mb-4">Aksi Verifikasi</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <form action="{{ route('admin.daftar-ulang.verify', $item->id) }}" method="POST" class="w-full">
                                @csrf @method('PATCH')
                                <button type="submit"
                                    class="w-full py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg font-bold text-sm transition shadow-sm"
                                    onclick="return confirm('Verifikasi data ini?')">
                                    <i class="fa-solid fa-check mr-1"></i> Terima
                                </button>
                            </form>

                            <form action="{{ route('admin.daftar-ulang.reject', $item->id) }}" method="POST" class="w-full">
                                @csrf @method('PATCH')
                                <button type="submit"
                                    class="w-full py-2.5 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg font-bold text-sm transition"
                                    onclick="return confirm('Tolak data ini?')">
                                    <i class="fa-solid fa-xmark mr-1"></i> Tolak
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                <!-- Tombol Hapus (Danger Zone) -->
                <div class="bg-red-50 rounded-2xl border border-red-100 p-6">
                    <h3 class="font-bold text-red-800 mb-2 text-sm">Hapus Data</h3>
                    <p class="text-xs text-red-600 mb-4">Tindakan ini tidak dapat dibatalkan.</p>
                    <form action="{{ route('admin.daftar-ulang.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="w-full py-2 bg-white border border-red-200 text-red-600 rounded-lg text-sm font-bold hover:bg-red-600 hover:text-white transition"
                            onclick="return confirm('Yakin ingin menghapus data ini permanen?')">
                            Hapus Permanen
                        </button>
                    </form>
                </div>

            </div>

            <!-- KOLOM KANAN: DETAIL DATA -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="text-lg font-bold text-slate-800">Informasi Lengkap</h3>
                    </div>

                    <div class="p-6 space-y-8">

                        <!-- Section: Akademik -->
                        <div>
                            <h4
                                class="text-sm font-bold text-indigo-600 uppercase tracking-wider mb-4 border-b border-indigo-100 pb-2">
                                Update Akademik
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-xs text-slate-400">Tahun Ajaran</p>
                                    <p class="text-slate-800 font-medium">{{ $item->tahun_ajaran }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400">Program</p>
                                    <p class="text-slate-800 font-medium">{{ $item->program_sebelumnya }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400">Kelas Sebelumnya</p>
                                    <p class="text-slate-600 font-medium">{{ $item->kelas_sebelumnya }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400">Naik ke Kelas</p>
                                    <p class="text-indigo-700 font-bold text-lg flex items-center gap-2">
                                        <i class="fa-solid fa-arrow-right"></i> {{ $item->naik_ke_kelas }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Section: Biodata -->
                        <div>
                            <h4
                                class="text-sm font-bold text-indigo-600 uppercase tracking-wider mb-4 border-b border-indigo-100 pb-2">
                                Biodata Santri
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-xs text-slate-400">Nama Lengkap</p>
                                    <p class="text-slate-800 font-medium">{{ $item->nama_lengkap }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400">Jenis Kelamin</p>
                                    <p class="text-slate-800 font-medium">
                                        {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                                </div>
                                <div class="md:col-span-2">
                                    <p class="text-xs text-slate-400">Alamat</p>
                                    <p class="text-slate-800 font-medium">{{ $item->alamat }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Section: Wali -->
                        <div>
                            <h4
                                class="text-sm font-bold text-indigo-600 uppercase tracking-wider mb-4 border-b border-indigo-100 pb-2">
                                Data Wali
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-xs text-slate-400">Nama Wali</p>
                                    <p class="text-slate-800 font-medium">{{ $item->nama_wali }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400">No. WhatsApp</p>
                                    <a href="https://wa.me/62{{ $item->no_hp_wali }}" target="_blank"
                                        class="text-emerald-600 font-medium hover:underline flex items-center gap-2">
                                        <i class="fa-brands fa-whatsapp"></i> {{ $item->no_hp_wali }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Section: Metadata -->
                        <div class="pt-4 border-t border-slate-100">
                            <p class="text-xs text-slate-400">
                                Diajukan pada: {{ $item->created_at->format('d F Y, H:i') }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection