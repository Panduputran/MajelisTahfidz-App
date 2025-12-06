@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-80px)] flex flex-col lg:flex-row w-full bg-white relative overflow-hidden font-sans">

        {{-- KIRI: Visual Branding --}}
        <div
            class="lg:w-5/12 bg-slate-900 relative overflow-hidden flex flex-col justify-center items-center text-center p-8 lg:p-16 text-white min-h-[300px] lg:min-h-full">

            {{-- Animated BG --}}
            <div class="absolute inset-0 opacity-20">
                <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                    <path d="M0 100 C 20 0 50 0 100 100 Z" fill="url(#grad1)" />
                    <defs>
                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:rgb(16, 185, 129);stop-opacity:1" />
                            <stop offset="100%" style="stop-color:rgb(14, 116, 144);stop-opacity:1" />
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
            class="w-full lg:w-7/12 flex flex-col items-center justify-center p-6 md:p-12 lg:p-16 bg-slate-50 relative overflow-y-auto">

            {{-- TOMBOL SHORTCUT: Cek Pembayaran (Floating Top Right) --}}
            <div class="absolute top-6 right-6 z-20">
                <a href="{{ route('pembayaran.cek') }}"
                    class="group flex items-center gap-2 px-5 py-2.5 bg-white text-slate-600 text-sm font-bold rounded-full shadow-md border border-slate-200 hover:border-emerald-500 hover:text-emerald-600 transition-all hover:shadow-lg">
                    <i class="fa-solid fa-receipt text-emerald-500 group-hover:scale-110 transition-transform"></i>
                    <span>Cek Status Pembayaran</span>
                </a>
            </div>

            <div class="w-full max-w-2xl space-y-8 animate-fade-in py-4 mt-8 lg:mt-0">

                <div class="text-left">
                    <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Formulir Pendaftaran</h2>
                    <div class="h-1.5 w-24 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full mt-3 mb-6"></div>

                    {{-- NOTIFIKASI SUKSES DENGAN TOMBOL AKSI --}}
                    @if(session('success'))
                        <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-6 shadow-sm mb-8 animate-fade-in">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-check text-2xl text-emerald-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-emerald-800 mb-1">Alhamdulillah, Pendaftaran Berhasil!
                                    </h3>
                                    <p class="text-emerald-700 text-sm mb-4">{{ session('success') }}</p>

                                    <div class="bg-white/60 p-4 rounded-xl border border-emerald-100 mb-4">
                                        <p class="text-sm text-emerald-800 font-medium">Langkah Selanjutnya:</p>
                                        <ul class="list-disc list-inside text-xs text-emerald-700 mt-1 space-y-1">
                                            <li>Lakukan pembayaran administrasi awal.</li>
                                            <li>Upload bukti transfer untuk verifikasi.</li>
                                        </ul>
                                    </div>

                                    <a href="{{ route('pembayaran.cek') }}"
                                        class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white font-bold rounded-xl shadow-lg hover:bg-emerald-700 hover:-translate-y-0.5 transition-all">
                                        <i class="fa-solid fa-file-invoice-dollar"></i>
                                        Lanjut Pembayaran
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-slate-500 mb-6">Mohon isi data calon santri dengan benar dan lengkap sesuai identitas.
                        </p>
                    @endif
                </div>

                {{-- FORM HANYA MUNCUL JIKA BELUM SUKSES (Opsional, atau tetap dimunculkan untuk daftar lagi) --}}
                {{-- Disini saya biarkan tetap muncul agar bisa mendaftarkan anak lain --}}

                <form method="POST" action="{{ route('pendaftaran.store') }}" class="space-y-8">
                    @csrf

                    {{-- SECTION 1: DATA SANTRI --}}
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                        <h3
                            class="text-lg font-bold text-slate-700 mb-4 flex items-center gap-2 pb-2 border-b border-slate-50">
                            <i class="fa-solid fa-user-graduate text-emerald-500"></i> Data Calon Santri
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 transition-all placeholder:text-slate-300"
                                    placeholder="Sesuai Akta Kelahiran">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Kelamin</label>
                                <select name="jenis_kelamin" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 transition-all cursor-pointer">
                                    <option value="">Pilih...</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Program Pendidikan</label>
                                <select name="program_minat" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 transition-all cursor-pointer">
                                    <option value="MTQ SLM-Tahsin">MTQ SLM-Tahsin</option>
                                    <option value="MTQ SLM-Tahfidz">MTQ SLM-Tahfidz</option>
                                    <option value="PPTQ SLM">PPTQ SLM</option>
                                </select>
                            </div>

                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-emerald-500 focus:ring-emerald-500 transition-all placeholder:text-slate-300"
                                    placeholder="Nama Sekolah Sebelumnya">
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 2: DATA WALI & KONTAK --}}
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                        <h3
                            class="text-lg font-bold text-slate-700 mb-4 flex items-center gap-2 pb-2 border-b border-slate-50">
                            <i class="fa-solid fa-users text-blue-500"></i> Data Wali & Kontak
                        </h3>
                        <div class="grid grid-cols-1 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Orang Tua / Wali</label>
                                <input type="text" name="nama_wali" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 transition-all placeholder:text-slate-300"
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
                                            class="w-full pl-12 pr-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 transition-all placeholder:text-slate-300"
                                            placeholder="812xxx">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email (Opsional)</label>
                                    <input type="email" name="email"
                                        class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 transition-all placeholder:text-slate-300"
                                        placeholder="email@contoh.com">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Domisili</label>
                                <textarea name="alamat" rows="3" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-blue-500 transition-all placeholder:text-slate-300"
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
                    </div>

                    {{-- Footer Link: SUDAH DAFTAR? --}}
                    <div class="relative mt-8">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-slate-50 text-slate-500">Sudah pernah mendaftar?</span>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="{{ route('pembayaran.cek') }}"
                            class="font-bold text-emerald-600 hover:text-emerald-800 transition-colors inline-flex items-center gap-2 group p-3 rounded-lg hover:bg-emerald-50">
                            <i class="fa-solid fa-search"></i>
                            Cek Status & Pembayaran Disini
                            <i
                                class="fa-solid fa-arrow-right text-xs transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection