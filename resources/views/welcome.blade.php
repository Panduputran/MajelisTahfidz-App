@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="overflow-hidden bg-gray-50 font-sans text-slate-800">

        {{-- 1. HERO SECTION (Modern Canvas Style) --}}
        <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-white">

            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
                <div
                    class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-blue-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob">
                </div>
                <div
                    class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-green-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000">
                </div>
                <div
                    class="absolute bottom-[-20%] left-[20%] w-[500px] h-[500px] bg-amber-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000">
                </div>
            </div>

            <div class="absolute top-20 left-10 text-amber-400 opacity-20 animate-float-slow text-4xl">
                <i class="fa-solid fa-star-and-crescent"></i>
            </div>
            <div class="absolute bottom-32 right-16 text-green-600 opacity-15 animate-float-reverse text-5xl">
                <i class="fa-solid fa-book-quran"></i>
            </div>

            <div class="relative z-10 max-w-6xl mx-auto px-6 pt-20 pb-16 text-center">

                <div class="mb-8 flex justify-center animate-fadeInUp">
                    <div class="relative p-1 rounded-full bg-gradient-to-tr from-blue-500 to-green-500 shadow-2xl">
                        <img src="{{ asset('logo.jpg') }}" alt="Logo"
                            class="w-32 h-32 md:w-44 md:h-44 rounded-full object-cover border-4 border-white">
                    </div>
                </div>

                <div class="mb-6 animate-fadeInUp delay-200">
                    <h1 class="text-2xl md:text-4xl font-bold text-slate-600 tracking-wider mb-2 uppercase">
                        Majlis Tahfidz Al-Qur'an
                    </h1>
                    <h2
                        class="text-4xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-teal-600 drop-shadow-sm font-serif">
                        Syifaul Mu'min
                    </h2>
                    <div class="w-20 h-1.5 bg-amber-400 mx-auto mt-6 rounded-full"></div>
                </div>

                <div class="mb-8 max-w-3xl mx-auto animate-fadeInUp delay-300">
                    <blockquote class="text-lg text-slate-600 leading-relaxed font-medium">
                        <i class="fa-solid fa-quote-left text-blue-200 text-2xl mr-2"></i>
                        Sesungguhnya orang-orang yang membaca kitab Allah, mendirikan shalat, dan menginfakkan sebagian dari
                        rezeki... mereka itu mengharapkan perdagangan yang tidak akan rugi.
                        <i class="fa-solid fa-quote-right text-blue-200 text-2xl ml-2"></i>
                    </blockquote>
                    <cite class="text-sm text-blue-600 font-bold mt-2 block">— QS. Al-Fathir: 29</cite>
                </div>

                <div class="mb-10 flex justify-center gap-8 animate-fadeInUp delay-400">
                    <div class="flex flex-col items-center group cursor-pointer">
                        <div
                            class="w-20 h-20 rounded-full overflow-hidden border-2 border-amber-400 shadow-md group-hover:scale-110 transition-transform duration-300">
                            {{-- Ganti src dengan foto asli --}}
                            <img src="https://ui-avatars.com/api/?name=Kiai+H&background=0D8ABC&color=fff"
                                class="w-full h-full object-cover">
                        </div>
                        <span class="text-xs font-bold mt-2 text-slate-700">KH. Pimpinan</span>
                    </div>
                    <div class="flex flex-col items-center group cursor-pointer">
                        <div
                            class="w-20 h-20 rounded-full overflow-hidden border-2 border-amber-400 shadow-md group-hover:scale-110 transition-transform duration-300">
                            {{-- Ganti src dengan foto asli --}}
                            <img src="https://ui-avatars.com/api/?name=Ust+A&background=10B981&color=fff"
                                class="w-full h-full object-cover">
                        </div>
                        <span class="text-xs font-bold mt-2 text-slate-700">Ust. Pengasuh</span>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-center gap-5 animate-fadeInUp delay-500">
                    <a href="{{ route('register') }}"
                        class="group relative px-8 py-4 bg-blue-700 text-white font-bold rounded-full shadow-lg hover:bg-blue-800 hover:shadow-blue-500/30 transition-all duration-300 overflow-hidden">
                        <span class="relative z-10 flex items-center gap-2">
                            <i class="fa-solid fa-pen-to-square"></i> Pendaftaran
                        </span>
                    </a>

                    <a href="{{ route('about') }}"
                        class="px-8 py-4 bg-white text-blue-700 font-bold rounded-full shadow-md border border-gray-200 hover:bg-gray-50 transition-all duration-300 flex items-center gap-2">
                        <i class="fa-solid fa-circle-info"></i> Tentang Kami
                    </a>

                    <div
                        class="flex items-center gap-3 bg-amber-50 px-5 py-3 rounded-xl border border-amber-200 ml-0 md:ml-4">
                        <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center text-amber-600">
                            <i class="fa-solid fa-money-bill-wave"></i>
                        </div>
                        <div class="text-left">
                            <p class="text-[10px] uppercase font-bold text-amber-800 tracking-wide">Biaya Pendaftaran</p>
                            <p class="text-lg font-bold text-slate-800 leading-none">Rp 120.000</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- 2. TENTANG KAMI (Brief) --}}
        <section class="max-w-4xl mx-auto px-6 py-12 text-center">
            <h2 class="text-2xl font-bold text-slate-800 mb-4">Tentang Kami</h2>
            <p class="text-slate-600 leading-relaxed">
                Majlis Tahfidz Al-Qur'an <span class="font-bold text-blue-600">Syifaul Mu’minin</span> berkomitmen mencetak
                generasi Qur'ani yang berakhlak mulia melalui metode pembelajaran yang efektif dan lingkungan yang kondusif.
            </p>
        </section>

        {{-- 3. PROGRAM UNGGULAN (Task: Urutan Baru) --}}
        <section class="py-16 bg-white relative">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="text-blue-600 font-semibold tracking-wider text-sm uppercase">Kurikulum</span>
                    <h2 class="text-3xl font-bold text-slate-800 mt-2">Program Pendidikan</h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    {{-- Task Order: 1. Tahsin, 2. Tahfidz, 3. Boarding --}}

                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-teal-500 hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-14 h-14 bg-teal-50 rounded-xl flex items-center justify-center text-teal-600 text-2xl mb-6">
                            <i class="fa-solid fa-spell-check"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">Program Tahsin</h3>
                        <p class="text-slate-600 text-sm mb-4">Perbaikan kualitas bacaan Al-Qur'an (Makhraj & Tajwid) untuk
                            pemula hingga mahir.</p>
                    </div>

                    <div
                        class="bg-blue-600 p-8 rounded-2xl shadow-xl hover:-translate-y-2 transition-transform duration-300 transform md:scale-105 relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-4 opacity-10 text-white text-6xl">
                            <i class="fa-solid fa-quran"></i>
                        </div>
                        <div
                            class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center text-white text-2xl mb-6 backdrop-blur-sm">
                            <i class="fa-solid fa-book-open-reader"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Program Tahfidz</h3>
                        <p class="text-blue-100 text-sm mb-4">Fokus hafalan intensif dengan target setoran harian dan
                            pemahaman makna.</p>
                    </div>

                    <div
                        class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-amber-500 hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-14 h-14 bg-amber-50 rounded-xl flex items-center justify-center text-amber-600 text-2xl mb-6">
                            <i class="fa-solid fa-school"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-3">Santri Boarding</h3>
                        <p class="text-slate-600 text-sm mb-4">Program asrama penuh dengan pembinaan karakter, akhlak, dan
                            kemandirian 24 jam.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- 4. UNIT USAHA (Task: Search & Modern Look) --}}
        <section class="py-16 bg-gray-50 border-y border-gray-200">
            <div class="max-w-5xl mx-auto px-6">
                <div
                    class="flex flex-col md:flex-row items-center gap-10 bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="md:w-1/2">
                        <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-3">
                            <i class="fa-solid fa-store text-blue-600"></i> Unit Usaha
                        </h2>
                        <p class="text-slate-500 mt-2 text-sm">
                            Dukung kemandirian majelis dengan berbelanja kebutuhan di toko resmi kami. Tersedia buku,
                            atribut, dan herbal.
                        </p>

                        <div class="mt-6 relative group">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-green-400 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200">
                            </div>
                            <form action="#" class="relative flex items-center">
                                <i class="fa-solid fa-magnifying-glass absolute left-4 text-gray-400"></i>
                                <input type="text" placeholder="Cari buku, seragam, atau produk..."
                                    class="w-full py-3 pl-12 pr-4 bg-white border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm text-slate-700 shadow-sm">
                                <button type="submit"
                                    class="absolute right-2 px-4 py-1.5 bg-slate-800 text-white rounded-md text-xs font-bold uppercase hover:bg-slate-700 transition">
                                    Cari
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="md:w-1/2 grid grid-cols-2 gap-4 w-full">
                        <div
                            class="p-4 rounded-xl bg-blue-50 text-blue-700 flex flex-col items-center gap-2 hover:bg-blue-100 transition cursor-pointer">
                            <i class="fa-solid fa-book text-2xl"></i>
                            <span class="text-sm font-semibold">Kitab & Buku</span>
                        </div>
                        <div
                            class="p-4 rounded-xl bg-amber-50 text-amber-700 flex flex-col items-center gap-2 hover:bg-amber-100 transition cursor-pointer">
                            <i class="fa-solid fa-shirt text-2xl"></i>
                            <span class="text-sm font-semibold">Atribut Santri</span>
                        </div>
                        <div
                            class="p-4 rounded-xl bg-green-50 text-green-700 flex flex-col items-center gap-2 hover:bg-green-100 transition cursor-pointer">
                            <i class="fa-solid fa-leaf text-2xl"></i>
                            <span class="text-sm font-semibold">Herbal</span>
                        </div>
                        <div
                            class="p-4 rounded-xl bg-purple-50 text-purple-700 flex flex-col items-center gap-2 hover:bg-purple-100 transition cursor-pointer">
                            <i class="fa-solid fa-mug-hot text-2xl"></i>
                            <span class="text-sm font-semibold">Makanan</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- 5. FITUR ISLAMI (Logic Asli) --}}
        <section class="py-16 px-6 max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-8">

                <div
                    class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden">
                    <i class="fa-solid fa-quran absolute -bottom-5 -right-5 text-9xl text-white opacity-5"></i>
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                                <i class="fa-solid fa-lightbulb text-amber-400"></i>
                            </div>
                            <h3 class="font-bold text-lg">Ayat Harian</h3>
                        </div>
                        <div id="daily-verse">
                            <p class="italic text-slate-300">Memuat data...</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <h3 class="font-bold text-lg text-slate-800">Waktu Sholat</h3>
                        </div>
                        <span id="prayer-date"
                            class="text-xs font-bold bg-gray-100 px-3 py-1 rounded-full text-gray-500">Jakarta</span>
                    </div>

                    <div id="prayer-times" class="grid grid-cols-5 gap-2 text-center">
                        <div class="h-12 bg-gray-100 rounded animate-pulse"></div>
                        <div class="h-12 bg-gray-100 rounded animate-pulse"></div>
                        <div class="h-12 bg-gray-100 rounded animate-pulse"></div>
                        <div class="h-12 bg-gray-100 rounded animate-pulse"></div>
                        <div class="h-12 bg-gray-100 rounded animate-pulse"></div>
                    </div>
                    <div id="hijri-date"
                        class="mt-6 text-center text-sm font-medium text-amber-600 border-t pt-4 border-gray-100">
                        <i class="fa-solid fa-calendar-days mr-2"></i> Memuat tanggal...
                    </div>
                </div>
            </div>
        </section>

        {{-- 6. STATISTICS --}}
        <section class="py-12 bg-blue-50 border-t border-blue-100">
            <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <i class="fa-solid fa-users text-3xl text-blue-300 mb-2"></i>
                    <div class="text-3xl font-bold text-slate-800 counter" data-target="500">0</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Santri Aktif</div>
                </div>
                <div>
                    <i class="fa-solid fa-certificate text-3xl text-blue-300 mb-2"></i>
                    <div class="text-3xl font-bold text-slate-800 counter" data-target="50">0</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Hafiz Qur'an</div>
                </div>
                <div>
                    <i class="fa-solid fa-user-tie text-3xl text-blue-300 mb-2"></i>
                    <div class="text-3xl font-bold text-slate-800 counter" data-target="25">0</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Asatidz</div>
                </div>
                <div>
                    <i class="fa-solid fa-building-columns text-3xl text-blue-300 mb-2"></i>
                    <div class="text-3xl font-bold text-slate-800 counter" data-target="10">0</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Tahun</div>
                </div>
            </div>
        </section>

    </div>

    {{-- SCRIPT TETAP DIPERTAHANKAN (Fungsi Original) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // 1. Fetch Islamic Data (Mempertahankan logika asli user)
            fetch('/api/islamic-data')
                .then(response => {
                    if (!response.ok) throw new Error("API not found");
                    return response.json();
                })
                .then(data => {
                    // Verse Logic
                    const verseElement = document.getElementById('daily-verse');
                    if (verseElement && data.verse) {
                        verseElement.innerHTML = `
                        <blockquote class="text-lg leading-relaxed font-serif">"${data.verse.text}"</blockquote>
                        <cite class="block mt-3 text-sm font-bold text-amber-400">— ${data.verse.surah} (${data.verse.number})</cite>
                    `;
                    }

                    // Prayer Times Logic
                    const prayerTimesElement = document.getElementById('prayer-times');
                    if (prayerTimesElement && data.prayer_times) {
                        const times = data.prayer_times;
                        prayerTimesElement.innerHTML = `
                        <div class="flex flex-col"><span class="text-xs text-gray-500">Subuh</span><span class="font-bold text-slate-800">${times.fajr}</span></div>
                        <div class="flex flex-col"><span class="text-xs text-gray-500">Dzuhur</span><span class="font-bold text-slate-800">${times.dhuhr}</span></div>
                        <div class="flex flex-col"><span class="text-xs text-gray-500">Ashar</span><span class="font-bold text-slate-800">${times.asr}</span></div>
                        <div class="flex flex-col"><span class="text-xs text-gray-500">Maghrib</span><span class="font-bold text-slate-800">${times.maghrib}</span></div>
                        <div class="flex flex-col"><span class="text-xs text-gray-500">Isya</span><span class="font-bold text-slate-800">${times.isha}</span></div>
                    `;
                        document.getElementById('prayer-date').textContent = times.date;
                    }

                    // Hijri Date Logic
                    const hijriElement = document.getElementById('hijri-date');
                    if (hijriElement && data.hijri_date) {
                        hijriElement.innerHTML = `<i class="fa-solid fa-calendar-days mr-2"></i> ${data.hijri_date.day} ${data.hijri_date.month_name} ${data.hijri_date.year} H`;
                    }
                })
                .catch(error => {
                    console.log('Using Fallback Data');
                    // Fallback jika API backend belum siap (agar tampilan tidak rusak)
                    document.getElementById('daily-verse').innerHTML = `
                    <blockquote class="text-lg leading-relaxed font-serif">"Maka sesungguhnya bersama kesulitan ada kemudahan."</blockquote>
                    <cite class="block mt-3 text-sm font-bold text-amber-400">— Al-Insyirah: 5</cite>
                `;
                    // Isi dummy times agar layout tetap bagus
                    const pEl = document.getElementById('prayer-times');
                    if (pEl) pEl.innerHTML = `
                    <div class="flex flex-col"><span class="text-xs text-gray-500">Subuh</span><span class="font-bold text-slate-800">04:30</span></div>
                    <div class="flex flex-col"><span class="text-xs text-gray-500">Dzuhur</span><span class="font-bold text-slate-800">12:00</span></div>
                    <div class="flex flex-col"><span class="text-xs text-gray-500">Ashar</span><span class="font-bold text-slate-800">15:15</span></div>
                    <div class="flex flex-col"><span class="text-xs text-gray-500">Maghrib</span><span class="font-bold text-slate-800">18:00</span></div>
                    <div class="flex flex-col"><span class="text-xs text-gray-500">Isya</span><span class="font-bold text-slate-800">19:15</span></div>
                `;
                });

            // 2. Counter Animation (Mempertahankan logika asli)
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;
                    const inc = target / 200;
                    if (count < target) {
                        counter.innerText = Math.ceil(count + inc);
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });
        });
    </script>

    <style>
        /* CSS Shapes & Animations */
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

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-500 {
            animation-delay: 0.5s;
        }

        /* Float Icons Animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .animate-float-slow {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-reverse {
            animation: float 7s ease-in-out infinite reverse;
        }
    </style>
@endsection