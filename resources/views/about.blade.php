@extends('layouts.app')

@section('content')
    <div class="overflow-hidden">

        {{-- 1. HERO HEADER SECTION --}}
        <section class="relative py-16 md:py-24 text-center">
            <!-- Background Blobs (Sama seperti Welcome) -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full overflow-hidden pointer-events-none -z-10">
                <div
                    class="absolute top-0 right-[10%] w-[300px] h-[300px] bg-blue-100/50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob">
                </div>
                <div
                    class="absolute top-10 left-[10%] w-[300px] h-[300px] bg-emerald-100/50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000">
                </div>
            </div>

            <div class="max-w-4xl mx-auto px-6 relative z-10 animate-fade-in">
                <span class="text-islamic-primary font-bold tracking-widest uppercase text-sm mb-2 block">Profil
                    Lembaga</span>
                <h1 class="text-4xl md:text-5xl font-bold text-slate-800 font-serif mb-6">
                    Tentang Kami
                </h1>
                <div
                    class="w-24 h-1.5 bg-gradient-to-r from-islamic-primary to-islamic-secondary mx-auto mb-10 rounded-full">
                </div>

                <p class="text-lg md:text-xl text-slate-600 leading-relaxed font-medium">
                    Majlis Tahfidz Al-Qur'an <span class="text-islamic-primary font-bold">Syifa Lilmu'minin</span>
                    hadir sebagai wadah pendidikan yang ramah, profesional, dan berorientasi pada pembentukan generasi
                    Qur'ani.
                </p>
            </div>
        </section>

        {{-- 2. QUOTE & VALUES --}}
        <section class="max-w-5xl mx-auto px-6 mb-20">
            <!-- Quote Card -->
            <div
                class="relative bg-white rounded-3xl p-8 md:p-12 shadow-xl border border-islamic-primary/10 text-center overflow-hidden group hover:shadow-2xl transition-all duration-500">
                <!-- Decorative Icon Bg -->
                <i
                    class="fa-solid fa-quran absolute -right-6 -bottom-6 text-9xl text-islamic-primary/5 group-hover:text-islamic-primary/10 transition-colors duration-500 rotate-12"></i>

                <i class="fa-solid fa-quote-left text-3xl text-islamic-secondary/50 mb-4 block"></i>
                <blockquote class="text-xl md:text-2xl text-slate-700 font-serif leading-relaxed relative z-10">
                    "Dan barangsiapa yang menghidupkan tanah yang mati, maka sesungguhnya ia menghidupkan tanah yang mati
                    itu. Sesungguhnya Allah Maha Mendengar lagi Maha Mengetahui."
                </blockquote>
                <cite
                    class="inline-block mt-6 px-4 py-1 rounded-full bg-islamic-primary/10 text-islamic-primary font-bold text-sm">
                    — QS. Al-Ahzab: 50
                </cite>
            </div>
        </section>

        {{-- 3. SEJARAH (Timeline Style) --}}
        <section class="max-w-6xl mx-auto px-6 mb-20">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1 relative">
                    <!-- Image Placeholder Modern -->
                    <div
                        class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white rotate-2 hover:rotate-0 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10"></div>
                        <!-- Ganti src dengan foto kegiatan/gedung -->
                        <img src="https://images.unsplash.com/photo-1584286595398-a59f21d313f5?q=80&w=1000&auto=format&fit=crop"
                            alt="Kegiatan Santri" class="w-full h-[400px] object-cover">
                        <div class="absolute bottom-6 left-6 z-20 text-white">
                            <p class="font-bold text-lg">Sejak 2015</p>
                            <p class="text-sm opacity-90">Membangun Generasi Qur'ani</p>
                        </div>
                    </div>
                </div>

                <div class="order-1 md:order-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-10 h-10 rounded-full bg-islamic-secondary/20 flex items-center justify-center text-islamic-secondary">
                            <i class="fa-solid fa-hourglass-start"></i>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold text-slate-800">Sejarah Singkat</h2>
                    </div>

                    <div class="prose prose-lg text-slate-600 leading-relaxed space-y-4">
                        <p>
                            Bermula dari sebuah mimpi kecil di sebuah surau sederhana, <span
                                class="font-bold text-islamic-primary">Syifa Lilmu'minin</span> didirikan dengan visi luhur
                            untuk menjadi mercusuar ilmu di tengah masyarakat.
                        </p>
                        <p>
                            Kami menyadari bahwa menghafal Al-Qur'an bukan sekadar menjaga teks, melainkan menjaga nilai dan
                            mengamalkannya. Dengan izin Allah SWT, majlis ini terus berkembang menjadi lembaga pendidikan
                            yang memadukan metode klasik dan pendekatan modern.
                        </p>
                        <div
                            class="flex items-center gap-2 text-islamic-primary font-medium bg-islamic-primary/5 p-3 rounded-lg border-l-4 border-islamic-primary">
                            <i class="fa-solid fa-check-circle"></i>
                            <span>Tempat ilmu bertemu amal, hafalan bertemu pemahaman.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 4. VISI & MISI CARDS --}}
        <section class="py-16 bg-slate-50 border-y border-slate-100 mb-20">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-slate-800">Visi & Misi</h2>
                    <p class="text-slate-500 mt-2">Komitmen kami dalam mendidik santri</p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Visi -->
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:-translate-y-2 transition-transform duration-300 group">
                        <div
                            class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 text-2xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">Visi Utama</h3>
                        <p class="text-slate-600">Menjadikan generasi penghafal Al-Qur'an yang tidak hanya hafal lafaz,
                            namun juga berakhlak mulia dan berwawasan luas.</p>
                    </div>

                    <!-- Misi 1 -->
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:-translate-y-2 transition-transform duration-300 group">
                        <div
                            class="w-14 h-14 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 text-2xl mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                            <i class="fa-solid fa-book-open-reader"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">Pendidikan Berkualitas</h3>
                        <p class="text-slate-600">Menyelenggarakan pendidikan Al-Qur'an (Tahsin & Tahfidz) yang profesional,
                            terstruktur, dan menyenangkan bagi santri.</p>
                    </div>

                    <!-- Misi 2 -->
                    <div
                        class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:-translate-y-2 transition-transform duration-300 group">
                        <div
                            class="w-14 h-14 bg-amber-50 rounded-xl flex items-center justify-center text-amber-600 text-2xl mb-6 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                            <i class="fa-solid fa-mosque"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">Lingkungan Islami</h3>
                        <p class="text-slate-600">Mengembangkan lingkungan pembelajaran yang kondusif, nyaman, dan
                            berlandaskan nilai-nilai persaudaraan Islam.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- 5. TIM PENGAJAR (Modern Cards) --}}
        <section id="team" class="max-w-6xl mx-auto px-6 mb-24">
            <div class="text-center mb-12">
                <span class="text-islamic-secondary font-bold tracking-widest uppercase text-xs mb-2 block">Asatidz &
                    Pengurus</span>
                <h2 class="text-3xl font-bold text-slate-800">Tim Pengajar Kami</h2>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
                <!-- Card Pengajar 1 -->
                <div
                    class="group bg-white rounded-2xl p-6 shadow-lg border border-slate-100 text-center hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-emerald-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                    </div>

                    <div
                        class="w-32 h-32 mx-auto rounded-full p-1 bg-gradient-to-tr from-blue-400 to-emerald-400 mb-4 group-hover:scale-105 transition-transform duration-300">
                        <img src="https://ui-avatars.com/api/?name=KH+Abdullah&background=fff&color=333" alt="Pengasuh"
                            class="w-full h-full rounded-full object-cover border-4 border-white">
                    </div>

                    <h3 class="text-xl font-bold text-slate-800">KH. Abdullah</h3>
                    <p class="text-sm text-islamic-primary font-medium mb-3">Pimpinan & Pengasuh</p>
                    <p class="text-slate-500 text-sm italic">"Mengawal santri dengan hati, mendidik dengan keteladanan."</p>

                    <div
                        class="mt-4 flex justify-center gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <a href="#" class="text-slate-400 hover:text-blue-600"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="text-slate-400 hover:text-pink-600"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Card Pengajar 2 -->
                <div
                    class="group bg-white rounded-2xl p-6 shadow-lg border border-slate-100 text-center hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-emerald-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                    </div>

                    <div
                        class="w-32 h-32 mx-auto rounded-full p-1 bg-gradient-to-tr from-blue-400 to-emerald-400 mb-4 group-hover:scale-105 transition-transform duration-300">
                        <img src="https://ui-avatars.com/api/?name=Ust+Hidayat&background=fff&color=333" alt="Koordinator"
                            class="w-full h-full rounded-full object-cover border-4 border-white">
                    </div>

                    <h3 class="text-xl font-bold text-slate-800">Ust. Hidayat, Lc</h3>
                    <p class="text-sm text-islamic-primary font-medium mb-3">Koordinator Tahfidz</p>
                    <p class="text-slate-500 text-sm italic">"Hafalan kuat, tajwid tepat, akhlak memikat."</p>

                    <div
                        class="mt-4 flex justify-center gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <a href="#" class="text-slate-400 hover:text-blue-600"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="text-slate-400 hover:text-pink-600"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Card Pengajar 3 -->
                <div
                    class="group bg-white rounded-2xl p-6 shadow-lg border border-slate-100 text-center hover:shadow-xl transition-all duration-300 relative overflow-hidden">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-emerald-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                    </div>

                    <div
                        class="w-32 h-32 mx-auto rounded-full p-1 bg-gradient-to-tr from-blue-400 to-emerald-400 mb-4 group-hover:scale-105 transition-transform duration-300">
                        <img src="https://ui-avatars.com/api/?name=Staf+Admin&background=fff&color=333" alt="Admin"
                            class="w-full h-full rounded-full object-cover border-4 border-white">
                    </div>

                    <h3 class="text-xl font-bold text-slate-800">Fulanah, S.Pd</h3>
                    <p class="text-sm text-islamic-primary font-medium mb-3">Kepala Administrasi</p>
                    <p class="text-slate-500 text-sm italic">"Melayani kebutuhan santri dan wali dengan sepenuh hati."</p>

                    <div
                        class="mt-4 flex justify-center gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <a href="#" class="text-slate-400 hover:text-blue-600"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="text-slate-400 hover:text-pink-600"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('register') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-slate-800 text-white font-bold rounded-full hover:bg-slate-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <span>Bergabung Bersama Kami</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </section>

    </div>

    <style>
        /* Custom Animations for About Page */
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
@endsection