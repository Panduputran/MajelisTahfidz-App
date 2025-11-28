@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16">
    <!-- Header Section -->
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-6xl font-bold bg-gradient-to-r from-blue-800 via-blue-700 to-cyan-800 bg-clip-text text-transparent mb-6">
            Pendaftaran Umrah
        </h1>
        <div class="w-32 h-1 bg-gradient-to-r from-blue-500 via-amber-400 to-blue-500 mx-auto mb-8 rounded-full"></div>
        <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
            Bergabunglah dengan program pendaftaran Umrah kami. Kami siap membantu Anda dalam perjalanan ibadah Umrah yang berkesan dan penuh berkah.
        </p>
    </div>

    <!-- Programs Grid -->
    <div class="grid lg:grid-cols-2 gap-8 mb-16">
        {{-- Paket Umrah Reguler --}}
        <div class="premium-card group bg-white p-8 rounded-3xl shadow-xl border border-blue-100 hover:border-blue-300 transition-all duration-500 overflow-hidden relative">
            <!-- Islamic decorative background -->
            <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
                <svg viewBox="0 0 100 100" class="w-full h-full">
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#059669" stroke-width="1"/>
                    <circle cx="50" cy="50" r="25" fill="none" stroke="#D4AF37" stroke-width="1"/>
                    <text x="50" y="55" text-anchor="middle" font-size="16" fill="#059669" class="arabic-text">ع</text>
                </svg>
            </div>

            <div class="relative z-10">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <span class="text-2xl text-white arabic-text">ع</span>
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-4">Paket Umrah Reguler</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Paket Umrah lengkap dengan akomodasi, transportasi, dan pendampingan ibadah yang komprehensif.
                </p>

                <div class="space-y-3 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Hotel bintang 4-5 di Makkah dan Madinah</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Transportasi bus AC</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Pendamping ibadah berpengalaman</span>
                    </div>
                </div>

                <a href="#registration-form" class="group/btn inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-emerald-700 hover:to-teal-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <span>Daftar Sekarang</span>
                    <span class="text-lg">→</span>
                </a>
            </div>
        </div>

        {{-- Paket Umrah VIP --}}
        <div class="premium-card group bg-white p-8 rounded-3xl shadow-xl border border-teal-100 hover:border-teal-300 transition-all duration-500 overflow-hidden relative">
            <!-- Islamic decorative background -->
            <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
                <svg viewBox="0 0 100 100" class="w-full h-full">
                    <path d="M50 10 L70 30 L70 70 L30 70 L30 30 Z" fill="none" stroke="#0D9488" stroke-width="1"/>
                    <circle cx="50" cy="40" r="8" fill="none" stroke="#D4AF37" stroke-width="1"/>
                    <text x="50" y="45" text-anchor="middle" font-size="12" fill="#0D9488" class="arabic-text">ف</text>
                </svg>
            </div>

            <div class="relative z-10">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <span class="text-2xl text-white arabic-text">ف</span>
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-4">Paket Umrah VIP</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Paket premium dengan fasilitas terbaik untuk pengalaman Umrah yang lebih eksklusif dan nyaman.
                </p>

                <div class="space-y-3 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Hotel bintang 5+ dengan view Ka'bah</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Private car dan VIP lounge</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Pendamping pribadi 24 jam</span>
                    </div>
                </div>

                <a href="#registration-form" class="group/btn inline-flex items-center gap-2 bg-gradient-to-r from-teal-600 to-cyan-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-teal-700 hover:to-cyan-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <span>Daftar Sekarang</span>
                    <span class="text-lg">→</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Islamic Quote Section -->
    <div class="text-center bg-gradient-to-r from-blue-50 via-amber-50 to-blue-50 rounded-3xl p-12 shadow-xl premium-card mb-16">
        <blockquote class="text-2xl md:text-3xl text-blue-800 font-medium arabic-text leading-relaxed mb-6">
            وَأَتِمُّوا الْحَجَّ وَالْعُمْرَةَ لِلَّهِ
        </blockquote>
        <cite class="text-lg text-blue-600 arabic-text font-semibold">
            — البقرة: ١٩٦
        </cite>
        <p class="text-gray-700 mt-6 max-w-2xl mx-auto">
            "Dan sempurnakanlah ibadah haji dan umrah karena Allah" - Mari bersama menyempurnakan ibadah Umrah kita.
        </p>
    </div>

    <div id="registration-form" class="max-w-2xl mx-auto px-6 py-10 elegant-fade-in">
        {{-- Header --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 arabic-text mb-4">Pendaftaran Umrah</h1>
            <div class="w-16 h-1 bg-gradient-to-r from-[var(--brand)] to-[var(--islamic-gold)] mx-auto mb-6"></div>
            <p class="mt-3 text-gray-600 max-w-lg mx-auto">
                Silakan isi formulir pendaftaran di bawah ini. Setelah selesai, tekan tombol
                <span class="font-semibold text-[var(--brand)]">"Kirim via WhatsApp"</span> untuk menghubungi admin pendaftaran.
            </p>
        </div>

    {{-- Form Card --}}
    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-100">
        <form id="regForm" class="grid gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input id="name" type="text" placeholder="Masukkan nama lengkap"
                       class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[var(--brand)] focus:outline-none" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                <select id="gender"
                        class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[var(--brand)] focus:outline-none">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Usia</label>
                <input id="age" type="number" placeholder="Contoh: 25"
                       class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[var(--brand)] focus:outline-none" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
                <input id="phone" type="tel" placeholder="Contoh: 081234567890"
                       class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[var(--brand)] focus:outline-none" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Paket</label>
                <select id="program"
                        class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[var(--brand)] focus:outline-none">
                    <option value="">-- Pilih Paket --</option>
                    <option>Paket Umrah Reguler</option>
                    <option>Paket Umrah VIP</option>
                </select>
            </div>

            <button type="button"
                    onclick="sendRegistration()"
                    class="mt-4 bg-[var(--brand)] text-white font-medium px-6 py-2.5 rounded-md hover:opacity-90 transition">
                📲 Kirim via WhatsApp
            </button>
        </form>
    </div>

    {{-- Note Section --}}
    <p class="mt-6 text-sm text-gray-500 text-center">
        Data Anda akan dikirim langsung ke admin pendaftaran melalui WhatsApp. Pastikan data sudah benar sebelum mengirim.
    </p>
</div>

{{-- JavaScript --}}
<script>
    const ADMIN_WHATSAPP = {!! json_encode(env('ADMIN_WHATSAPP', '6281234567890')) !!};

    function sendRegistration() {
        const name = document.getElementById('name').value.trim();
        const gender = document.getElementById('gender').value;
        const age = document.getElementById('age').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const program = document.getElementById('program').value;

        if (!name || !gender || !age || !phone || !program) {
            alert('Mohon lengkapi semua data terlebih dahulu.');
            return;
        }

        const text = encodeURIComponent(
`🕋 *Pendaftaran Umrah*
-----------------------------------
*Nama:* ${name}
*Jenis Kelamin:* ${gender}
*Usia:* ${age} tahun
*Nomor HP:* ${phone}
*Paket:* ${program}
-----------------------------------
Dikirim melalui formulir pendaftaran online.`
        );

        const url = `https://wa.me/${ADMIN_WHATSAPP}?text=${text}`;
        window.open(url, '_blank');
    }
</script>
@endsection
