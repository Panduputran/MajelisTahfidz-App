@extends('layouts.app')

@section('content')
<div class="space-y-12">
    {{-- HERO SECTION --}}
    <section class="relative bg-gradient-to-br from-islamic-cream via-white to-islamic-cream rounded-2xl p-8 md:p-12 shadow-xl border border-islamic-primary/20 overflow-hidden">
        <div class="absolute inset-0 islamic-pattern opacity-30"></div>
        <div class="relative z-10">
            <div class="text-center mb-8">
                <h1 class="text-4xl md:text-5xl font-bold text-islamic-primary mb-4 arabic-text calligraphy-glow">
                    Toko Kurma
                </h1>
                <p class="text-lg text-islamic-primary/80 max-w-2xl mx-auto leading-relaxed">
                    Nikmati kurma pilihan berkualitas tinggi dari berbagai varietas terbaik. Kurma yang menyegarkan jiwa dan memberikan energi untuk ibadah Anda.
                </p>
            </div>

            {{-- FEATURE HIGHLIGHTS --}}
            <div class="grid md:grid-cols-3 gap-6 mt-8">
                <div class="text-center p-6 bg-white/50 rounded-xl backdrop-blur-sm border border-islamic-primary/10">
                    <div class="w-16 h-16 bg-gradient-to-br from-islamic-primary to-islamic-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-islamic-primary mb-2">Berkualitas Premium</h3>
                    <p class="text-sm text-islamic-primary/70">Kurma pilihan dari petani terpercaya dengan standar kualitas tinggi</p>
                </div>

                <div class="text-center p-6 bg-white/50 rounded-xl backdrop-blur-sm border border-islamic-primary/10">
                    <div class="w-16 h-16 bg-gradient-to-br from-islamic-primary to-islamic-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-islamic-primary mb-2">Pengiriman Cepat</h3>
                    <p class="text-sm text-islamic-primary/70">Layanan pengiriman yang cepat dan aman ke seluruh Indonesia</p>
                </div>

                <div class="text-center p-6 bg-white/50 rounded-xl backdrop-blur-sm border border-islamic-primary/10">
                    <div class="w-16 h-16 bg-gradient-to-br from-islamic-primary to-islamic-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-islamic-primary mb-2">Halal & Sehat</h3>
                    <p class="text-sm text-islamic-primary/70">Kurma yang halal, sehat, dan baik untuk kesehatan tubuh</p>
                </div>
            </div>
        </div>
    </section>

    {{-- PRODUCTS SECTION --}}
    <section class="space-y-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-islamic-primary mb-4">Koleksi Kurma Kami</h2>
            <p class="text-islamic-primary/70 max-w-2xl mx-auto">
                Pilih kurma favorit Anda dari berbagai varietas berkualitas dengan harga terbaik
            </p>
        </div>

        {{-- PRODUCT GRID --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- PRODUCT CARD 1 --}}
            <div class="premium-card bg-white rounded-2xl shadow-lg border border-islamic-primary/10 overflow-hidden group">
                <div class="relative h-64 bg-gradient-to-br from-islamic-cream to-white flex items-center justify-center">
                    <div class="text-6xl">🌴</div>
                    <div class="absolute top-4 right-4 bg-islamic-secondary text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Terlaris
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-islamic-primary mb-2">Kurma Ajwa</h3>
                    <p class="text-islamic-primary/70 mb-4 text-sm">
                        Kurma premium dari Madinah dengan rasa manis alami dan nutrisi tinggi. Baik untuk kesehatan jantung dan pencernaan.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-2xl font-bold text-islamic-secondary">Rp 250.000</div>
                        <div class="text-sm text-islamic-primary/60">/ kg</div>
                    </div>
                    <button class="w-full bg-gradient-to-r from-islamic-primary to-islamic-secondary text-white py-3 px-6 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>

            {{-- PRODUCT CARD 2 --}}
            <div class="premium-card bg-white rounded-2xl shadow-lg border border-islamic-primary/10 overflow-hidden group">
                <div class="relative h-64 bg-gradient-to-br from-islamic-cream to-white flex items-center justify-center">
                    <div class="text-6xl">🥭</div>
                    <div class="absolute top-4 right-4 bg-islamic-primary text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Populer
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-islamic-primary mb-2">Kurma Medjool</h3>
                    <p class="text-islamic-primary/70 mb-4 text-sm">
                        Kurma besar dan juicy dari Maroko. Kaya akan serat dan mineral yang baik untuk kesehatan tulang.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-2xl font-bold text-islamic-secondary">Rp 180.000</div>
                        <div class="text-sm text-islamic-primary/60">/ kg</div>
                    </div>
                    <button class="w-full bg-gradient-to-r from-islamic-primary to-islamic-secondary text-white py-3 px-6 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>

            {{-- PRODUCT CARD 3 --}}
            <div class="premium-card bg-white rounded-2xl shadow-lg border border-islamic-primary/10 overflow-hidden group">
                <div class="relative h-64 bg-gradient-to-br from-islamic-cream to-white flex items-center justify-center">
                    <div class="text-6xl">🍯</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-islamic-primary mb-2">Kurma Sukkari</h3>
                    <p class="text-islamic-primary/70 mb-4 text-sm">
                        Kurma manis seperti madu dari Tunisia. Cocok untuk camilan sehat dan memberikan energi instan.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-2xl font-bold text-islamic-secondary">Rp 150.000</div>
                        <div class="text-sm text-islamic-primary/60">/ kg</div>
                    </div>
                    <button class="w-full bg-gradient-to-r from-islamic-primary to-islamic-secondary text-white py-3 px-6 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>

            {{-- PRODUCT CARD 4 --}}
            <div class="premium-card bg-white rounded-2xl shadow-lg border border-islamic-primary/10 overflow-hidden group">
                <div class="relative h-64 bg-gradient-to-br from-islamic-cream to-white flex items-center justify-center">
                    <div class="text-6xl">🌟</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-islamic-primary mb-2">Kurma Khalas</h3>
                    <p class="text-islamic-primary/70 mb-4 text-sm">
                        Kurma premium dari Arab Saudi dengan tekstur lembut dan rasa yang sempurna.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-2xl font-bold text-islamic-secondary">Rp 200.000</div>
                        <div class="text-sm text-islamic-primary/60">/ kg</div>
                    </div>
                    <button class="w-full bg-gradient-to-r from-islamic-primary to-islamic-secondary text-white py-3 px-6 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>

            {{-- PRODUCT CARD 5 --}}
            <div class="premium-card bg-white rounded-2xl shadow-lg border border-islamic-primary/10 overflow-hidden group">
                <div class="relative h-64 bg-gradient-to-br from-islamic-cream to-white flex items-center justify-center">
                    <div class="text-6xl">✨</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-islamic-primary mb-2">Kurma Barhi</h3>
                    <p class="text-islamic-primary/70 mb-4 text-sm">
                        Kurma segar dengan rasa manis alami. Kaya akan vitamin dan mineral penting.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-2xl font-bold text-islamic-secondary">Rp 220.000</div>
                        <div class="text-sm text-islamic-primary/60">/ kg</div>
                    </div>
                    <button class="w-full bg-gradient-to-r from-islamic-primary to-islamic-secondary text-white py-3 px-6 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>

            {{-- PRODUCT CARD 6 --}}
            <div class="premium-card bg-white rounded-2xl shadow-lg border border-islamic-primary/10 overflow-hidden group">
                <div class="relative h-64 bg-gradient-to-br from-islamic-cream to-white flex items-center justify-center">
                    <div class="text-6xl">🌿</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-islamic-primary mb-2">Kurma Organik Mix</h3>
                    <p class="text-islamic-primary/70 mb-4 text-sm">
                        Campuran kurma organik pilihan dari berbagai negara. Paket hemat untuk keluarga.
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-2xl font-bold text-islamic-secondary">Rp 300.000</div>
                        <div class="text-sm text-islamic-primary/60">/ 2kg</div>
                    </div>
                    <button class="w-full bg-gradient-to-r from-islamic-primary to-islamic-secondary text-white py-3 px-6 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- WHY CHOOSE US SECTION --}}
    <section class="bg-gradient-to-r from-islamic-primary/5 to-islamic-secondary/5 rounded-2xl p-8 md:p-12">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-islamic-primary mb-4">Mengapa Memilih Kami?</h2>
            <p class="text-islamic-primary/70 max-w-2xl mx-auto">
                Kami berkomitmen untuk memberikan pengalaman berbelanja kurma yang terbaik dengan standar kualitas tertinggi
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-gradient-to-br from-islamic-primary to-islamic-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-islamic-primary mb-2">100% Halal</h3>
                <p class="text-sm text-islamic-primary/70">Semua produk kami bersertifikat halal dan sesuai syariat Islam</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-gradient-to-br from-islamic-primary to-islamic-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-islamic-primary mb-2">Garansi Kualitas</h3>
                <p class="text-sm text-islamic-primary/70">Kami jamin kepuasan Anda atau uang kembali 100%</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-gradient-to-br from-islamic-primary to-islamic-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-islamic-primary mb-2">Pengiriman Gratis</h3>
                <p class="text-sm text-islamic-primary/70">Gratis ongkos kirim untuk pembelian minimal Rp 500.000</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-gradient-to-br from-islamic-primary to-islamic-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-islamic-primary mb-2">Konsultasi Gratis</h3>
                <p class="text-sm text-islamic-primary/70">Konsultasi dengan ahli gizi tentang manfaat kurma</p>
            </div>
        </div>
    </section>

    {{-- CONTACT SECTION --}}
    <section class="bg-white rounded-2xl p-8 md:p-12 shadow-xl border border-islamic-primary/10">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-islamic-primary mb-4">Hubungi Kami</h2>
            <p class="text-islamic-primary/70 max-w-2xl mx-auto">
                Ada pertanyaan tentang produk kami? Kami siap membantu Anda dengan informasi yang dibutuhkan
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-islamic-primary to-islamic-secondary rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-islamic-primary mb-1">Telepon</h3>
                        <p class="text-islamic-primary/70">+62 812-3456-7890</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-islamic-primary to-islamic-secondary rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-islamic-primary mb-1">Email</h3>
                        <p class="text-islamic-primary/70">shop@majlistahfidz.com</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-islamic-primary to-islamic-secondary rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-islamic-primary mb-1">Alamat</h3>
                        <p class="text-islamic-primary/70">Jl. Al-Qur'an No. 123, Jakarta Pusat</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-islamic-cream/50 to-white p-6 rounded-xl border border-islamic-primary/10">
                <h3 class="font-semibold text-islamic-primary mb-4">Kirim Pesan</h3>
                <form class="space-y-4">
                    <div>
                        <input type="text" placeholder="Nama Anda" class="w-full px-4 py-3 rounded-lg border border-islamic-primary/20 focus:border-islamic-primary focus:outline-none transition-colors">
                    </div>
                    <div>
                        <input type="email" placeholder="Email Anda" class="w-full px-4 py-3 rounded-lg border border-islamic-primary/20 focus:border-islamic-primary focus:outline-none transition-colors">
                    </div>
                    <div>
                        <textarea rows="4" placeholder="Pesan Anda" class="w-full px-4 py-3 rounded-lg border border-islamic-primary/20 focus:border-islamic-primary focus:outline-none transition-colors resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-islamic-primary to-islamic-secondary text-white py-3 px-6 rounded-lg font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
