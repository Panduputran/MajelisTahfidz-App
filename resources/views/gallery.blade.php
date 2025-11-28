@extends('layouts.app')

@section('content')
<div class="overflow-hidden">

    {{-- 1. HERO HEADER (Modern & Clean) --}}
    <section class="relative py-16 md:py-24 text-center">
        <!-- Background Blobs (Konsisten dengan About/Welcome) -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full overflow-hidden pointer-events-none -z-10">
            <div class="absolute top-0 right-[5%] w-[400px] h-[400px] bg-blue-100/40 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
            <div class="absolute bottom-0 left-[5%] w-[400px] h-[400px] bg-emerald-100/40 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        </div>

        <div class="max-w-4xl mx-auto px-6 relative z-10 animate-fade-in">
            <span class="text-islamic-primary font-bold tracking-widest uppercase text-sm mb-2 block">Dokumentasi</span>
            
            <!-- Judul Arab Besar -->
            <h1 class="text-5xl md:text-7xl font-bold text-slate-800 font-serif mb-4 leading-tight">
                صُوَرُ الْمَجْلِسْ
            </h1>
            <p class="text-slate-500 font-medium mb-8">Galeri Kegiatan Majlis Tahfidz Syifa Lilmu'minin</p>
            
            <div class="w-24 h-1.5 bg-gradient-to-r from-islamic-primary to-islamic-secondary mx-auto mb-10 rounded-full"></div>

            <!-- Quote Card (Glassmorphism) -->
            <div class="max-w-2xl mx-auto bg-white/60 backdrop-blur-sm border border-white/50 p-6 rounded-2xl shadow-sm">
                <blockquote class="text-xl text-slate-700 font-serif leading-relaxed">
                    "Dan sebutlah (nama) Allah sebanyak-banyaknya agar kamu beruntung."
                </blockquote>
                <cite class="text-sm text-islamic-primary font-bold mt-3 block">
                    — QS. Al-Jumu'ah: 10
                </cite>
            </div>
        </div>
    </section>

    {{-- 2. GALLERY GRID --}}
    <section class="max-w-7xl mx-auto px-6 mb-24">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($gallery as $item)
                <!-- Gallery Card -->
                <div class="group relative bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-500 cursor-pointer h-[350px] border border-slate-100">
                    
                    <!-- Image with Zoom Effect -->
                    <div class="w-full h-full overflow-hidden">
                        @if($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" 
                                 alt="{{ $item->title }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        @else
                            <!-- Placeholder jika tidak ada gambar -->
                            <div class="w-full h-full bg-slate-100 flex flex-col items-center justify-center text-slate-300 group-hover:bg-slate-50 transition-colors">
                                <i class="fa-solid fa-image text-5xl mb-3"></i>
                                <span class="text-sm">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>

                    <!-- Overlay Gradient (Muncul saat hover/permanent text) -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-90 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <span class="inline-block px-3 py-1 bg-islamic-primary/90 text-white text-[10px] font-bold uppercase tracking-wider rounded-full mb-2">
                                Kegiatan
                            </span>
                            <h3 class="text-xl font-bold text-white mb-2 leading-tight">{{ $item->title }}</h3>
                            <p class="text-white/80 text-sm line-clamp-2 mb-3 font-light">
                                {{ Str::limit($item->description ?? 'Tidak ada deskripsi.', 100) }}
                            </p>
                            
                            @if(isset($item->published_at))
                                <div class="flex items-center gap-2 text-white/60 text-xs border-t border-white/20 pt-3">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State (Modern) -->
                <div class="col-span-full py-20 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-slate-50 mb-6">
                        <i class="fa-regular fa-images text-3xl text-slate-300"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-700 mb-2">Galeri Belum Tersedia</h3>
                    <p class="text-slate-500 max-w-md mx-auto">
                        Saat ini belum ada dokumentasi kegiatan yang diunggah. Silakan kembali lagi nanti.
                    </p>
                </div>
            @endforelse
        </div>

        {{-- Pagination (Jika ada) --}}
        @if(method_exists($gallery, 'links'))
            <div class="mt-12 flex justify-center">
                {{ $gallery->links() }}
            </div>
        @endif

    </section>

    {{-- 3. CTA SECTION --}}
    <section class="max-w-5xl mx-auto px-6 mb-20 text-center">
        <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl p-10 md:p-16 shadow-2xl relative overflow-hidden group">
            <!-- Decorative BG Icon -->
            <i class="fa-solid fa-camera absolute -right-10 -bottom-10 text-[150px] text-white/5 group-hover:text-white/10 transition-colors duration-500 rotate-12"></i>
            
            <div class="relative z-10">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-4 font-serif">Ingin Melihat Lebih Banyak?</h2>
                <p class="text-slate-300 mb-8 max-w-xl mx-auto">
                    Kunjungi media sosial kami untuk update kegiatan harian santri dan informasi terkini lainnya.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#" class="px-8 py-3 bg-white text-slate-900 font-bold rounded-full hover:bg-slate-100 transition-all shadow-lg flex items-center justify-center gap-2">
                        <i class="fa-brands fa-instagram text-pink-600"></i> Instagram
                    </a>
                    <a href="{{ route('contact') }}" class="px-8 py-3 bg-islamic-primary text-white font-bold rounded-full hover:bg-emerald-700 transition-all shadow-lg flex items-center justify-center gap-2">
                        <i class="fa-brands fa-whatsapp"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

<style>
    /* Custom Animations */
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
</style>
@endsection