@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16">
    <!-- Header Section -->
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-6xl font-bold bg-gradient-to-r from-blue-800 via-blue-700 to-cyan-800 bg-clip-text text-transparent mb-6">
            Travel Umrah
        </h1>
        <div class="w-32 h-1 bg-gradient-to-r from-blue-500 via-amber-400 to-blue-500 mx-auto mb-8 rounded-full"></div>
        <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
            Nikmati pengalaman spiritual yang tak terlupakan dengan paket Travel Umrah kami yang lengkap dan terpercaya. Dari persiapan hingga kembali ke tanah air, kami siap mendampingi perjalanan ibadah Anda.
        </p>
    </div>

    <!-- Programs Grid -->
    <div class="grid lg:grid-cols-3 gap-8 mb-16">
        {{-- Paket Umrah Ekonomis --}}
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

                <h2 class="text-2xl font-bold text-gray-800 mb-4">Paket Umrah Ekonomis</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Paket umrah dengan fasilitas lengkap namun tetap terjangkau. Cocok untuk jamaah yang menginginkan kenyamanan tanpa menguras kantong.
                </p>

                <div class="space-y-3 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Hotel berbintang 3-4 di Makkah & Madinah</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Penerbangan langsung</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Muthawwif profesional</span>
                    </div>
                </div>

                <div class="text-center mb-6">
                    <div class="text-3xl font-bold text-emerald-600 mb-2">Rp 28.000.000</div>
                    <div class="text-sm text-gray-500">per orang (sudah termasuk visa)</div>
                </div>

                <a href="#contact-form" class="group/btn inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-emerald-700 hover:to-teal-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <span>Info & Daftar</span>
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
                    Pengalaman umrah premium dengan akomodasi bintang 5, transportasi eksklusif, dan pelayanan 24 jam untuk kenyamanan maksimal.
                </p>

                <div class="space-y-3 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Hotel bintang 5 di area Masjidilharam</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Private transport & VIP lounge</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Muthawwif & guide pribadi</span>
                    </div>
                </div>

                <div class="text-center mb-6">
                    <div class="text-3xl font-bold text-teal-600 mb-2">Rp 45.000.000</div>
                    <div class="text-sm text-gray-500">per orang (sudah termasuk visa)</div>
                </div>

                <a href="#contact-form" class="group/btn inline-flex items-center gap-2 bg-gradient-to-r from-teal-600 to-cyan-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-teal-700 hover:to-cyan-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <span>Info & Daftar</span>
                    <span class="text-lg">→</span>
                </a>
            </div>
        </div>

        {{-- Paket Umrah Plus Ziarah --}}
        <div class="premium-card group bg-white p-8 rounded-3xl shadow-xl border border-cyan-100 hover:border-cyan-300 transition-all duration-500 overflow-hidden relative">
            <!-- Islamic decorative background -->
            <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
                <svg viewBox="0 0 100 100" class="w-full h-full">
                    <path d="M20 50 Q50 20 80 50 Q50 80 20 50" fill="none" stroke="#0891B2" stroke-width="2"/>
                    <circle cx="50" cy="50" r="15" fill="none" stroke="#D4AF37" stroke-width="1"/>
                    <text x="50" y="55" text-anchor="middle" font-size="14" fill="#0891B2" class="arabic-text">ز</text>
                </svg>
            </div>

            <div class="relative z-10">
                <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <span class="text-2xl text-white arabic-text">ز</span>
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-4">Umrah + Ziarah</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Paket lengkap umrah dengan tambahan ziarah ke makam para sahabat, tempat bersejarah, dan wisata religi di sekitar Makkah dan Madinah.
                </p>

                <div class="space-y-3 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-cyan-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Ziarah ke makam sahabat & tempat bersejarah</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-cyan-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Hotel bintang 4-5</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 bg-cyan-500 rounded-full"></div>
                        <span class="text-sm text-gray-700">Durasi 14-16 hari</span>
                    </div>
                </div>

                <div class="text-center mb-6">
                    <div class="text-3xl font-bold text-cyan-600 mb-2">Rp 38.000.000</div>
                    <div class="text-sm text-gray-500">per orang (sudah termasuk visa)</div>
                </div>

                <a href="#contact-form" class="group/btn inline-flex items-center gap-2 bg-gradient-to-r from-cyan-600 to-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-cyan-700 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <span>Info & Daftar</span>
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
            "Dan sempurnakanlah ibadah haji dan umrah karena Allah" - Mari bersama menyempurnakan ibadah umrah dengan penuh khusyuk dan berkah.
        </p>
    </div>

    <div id="contact-form" class="max-w-2xl mx-auto px-6 py-10 elegant-fade-in">
        {{-- Header --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 arabic-text mb-4">Info & Pendaftaran Travel Umrah</h1>
            <div class="w-16 h-1 bg-gradient-to-r from-[var(--brand)] to-[var(--islamic-gold)] mx-auto mb-6"></div>
            <p class="mt-3 text-gray-600 max-w-lg mx-auto">
                Isi formulir di bawah ini untuk mendapatkan informasi lengkap tentang paket Travel Umrah kami. Tim kami akan segera menghubungi Anda.
            </p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-100">
            <form id="umrahForm" class="grid gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input id="umrah-name" type="text" placeholder="Masukkan nama lengkap"
                           class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[var(--brand)] focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
                    <input id="umrah-phone" type="tel" placeholder="Contoh: 081234567890"
                           class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[var(--brand)] focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="umrah-email" type="email" placeholder="Contoh: nama@email.com"
                           class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[var(--brand)] focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Jamaah</label>
                    <select id="umrah-jamaah"
                            class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[var(--brand)] focus:outline-none">
                        <option value="">-- Pilih Jumlah --</option>
                        <option value="1">1 orang</option>
                        <option value="2">2 orang</option>
                        <option value="3">3 orang</option>
                        <option value="4">4 orang</option>
                        <option value="5+">5 orang atau lebih</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Paket yang Diminati</label>
                    <select id="umrah-package"
                            class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[var(--brand)] focus:outline-none">
                        <option value="">-- Pilih Paket --</option>
                        <option value="Paket Umrah Ekonomis">Paket Umrah Ekonomis</option>
                        <option value="Paket Umrah VIP">Paket Umrah VIP</option>
                        <option value="Umrah + Ziarah">Umrah + Ziarah</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pesan Tambahan</label>
                    <textarea id="umrah-message" rows="3" placeholder="Pertanyaan atau permintaan khusus..."
                              class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[var(--brand)] focus:outline-none resize-none"></textarea>
                </div>

                <button type="button"
                        onclick="sendUmrahInquiry()"
                        class="mt-4 bg-[var(--brand)] text-white font-medium px-6 py-2.5 rounded-md hover:opacity-90 transition">
                    📲 Kirim via WhatsApp
                </button>
            </form>
        </div>

        {{-- Note Section --}}
        <p class="mt-6 text-sm text-gray-500 text-center">
            Data Anda akan dikirim langsung ke tim Travel Umrah kami melalui WhatsApp. Kami akan memberikan informasi detail dan konfirmasi selanjutnya.
        </p>
    </div>
</div>

{{-- JavaScript --}}
<script>
    const UMRAH_ADMIN_WHATSAPP = {!! json_encode(env('ADMIN_WHATSAPP', '6281234567890')) !!};

    function sendUmrahInquiry() {
        const name = document.getElementById('umrah-name').value.trim();
        const phone = document.getElementById('umrah-phone').value.trim();
        const email = document.getElementById('umrah-email').value.trim();
        const jamaah = document.getElementById('umrah-jamaah').value;
        const package = document.getElementById('umrah-package').value;
        const message = document.getElementById('umrah-message').value.trim();

        if (!name || !phone || !email || !jamaah || !package) {
            alert('Mohon lengkapi semua data wajib terlebih dahulu.');
            return;
        }

        const text = encodeURIComponent(
`🕋 *Inquiry Travel Umrah*
-----------------------------------
*Nama:* ${name}
*No. HP:* ${phone}
*Email:* ${email}
*Jumlah Jamaah:* ${jamaah}
*Paket:* ${package}
*Pesan:* ${message || 'Tidak ada pesan tambahan'}
-----------------------------------
Dikirim melalui formulir inquiry online.`
        );

        const url = `https://wa.me/${UMRAH_ADMIN_WHATSAPP}?text=${text}`;
        window.open(url, '_blank');
    }
</script>
@endsection
