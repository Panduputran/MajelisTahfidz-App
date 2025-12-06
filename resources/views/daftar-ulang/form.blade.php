@extends('layouts.app')

@section('content')
    <div class="min-h-[calc(100vh-80px)] flex flex-col lg:flex-row w-full bg-white relative overflow-hidden font-sans">

        {{-- KIRI: Visual Branding (Tema Indigo/Ungu - Pembeda dari Santri Baru) --}}
        <div
            class="lg:w-5/12 bg-slate-900 relative overflow-hidden flex flex-col justify-center items-center text-center p-8 lg:p-16 text-white min-h-[300px] lg:min-h-full">

            {{-- Animated BG --}}
            <div class="absolute inset-0 opacity-20">
                <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
                    <path d="M0 100 C 20 0 50 0 100 100 Z" fill="url(#grad2)" />
                    <defs>
                        <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:rgb(99, 102, 241);stop-opacity:1" /> <!-- Indigo -->
                            <stop offset="100%" style="stop-color:rgb(168, 85, 247);stop-opacity:1" /> <!-- Purple -->
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div
                class="absolute top-[-20%] right-[-20%] w-[80%] h-[80%] rounded-full bg-indigo-600/20 blur-3xl animate-blob">
            </div>
            <div
                class="absolute bottom-[-20%] left-[-20%] w-[80%] h-[80%] rounded-full bg-purple-600/20 blur-3xl animate-blob animation-delay-2000">
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
                        class="text-3xl lg:text-4xl font-bold font-serif mb-2 text-transparent bg-clip-text bg-gradient-to-r from-indigo-200 to-purple-200">
                        Daftar Ulang Santri
                    </h1>
                    <p class="text-indigo-100/80 text-lg font-medium">Pembaruan Data & Kenaikan Kelas</p>

                    <div class="mt-8 max-w-sm mx-auto p-6 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10">
                        <p class="text-lg font-serif italic leading-relaxed">
                            "Tuntutlah ilmu dari buaian hingga ke liang lahat."
                        </p>
                        <p class="text-xs font-bold text-indigo-300 mt-3 tracking-wider uppercase">— Mahfudzot</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- KANAN: Formulir --}}
        <div
            class="w-full lg:w-7/12 flex items-center justify-center p-6 md:p-12 lg:p-16 bg-slate-50 relative overflow-y-auto">
            <div class="w-full max-w-2xl space-y-8 animate-fade-in py-4 mt-8 lg:mt-0">

                <div class="text-left">
                    <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Formulir Daftar Ulang</h2>
                    <div class="h-1.5 w-24 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full mt-3 mb-6"></div>

                    @if(session('success'))
                        <div class="bg-indigo-50 border border-indigo-200 rounded-2xl p-6 shadow-sm mb-8 animate-fade-in">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-check text-2xl text-indigo-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-indigo-800 mb-1">Data Berhasil Disimpan!</h3>
                                    <p class="text-indigo-700 text-sm mb-2">{{ session('success') }}</p>
                                    <p class="text-xs text-indigo-600">Admin akan memvalidasi data Anda segera.</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-slate-500 mb-6">
                            Khusus untuk <strong>Santri Lama / Aktif</strong>. Silakan isi data terbaru dan upload foto diri.
                        </p>
                    @endif
                </div>

                <form method="POST" action="{{ route('daftar-ulang.store') }}" enctype="multipart/form-data"
                    class="space-y-8">
                    @csrf

                    {{-- SECTION 1: IDENTITAS DIRI --}}
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                        <h3
                            class="text-lg font-bold text-slate-700 mb-4 flex items-center gap-2 pb-2 border-b border-slate-50">
                            <i class="fa-solid fa-user-tag text-indigo-500"></i> Identitas Santri
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all placeholder:text-slate-300"
                                    placeholder="Nama Santri">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">NIS (Jika Ingat)</label>
                                <input type="text" name="nis"
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all placeholder:text-slate-300"
                                    placeholder="Nomor Induk">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Kelamin</label>
                                <select name="jenis_kelamin" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 2: DATA AKADEMIK --}}
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                        <h3
                            class="text-lg font-bold text-slate-700 mb-4 flex items-center gap-2 pb-2 border-b border-slate-50">
                            <i class="fa-solid fa-graduation-cap text-indigo-500"></i> Data Akademik
                        </h3>

                        <div class="mb-5">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Program Sebelumnya</label>
                            <select name="program_sebelumnya" required
                                class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all">
                                <option value="">Pilih Program...</option>
                                <option value="Tahfidz Harian">Tahfidz Harian</option>
                                <option value="Santri Boarding">Santri Boarding</option>
                                <option value="Tahsin">Tahsin</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Kelas Sebelumnya</label>
                                <input type="text" name="kelas_sebelumnya" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all placeholder:text-slate-300"
                                    placeholder="Cth: 1 Ula">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Naik ke Kelas</label>
                                <input type="text" name="naik_ke_kelas" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all placeholder:text-slate-300"
                                    placeholder="Cth: 2 Ula">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Tahun Ajaran Baru</label>
                            <select name="tahun_ajaran" required
                                class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all">
                                <option value="2025/2026">2025/2026</option>
                                <option value="2026/2027">2026/2027</option>
                            </select>
                        </div>
                    </div>

                    {{-- SECTION 3: KONTAK & FOTO --}}
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                        <h3
                            class="text-lg font-bold text-slate-700 mb-4 flex items-center gap-2 pb-2 border-b border-slate-50">
                            <i class="fa-solid fa-address-card text-indigo-500"></i> Kontak & Foto
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Wali</label>
                                <input type="text" name="nama_wali" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">No. HP Wali</label>
                                <input type="number" name="no_hp_wali" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all">
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat</label>
                                <input type="text" name="alamat" required
                                    class="w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all">
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Pas Foto Terbaru</label>
                            <label
                                class="flex flex-col items-center justify-center w-full h-48 border-2 border-indigo-200 border-dashed rounded-xl cursor-pointer bg-indigo-50/50 hover:bg-indigo-50 transition-colors group relative overflow-hidden">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 transition-opacity duration-300"
                                    id="upload-content">
                                    <i
                                        class="fa-solid fa-camera text-4xl text-indigo-400 mb-3 group-hover:text-indigo-600 transition-colors"></i>
                                    <p class="text-sm text-slate-600 font-medium">Klik untuk upload foto</p>
                                    <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG. Wajah terlihat jelas.</p>
                                </div>
                                <img id="preview-img" class="absolute inset-0 w-full h-full object-contain hidden p-2" />
                                <input type="file" name="foto_diri" class="hidden" accept="image/*" required
                                    onchange="previewImage(this)">
                            </label>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="group relative w-full flex justify-center py-4 px-4 border border-transparent rounded-xl text-base font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/30 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-6">
                                <i
                                    class="fa-solid fa-paper-plane text-white/80 group-hover:text-white transition-colors"></i>
                            </span>
                            Kirim Data Daftar Ulang
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.getElementById('preview-img');
                    const content = document.getElementById('upload-content');

                    img.src = e.target.result;
                    img.classList.remove('hidden');
                    content.classList.add('opacity-0'); // Hide text but keep clickable area
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection