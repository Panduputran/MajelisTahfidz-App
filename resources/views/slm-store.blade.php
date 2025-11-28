@extends('layouts.app')

@section('content')
<div class="space-y-12">
    {{-- HERO SECTION --}}
    <section class="relative bg-gradient-to-br from-blue-50 via-white to-blue-50 rounded-2xl p-8 md:p-12 shadow-xl border border-blue-200 overflow-hidden">
        <div class="absolute inset-0 islamic-pattern opacity-30"></div>
        <div class="relative z-10">
            <div class="text-center mb-8">
                <h1 class="text-4xl md:text-5xl font-bold text-blue-800 mb-4 arabic-text calligraphy-glow">
                    SLM Store
                </h1>
                <p class="text-lg text-blue-700 max-w-2xl mx-auto leading-relaxed">
                    Toko resmi Majlis Tahfidz Al-Qur'an Syifa Lilmu'minin. Temukan berbagai produk berkualitas untuk mendukung perjalanan tahfidz Anda.
                </p>
            </div>

            {{-- FEATURE HIGHLIGHTS --}}
            <div class="grid md:grid-cols-3 gap-6 mt-8">
                <div class="text-center p-6 bg-white/50 rounded-xl backdrop-blur-sm border border-blue-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-blue-800 mb-2">Produk Berkualitas</h3>
                    <p class="text-sm text-blue-600">Semua produk melalui seleksi ketat untuk memastikan kualitas terbaik</p>
                </div>

                <div class="text-center p-6 bg-white/50 rounded-xl backdrop-blur-sm border border-blue-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-blue-800 mb-2">Pengiriman Cepat</h3>
                    <p class="text-sm text-blue-600">Layanan pengiriman yang cepat dan aman ke seluruh Indonesia</p>
                </div>

                <div class="text-center p-6 bg-white/50 rounded-xl backdrop-blur-sm border border-blue-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-blue-800 mb-2">Garansi Kepuasan</h3>
                    <p class="text-sm text-blue-600">Kami jamin kepuasan Anda atau uang kembali 100%</p>
                </div>
            </div>
        </div>
    </section>

    {{-- PRODUCTS SECTION --}}
    <section class="space-y-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-blue-800 mb-4">Katalog Produk</h2>
            <p class="text-blue-600 max-w-2xl mx-auto">
                Pilih produk favorit Anda dari berbagai kategori yang tersedia
            </p>
        </div>

        {{-- Cart Section --}}
        @php
            $cart = Session::get('cart', []);
            $cartCount = array_sum($cart);
        @endphp
        <div class="flex items-center justify-end mb-6 gap-2">
            <a href="{{ route('cart.index') }}" class="relative flex items-center gap-2 px-4 py-2 rounded-lg text-blue-800 bg-blue-100 hover:bg-blue-200 transition duration-300 shadow-md font-semibold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13l-1.1 5M7 13h10m0 0v8a2 2 0 01-2 2H9a2 2 0 01-2-2v-8"></path>
                </svg>
                <span>Keranjang</span>
                @if($cartCount > 0)
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold">
                        {{ $cartCount }}
                    </span>
                @endif
            </a>
        </div>

        {{-- PRODUCT CATEGORIES --}}
        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <button class="category-btn active bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300" data-category="all">
                Semua Produk
            </button>
            <button class="category-btn bg-white text-blue-800 px-6 py-3 rounded-xl font-semibold border border-blue-200 hover:bg-blue-50 transition-all duration-300" data-category="dates">
                Kurma
            </button>
        </div>

        {{-- PRODUCT GRID --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($products as $product)
            {{-- PRODUCT CARD --}}
            <div class="product-card premium-card bg-white rounded-2xl shadow-lg border border-blue-200 overflow-hidden group" data-category="{{ $product->category }}">
                <div class="relative h-64 bg-gradient-to-br from-blue-50 to-white flex items-center justify-center">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="text-6xl">{{ $product->category === 'dates' ? '🍇' : '📦' }}</div>
                    @endif
                    @if($product->stock > 0)
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Tersedia
                        </div>
                    @else
                        <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Habis
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-blue-800 mb-2">{{ $product->name }}</h3>
                    <p class="text-blue-600 mb-4 text-sm">
                        {{ $product->description }}
                    </p>
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-2xl font-bold text-blue-700">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    </div>
                    @if($product->stock > 0)
                        <button class="add-to-cart-btn w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 px-6 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105"
                                data-product-id="{{ $product->id }}"
                                data-product-name="{{ $product->name }}">
                            Tambah ke Keranjang
                        </button>
                    @else
                        <button class="w-full bg-gray-400 text-white py-3 px-6 rounded-xl font-semibold cursor-not-allowed" disabled>
                            Stok Habis
                        </button>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <div class="text-6xl mb-4">📦</div>
                <h3 class="text-xl font-bold text-blue-800 mb-2">Produk Tidak Tersedia</h3>
                <p class="text-blue-600">Maaf, saat ini tidak ada produk yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </section>

    {{-- WHY CHOOSE US SECTION --}}
    <section class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-2xl p-8 md:p-12">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-blue-800 mb-4">Mengapa Belanja di SLM Store?</h2>
            <p class="text-blue-600 max-w-2xl mx-auto">
                Kami berkomitmen memberikan pengalaman berbelanja terbaik dengan produk-produk berkualitas untuk mendukung kegiatan tahfidz
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-blue-800 mb-2">100% Halal</h3>
                <p class="text-sm text-blue-600">Semua produk kami bersertifikat halal dan sesuai syariat Islam</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-blue-800 mb-2">Garansi Kualitas</h3>
                <p class="text-sm text-blue-600">Kami jamin kualitas produk atau uang kembali 100%</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-blue-800 mb-2">Pengiriman Cepat</h3>
                <p class="text-sm text-blue-600">Layanan pengiriman cepat ke seluruh Indonesia</p>
            </div>

            <div class="text-center p-6">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-blue-800 mb-2">Konsultasi Gratis</h3>
                <p class="text-sm text-blue-600">Konsultasi gratis tentang produk dan penggunaan</p>
            </div>
        </div>
    </section>

    {{-- CONTACT SECTION --}}
    <section class="bg-white rounded-2xl p-8 md:p-12 shadow-xl border border-blue-200">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-blue-800 mb-4">Hubungi Kami</h2>
            <p class="text-blue-600 max-w-2xl mx-auto">
                Ada pertanyaan tentang produk kami? Kami siap membantu Anda dengan informasi yang dibutuhkan
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-blue-800 mb-1">Telepon</h3>
                        <p class="text-blue-600">+62 812-3456-7890</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-blue-800 mb-1">Email</h3>
                        <p class="text-blue-600">store@majlistahfidz.com</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-blue-800 mb-1">Alamat</h3>
                        <p class="text-blue-600">Jl. Al-Qur'an No. 123, Jakarta Pusat</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-xl border border-blue-200">
                <h3 class="font-semibold text-blue-800 mb-4">Kirim Pesan</h3>
                <form class="space-y-4">
                    <div>
                        <input type="text" placeholder="Nama Anda" class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:border-blue-600 focus:outline-none transition-colors">
                    </div>
                    <div>
                        <input type="email" placeholder="Email Anda" class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:border-blue-600 focus:outline-none transition-colors">
                    </div>
                    <div>
                        <textarea rows="4" placeholder="Pesan Anda" class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:border-blue-600 focus:outline-none transition-colors resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 px-6 rounded-lg font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
// Product filtering functionality
document.addEventListener('DOMContentLoaded', function() {
    const categoryButtons = document.querySelectorAll('.category-btn');
    const productCards = document.querySelectorAll('.product-card');

    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            categoryButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-blue-600', 'text-white');
                btn.classList.add('bg-white', 'text-blue-800');
            });

            // Add active class to clicked button
            this.classList.add('active', 'bg-blue-600', 'text-white');
            this.classList.remove('bg-white', 'text-blue-800');

            const category = this.getAttribute('data-category');

            // Filter products
            productCards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Add to cart functionality
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const productName = this.getAttribute('data-product-name');
            const originalText = this.textContent;

            // Disable button and show loading
            this.disabled = true;
            this.textContent = 'Menambahkan...';

            // Send AJAX request
            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showNotification(`${productName} berhasil ditambahkan ke keranjang!`, 'success');

                    // Update cart count in navbar
                    updateCartCount(data.cart_count);

                    // Update cart count in mobile menu if open
                    const mobileCartCount = document.querySelector('#mobileMenu .bg-red-500');
                    if (mobileCartCount) {
                        mobileCartCount.textContent = data.cart_count;
                        mobileCartCount.style.display = data.cart_count > 0 ? 'block' : 'none';
                    }

                    // Reset button
                    this.disabled = false;
                    this.textContent = originalText;
                } else {
                    showNotification('Gagal menambahkan produk ke keranjang', 'error');
                    this.disabled = false;
                    this.textContent = originalText;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Terjadi kesalahan saat menambahkan produk', 'error');
                this.disabled = false;
                this.textContent = originalText;
            });
        });
    });

    function showNotification(message, type) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg font-semibold shadow-lg transform transition-all duration-300 translate-x-full ${
            type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
        }`;
        notification.textContent = message;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    function updateCartCount(count) {
        const cartCountElement = document.getElementById('cart-count');
        if (cartCountElement) {
            cartCountElement.textContent = count;
            cartCountElement.style.display = count > 0 ? 'block' : 'none';
        }
    }
});
</script>
@endsection
