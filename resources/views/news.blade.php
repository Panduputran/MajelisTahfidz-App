@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-16 elegant-fade-in">
    <!-- Header Section -->
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-6xl font-bold bg-gradient-to-r from-blue-800 via-blue-700 to-cyan-800 bg-clip-text text-transparent mb-6">
            Artikel
        </h1>
        <div class="w-32 h-1 bg-gradient-to-r from-blue-500 via-amber-400 to-blue-500 mx-auto mb-8 rounded-full"></div>
        <p class="text-xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
            Kumpulan berita kegiatan, artikel inspiratif tentang Al-Qur'an, Tahfidz, dan pembinaan akhlak islami.
        </p>
    </div>

    <!-- Search Form -->
    @if($query)
        <div class="mb-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
            <p class="text-blue-800">Menampilkan hasil pencarian untuk: <strong>"{{ $query }}"</strong></p>
            <a href="{{ route('news') }}" class="text-blue-600 hover:text-blue-500 text-sm">Tampilkan semua artikel</a>
        </div>
    @endif

    <!-- Articles Grid -->
    <div class="grid lg:grid-cols-3 gap-8 mb-16">
        @forelse($news as $article)
            <div class="premium-card group bg-white p-8 rounded-3xl shadow-xl border border-blue-100 hover:border-blue-300 transition-all duration-500 overflow-hidden relative">
                <!-- Islamic decorative background -->
                <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
                    <svg viewBox="0 0 100 100" class="w-full h-full">
                        <circle cx="50" cy="50" r="40" fill="none" stroke="#059669" stroke-width="1"/>
                        <circle cx="50" cy="50" r="25" fill="none" stroke="#D4AF37" stroke-width="1"/>
                        <text x="50" y="55" text-anchor="middle" font-size="16" fill="#059669" class="arabic-text">ح</text>
                    </svg>
                </div>

                <div class="relative z-10">
                    @if($article->image)
                        <div class="w-16 h-16 rounded-2xl overflow-hidden mb-6 shadow-lg">
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <span class="text-2xl text-white arabic-text">ح</span>
                        </div>
                    @endif

                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $article->title }}</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        {{ Str::limit($article->content, 150) }}
                    </p>

                    <div class="space-y-3 mb-8">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                            <span class="text-sm text-gray-700">{{ $article->category }}</span>
                        </div>
                        @if($article->author)
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span class="text-sm text-gray-700">Oleh: {{ $article->author }}</span>
                            </div>
                        @endif
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-amber-500 rounded-full"></div>
                            <span class="text-sm text-gray-700">{{ $article->created_at->format('d M Y') }}</span>
                        </div>
                    </div>

                    <a href="#read-more-{{ $article->id }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-full hover:from-blue-700 hover:to-blue-800 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Modal for full article -->
            <div id="read-more-{{ $article->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <h2 class="text-3xl font-bold text-gray-800">{{ $article->title }}</h2>
                            <button onclick="closeModal('read-more-{{ $article->id }}')" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-64 object-cover rounded-lg mb-6">
                        @endif

                        <div class="flex items-center gap-4 text-sm text-gray-600 mb-6">
                            @if($article->author)
                                <span>Oleh: <strong>{{ $article->author }}</strong></span>
                            @endif
                            <span>Kategori: <strong>{{ $article->category }}</strong></span>
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                        </div>

                        <div class="prose max-w-none">
                            {!! nl2br(e($article->content)) !!}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-medium text-gray-900 mb-2">Tidak ada artikel ditemukan</h3>
                <p class="text-gray-600">Belum ada artikel yang dipublikasikan.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($news->hasPages())
        <div class="flex justify-center">
            {{ $news->links() }}
        </div>
    @endif

    <!-- News Section -->
    <div class="grid lg:grid-cols-3 gap-8 mb-16">
        <div class="lg:col-span-2">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Berita Kegiatan</h2>

            <article class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 mb-6 hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Khataman Qur'an Bersama Santri</h3>
                <p class="text-sm text-gray-500 mb-4">📅 20 Okt 2025 &middot; Oleh Admin</p>
                <p class="text-gray-700 leading-relaxed">Keterangan singkat kegiatan khataman dan dokumentasi foto kegiatan.</p>
            </article>

            <article class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 mb-6 hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Santunan Anak Yatim dan Doa Bersama</h3>
                <p class="text-sm text-gray-500 mb-4">📅 10 Sep 2025 &middot; Oleh Panitia</p>
                <p class="text-gray-700 leading-relaxed">Ringkasan kegiatan sosial yang diselenggarakan oleh majlis.</p>
            </article>

            <article class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 mb-6 hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Wisuda Tahfidzul Quran</h3>
                <p class="text-sm text-gray-500 mb-4">📅 15 Nov 2025 &middot; Oleh Admin</p>
                <p class="text-gray-700 leading-relaxed">Kegiatan wisuda bagi santri yang telah menyelesaikan hafalan Al-Quran dengan baik.</p>
            </article>

            <article class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 mb-6 hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-xl font-bold text-gray-800 mb-3">Apakah Umrah Wajib? Pandangan Bertentangan</h3>
                <p class="text-sm text-gray-500 mb-4">📅 5 Feb 2026 &middot; Oleh Ustadz Hasan</p>
                <p class="text-gray-700 leading-relaxed">Diskusi tentang status hukum umrah dalam Islam. Umrah adalah ibadah sunnah yang sangat dianjurkan, bukan wajib seperti haji. Namun, ada pandangan yang berbeda di kalangan ulama tentang kewajiban umrah.</p>
            </article>
        </div>

        <aside class="lg:col-span-1">
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 sticky top-8">
                <form action="{{ route('news') }}" method="GET" class="mb-6">
                    <input name="q" placeholder="Cari artikel..." value="{{ $query ?? '' }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </form>

                <div>
                    <h4 class="font-bold text-gray-800 mb-4">Kategori</h4>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            Artikel Terbaru
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            Artikel Tahun 2024
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            Berita Kegiatan
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>

    <!-- Islamic Quote Section -->
    <div class="text-center bg-gradient-to-r from-blue-50 via-amber-50 to-blue-50 rounded-3xl p-12 shadow-xl premium-card">
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
</div>



<script>
function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

// Show modal when clicking read more
document.querySelectorAll('a[href^="#read-more"]').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const modalId = this.getAttribute('href').substring(1);
        document.getElementById(modalId).classList.remove('hidden');
    });
});
</script>
@endsection
