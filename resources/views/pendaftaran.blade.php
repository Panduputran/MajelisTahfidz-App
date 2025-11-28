@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-80px)] flex flex-col lg:flex-row w-full bg-white relative overflow-hidden font-sans">

        {{-- KIRI: Visual Branding & Quotes --}}
        <div
            class="lg:w-5/12 bg-slate-900 relative overflow-hidden flex flex-col justify-center items-center text-center p-8 lg:p-16 text-white min-h-[300px] lg:min-h-full">

            {{-- Animated BG --}}
            <div class="absolute inset-0 opacity-20">
                <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                    <path d="M0 100 C 20 0 50 0 100 100 Z" fill="url(#grad1)" />
                    <defs>
                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:rgb(16, 185, 129);stop-opacity:1" /> <!-- Emerald -->
                            <stop offset="100%" style="stop-color:rgb(14, 116, 144);stop-opacity:1" /> <!-- Cyan -->
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div
                class="absolute top-[-20%] right-[-20%] w-[80%] h-[80%] rounded-full bg-emerald-600/20 blur-3xl animate-blob">
            </div>
            <div
                class="absolute bottom-[-20%] left-[-20%] w-[80%] h-[80%] rounded-full bg-blue-600/20 blur-3xl animate-blob animation-delay-2000">
            </div>

            {{-- Content --}}
            <div class="relative z-10 space-y-6">
                <div
                    class="w-24 h-24 lg:w-32 lg:h-32 mx-auto rounded-full p-1 bg-white/10 backdrop-blur-sm border border-white/20 shadow-2xl">
                    <img src="{{ asset('logo.jpg') }}" alt="Logo"
                        class="w-full h-full rounded-full object-cover shadow-inner">
                </div>

                <div class="hidden lg:block">
                    <h1
                        class="text-3xl lg:text-4xl font-bold font-serif mb-2 text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 to-blue-200">
                        Penerimaan Santri Baru
                    </h1>
                    <p class="text-emerald-100/80 text-lg font-medium">Tahun Ajaran 2025/2026</p>

                    <div class="mt-8 max-w-sm mx-auto p-6 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10">
                        <p class="text-lg font-serif italic leading-relaxed">
                            "Barangsiapa yang menempuh suatu jalan untuk mencari ilmu, maka Allah akan mudahkan baginya
                            jalan menuju surga."
                        </p>
                        <p class="text-xs font-bold text-emerald-400 mt-3 tracking-wider uppercase">— HR. Muslim</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- KANAN: Formulir --}}
        <div
            class="w-full lg:w-7/12 flex items-center justify-center p-6 md:p-12 lg:p-16 bg-slate-50 relative overflow-y-auto">
            <div class="w-full max-w-2xl space-y-8 animate-fade-in py-4">

                <div class="text-left">
                    <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Formulir Pendaftaran</h2>
                    <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full mt-3 mb-6"></div>

                    @if(session('success'))
                        <div
                            class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl flex items-center gap-3 shadow-sm mb-6">
                            <i class="fa-solid fa-check-circle text-2xl"></i>
                            <div>
                                <p class="font-bold">Pendaftaran Berhasil!</p>
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    @else
                        <p class="text-slate-500 mb-6">Mohon isi data calon santri dengan benar dan lengkap.</p>
                    @endif
                </div>

                <form method="POST" action="{{ route('pendaftaran.store') }}" class="space-y-8">
                    @csrf

                    {{-- SECTION 1: DATA SANTRI --}}
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h3 class="text-lg font-bold text-slate-700 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-user-graduate text-emerald-500"></i> Data Calon Santri
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 transition-all"
                                    placeholder="Sesuai Akta Kelahiran">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Kelamin</label>
                                <select name="jenis_kelamin" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 transition-all">
                                    <option value="">Pilih...</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Program Diminati</label>
                                <select name="program_minat" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 transition-all">
                                    <option value="Tahfidz Harian">Tahfidz Harian</option>
                                    <option value="Santri Boarding">Santri Boarding (Asrama)</option>
                                    <option value="Tahsin">Tahsin Reguler</option>
                                </select>
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 transition-all"
                                    placeholder="Nama Sekolah Sebelumnya">
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 2: DATA WALI & KONTAK --}}
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h3 class="text-lg font-bold text-slate-700 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-users text-blue-500"></i> Data Wali & Kontak
                        </h3>
                        <div class="grid grid-cols-1 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Orang Tua / Wali</label>
                                <input type="text" name="nama_wali" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 transition-all"
                                    placeholder="Nama Ayah/Ibu">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">No. WhatsApp
                                        Aktif</label>
                                    <div class="relative">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 font-bold text-sm">+62</span>
                                        <input type="number" name="no_hp_wali" required
                                            class="w-full pl-12 pr-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 transition-all"
                                            placeholder="812xxx">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email (Opsional)</label>
                                    <input type="email" name="email"
                                        class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 transition-all"
                                        placeholder="email@contoh.com">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Domisili</label>
                                <textarea name="alamat" rows="3" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 transition-all"
                                    placeholder="Alamat lengkap beserta RT/RW"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="group relative w-full flex justify-center py-4 px-4 border border-transparent rounded-xl text-base font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-4 focus:ring-emerald-500/30 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-6">
                                <i
                                    class="fa-solid fa-paper-plane text-white/80 group-hover:text-white transition-colors"></i>
                            </span>
                            Kirim Formulir Pendaftaran
                        </button>
                        <p class="text-center text-xs text-slate-400 mt-4">
                            Dengan mengirimkan formulir ini, Anda menyetujui kebijakan privasi Majlis.
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection