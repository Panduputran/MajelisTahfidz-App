@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16 relative bg-gradient-to-br from-blue-50 via-white to-cyan-50">
    <!-- Highly visible Background floating decorative shapes -->
    <div aria-hidden="true">
        <div class="absolute top-10 left-10 w-32 h-32 bg-gradient-to-r from-emerald-400 to-teal-600 rounded-full opacity-50 animate-blob animation-delay-1500 filter blur-xl"></div>
        <div class="absolute top-20 right-10 w-40 h-40 bg-gradient-to-r from-blue-400 to-cyan-600 rounded-full opacity-50 animate-blob animate-reverse animation-delay-3000 filter blur-xl"></div>
        <div class="absolute bottom-10 left-1/2 w-56 h-56 bg-gradient-to-r from-amber-400 to-yellow-500 rounded-full opacity-50 animate-blob animation-delay-4500 filter blur-xl"></div>
    </div>

    <!-- Header Section -->
    <div class="text-center mb-16 relative z-10">
        <h1 class="text-4xl md:text-6xl font-bold bg-gradient-to-r from-blue-800 via-blue-700 to-cyan-800 bg-clip-text text-transparent mb-6">
            Majelis Tahfidz
        </h1>
        <div class="w-32 h-1 bg-gradient-to-r from-blue-500 via-amber-400 to-blue-500 mx-auto mb-8 rounded-full"></div>
        <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
            Bergabunglah dengan program tahfidz kami yang telah terbukti berhasil membentuk penghafal Al-Qur'an yang berkualitas. Dari anak-anak hingga dewasa, kami siap mendampingi perjalanan menghafal Al-Qur'an Anda.
        </p>
    </div>

    <!-- Programs Grid -->
    <div class="grid lg:grid-cols-3 gap-8 mb-16">
        {{-- Program Tahfidz Harian --}}
        <div class="premium-card group bg-white p-8 rounded-3xl shadow-xl border border-blue-100 hover:border-blue-300 transition-all duration-500 overflow-hidden relative">
            <!-- Islamic decorative background -->
            <div class="absolute top-0 right-0 w-32 h-32 opacity-10">
                <svg viewBox="0 0 100 100" class="w-full h-full animate-spin-slow">
                    <circle cx="50" cy="50" r="40" fill="none" stroke="#04AA6D" stroke-width="3"/>
                    <circle cx="50" cy="50" r="25" fill="none" stroke="#DAA520" stroke-width="2"/>
                    <text x="50" y="55" text-anchor="middle" font-size="20" fill="#04AA6D" class="arabic-text">ح</text>
                </svg>
            </div>

            <div class="relative z-10">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <span class="text-2xl text-white arabic-text">ح</span>
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-4">Tahfidz Harian</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Program penghafalan Al-Qur'an setiap hari dengan metode yang efektif dan menyenangkan, disesuaikan dengan kemampuan masing-masing.
                </p>

                <div class="space-y-3 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Target hafalan 1-2 halaman per hari</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Muraja'ah (pengulangan) rutin</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Pembinaan tajwid dan makhorijul huruf</span>
                    </div>
                </div>

<a href="#registration-form" class="group/btn inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-emerald-700 hover:to-teal-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-110 animate-pulse animate-bounce">
    <span class="animate-pulse">Pendaftaran Sekarang</span>
    <span class="text-lg animate-bounce">→</span>
</a>
            </div>
        </div>

        {{-- Program Santri Boarding --}}
        <div class="premium-card group bg-white p-8 rounded-3xl shadow-xl border border-teal-100 hover:border-teal-300 transition-all duration-500 overflow-hidden relative">
            <!-- Islamic decorative background -->
            <div class="absolute top-0 right-0 w-32 h-32 opacity-10">
                <svg viewBox="0 0 100 100" class="w-full h-full animate-spin-slow animate-reverse">
                    <path d="M50 10 L70 30 L70 70 L30 70 L30 30 Z" fill="none" stroke="#0D9488" stroke-width="2"/>
                    <circle cx="50" cy="40" r="8" fill="none" stroke="#DAA520" stroke-width="2"/>
                    <text x="50" y="45" text-anchor="middle" font-size="20" fill="#0D9488" class="arabic-text">ص</text>
                </svg>
            </div>

            <div class="relative z-10">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <span class="text-2xl text-white arabic-text">ص</span>
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-4">Santri Boarding</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Program asrama lengkap dengan pengajaran Al-Qur'an intensif dan pembinaan akhlak yang komprehensif.
                </p>

                <div class="space-y-3 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Pengajaran 24 jam penuh</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Asrama nyaman dan aman</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Pembinaan karakter islami</span>
                    </div>
                </div>

<a href="#registration-form" class="group/btn inline-flex items-center gap-2 bg-gradient-to-r from-teal-600 to-cyan-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-teal-700 hover:to-cyan-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-110 animate-pulse animate-bounce">
    <span class="animate-pulse">Pendaftaran Sekarang</span>
    <span class="text-lg animate-bounce">→</span>
</a>
            </div>
        </div>

        {{-- Program Tahsin dan Tajwid --}}
        <div class="premium-card group bg-white p-8 rounded-3xl shadow-xl border border-cyan-100 hover:border-cyan-300 transition-all duration-500 overflow-hidden relative">
            <!-- Islamic decorative background -->
            <div class="absolute top-0 right-0 w-32 h-32 opacity-10">
                <svg viewBox="0 0 100 100" class="w-full h-full animate-spin-slow">
                    <path d="M20 50 Q50 20 80 50 Q50 80 20 50" fill="none" stroke="#0891B2" stroke-width="3"/>
                    <circle cx="50" cy="50" r="15" fill="none" stroke="#DAA520" stroke-width="2"/>
                    <text x="50" y="55" text-anchor="middle" font-size="20" fill="#0891B2" class="arabic-text">ت</text>
                </svg>
            </div>

            <div class="relative z-10">
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <span class="text-2xl text-white arabic-text">ت</span>
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-4">Tahsin & Tajwid</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Program perbaikan bacaan Al-Qur'an dengan fokus pada tajwid yang benar dan kelancaran membaca.
                </p>

                <div class="space-y-3 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-cyan-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Korreksi bacaan tajwid</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-cyan-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Latihan kelancaran</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-cyan-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Pembelajaran makhorijul huruf</span>
                    </div>
                </div>

<a href="#registration-form" class="group/btn inline-flex items-center gap-2 bg-gradient-to-r from-cyan-600 to-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-cyan-700 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-110 animate-pulse animate-bounce">
    <span class="animate-pulse">Pendaftaran Sekarang</span>
    <span class="text-lg animate-bounce">→</span>
</a>
            </div>
        </div>
    </div>

    <!-- Islamic Quote Section -->
    <div class="text-center bg-gradient-to-r from-blue-50 via-amber-50 to-blue-50 rounded-3xl p-12 shadow-xl premium-card mb-16 animate-pulse">
        <blockquote class="text-2xl md:text-3xl text-blue-800 font-medium arabic-text leading-relaxed mb-6">
            وَرَتِّلِ الْقُرْآنَ تَرْتِيلًا
        </blockquote>
        <cite class="text-lg text-blue-600 arabic-text font-semibold">
            — المزمل: ٤
        </cite>
        <p class="text-gray-700 mt-6 max-w-2xl mx-auto">
            "Dan bacalah Al-Qur'an dengan tartil (perlahan-lahan dan jelas)" - Bergabunglah dengan program kami untuk mempelajari bacaan Al-Qur'an yang benar dan indah.
        </p>
    </div>

    <div id="registration-form" class="max-w-2xl mx-auto px-6 py-10 elegant-fade-in">
        {{-- Header --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 arabic-text mb-4">Pendaftaran Tahfidz Baru</h1>
            <div class="w-16 h-1 bg-gradient-to-r from-[var(--brand)] to-[var(--islamic-gold)] mx-auto mb-6"></div>
            <p class="mt-3 text-gray-600 max-w-lg mx-auto">
                Silakan isi formulir pendaftaran di bawah ini. Setelah selesai, tekan tombol
                <span class="font-semibold text-[var(--brand)]">"Kirim via WhatsApp"</span> untuk menghubungi admin pendaftaran.
            </p>
        </div>

    {{-- Form Card --}}
    <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 relative overflow-hidden">
        <div aria-hidden="true" class="absolute top-0 right-0 w-28 h-28 bg-gradient-to-tr from-emerald-400 to-teal-700 rounded-full opacity-40 animate-blob animation-delay-3000 filter blur-lg"></div>
        <div aria-hidden="true" class="absolute bottom-0 left-0 w-28 h-28 bg-gradient-to-bl from-amber-400 to-yellow-500 rounded-full opacity-40 animate-blob animation-delay-4500 filter blur-lg"></div>
        <form id="regForm" class="grid gap-5 relative">
            <div>
                <label class="block text-sm font-bold text-gray-800 mb-2">Nama Lengkap</label>
                <input id="name" type="text" placeholder="Masukkan nama lengkap"
                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-4 focus:ring-emerald-400 focus:outline-none transition-transform duration-500 focus:scale-110" />
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-800 mb-2">Jenis Kelamin</label>
                <select id="gender"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-4 focus:ring-emerald-400 focus:outline-none">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-800 mb-2">Usia</label>
                <input id="age" type="number" placeholder="Contoh: 12"
                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-4 focus:ring-emerald-400 focus:outline-none" />
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-800 mb-2">Nomor HP Orang Tua</label>
                <input id="phone" type="tel" placeholder="Contoh: 081234567890"
                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-4 focus:ring-emerald-400 focus:outline-none" />
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-800 mb-2">Pilih Program</label>
                <select id="program"
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-4 focus:ring-emerald-400 focus:outline-none">
                    <option value="">-- Pilih Program --</option>
                    <option>Program Tahfidz Harian</option>
                    <option>Program Santri Boarding</option>
                    <option>Program Tahsin dan Tajwid</option>
                </select>
            </div>

            <button type="button"
                    onclick="sendRegistration()"
                    class="mt-6 bg-[var(--brand)] text-white font-semibold text-lg px-8 py-3 rounded-lg shadow-lg transform transition duration-300 hover:scale-110 hover:shadow-xl animate-pulse">
                📲 Kirim via WhatsApp
            </button>
        </form>
    </div>

    {{-- Note Section --}}
    <p class="mt-6 text-sm text-gray-500 text-center">
        Data Anda akan dikirim langsung ke admin pendaftaran melalui WhatsApp. Pastikan data sudah benar sebelum mengirim.
    </p>
</div>

<div class="fixed bottom-8 right-8 z-50">
    <a href="#registration-form" class="inline-block bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-8 py-4 rounded-full font-black text-xl shadow-2xl hover:from-emerald-700 hover:to-teal-700 transform transition duration-300 hover:scale-125 animate-pulse animate-bounce">
        Daftar Sekarang
    </a>
</div>

<style>
@keyframes blob {
  0%, 100% {
    transform: translate(0px, 0px) scale(1);
  }
  33% {
    transform: translate(15px, -15px) scale(1.2);
  }
  66% {
    transform: translate(-15px, 15px) scale(0.8);
  }
}
.animate-blob {
  animation: blob 7s infinite;
}
.animate-spin-slow {
  animation: spin 20s linear infinite;
}
.animate-reverse {
  animation-direction: reverse;
}
</style>

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
`🕌 *Pendaftaran Santri Baru*
-----------------------------------
*Nama:* ${name}
*Jenis Kelamin:* ${gender}
*Usia:* ${age} tahun
*Nomor HP Orang Tua:* ${phone}
*Program:* ${program}
-----------------------------------
Dikirim melalui formulir pendaftaran online.`
        );

        const url = `https://wa.me/${ADMIN_WHATSAPP}?text=${text}`;
        window.open(url, '_blank');
    }
</script>
@endsection
