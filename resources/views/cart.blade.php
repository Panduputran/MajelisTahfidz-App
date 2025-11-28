@extends('layouts.app')

@section('content')
<div class="space-y-12">
    {{-- HERO SECTION --}}
    <section class="relative bg-gradient-to-br from-blue-50 via-white to-blue-50 rounded-2xl p-8 md:p-12 shadow-xl border border-blue-200 overflow-hidden">
        <div class="absolute inset-0 islamic-pattern opacity-30"></div>
        <div class="relative z-10">
            <div class="text-center mb-8">
                <h1 class="text-4xl md:text-5xl font-bold text-blue-800 mb-4 arabic-text calligraphy-glow">
                    Keranjang Belanja
                </h1>
                <p class="text-lg text-blue-700 max-w-2xl mx-auto leading-relaxed">
                    Tinjau produk yang telah Anda pilih sebelum melanjutkan ke pembayaran
                </p>
            </div>
        </div>
    </section>

    {{-- CART CONTENT --}}
    <section class="bg-white rounded-2xl p-8 md:p-12 shadow-xl border border-blue-200">
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <p class="text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(count($cartItems) > 0)
            <div class="space-y-6">
                {{-- CART ITEMS --}}
                <div class="space-y-4">
                    @foreach($cartItems as $item)
                    <div class="flex items-center justify-between p-6 bg-gradient-to-r from-blue-50 to-white rounded-xl border border-blue-100">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                                @if($item['product']->image)
                                    <img src="{{ asset('storage/' . $item['product']->image) }}" alt="{{ $item['product']->name }}" class="w-full h-full object-cover rounded-lg">
                                @else
                                    <div class="text-2xl">{{ $item['product']->category === 'dates' ? '🍇' : '📦' }}</div>
                                @endif
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-blue-800">{{ $item['product']->name }}</h3>
                                <p class="text-blue-600 text-sm">{{ $item['product']->description }}</p>
                                <p class="text-blue-700 font-medium">Rp {{ number_format($item['product']->price, 0, ',', '.') }} x {{ $item['quantity'] }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xl font-bold text-blue-800">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</p>
                            <div class="flex items-center space-x-2 mt-2">
                                <button class="update-quantity-btn bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded-lg text-sm font-medium transition-colors"
                                        data-product-id="{{ $item['product']->id }}"
                                        data-action="decrease">
                                    -
                                </button>
                                <span class="quantity-display px-3 py-1 bg-white border border-blue-200 rounded-lg text-sm font-medium">{{ $item['quantity'] }}</span>
                                <button class="update-quantity-btn bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded-lg text-sm font-medium transition-colors"
                                        data-product-id="{{ $item['product']->id }}"
                                        data-action="increase">
                                    +
                                </button>
                                <button class="remove-item-btn bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded-lg text-sm font-medium transition-colors ml-2"
                                        data-product-id="{{ $item['product']->id }}">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- CART SUMMARY --}}
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold text-blue-800">Total Pembayaran</h3>
                        <p class="text-2xl font-bold text-blue-700">Rp {{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                </div>

                {{-- CHECKOUT FORM --}}
                <div class="bg-white rounded-xl p-6 border border-blue-200">
                    <h3 class="text-xl font-bold text-blue-800 mb-6">Informasi Pengiriman</h3>
                    <form action="{{ route('cart.checkout') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="customer_name" class="block text-sm font-medium text-blue-700 mb-2">Nama Lengkap</label>
                                <input type="text" id="customer_name" name="customer_name" required
                                       class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:border-blue-600 focus:outline-none transition-colors"
                                       placeholder="Masukkan nama lengkap">
                            </div>
                            <div>
                                <label for="customer_email" class="block text-sm font-medium text-blue-700 mb-2">Email</label>
                                <input type="email" id="customer_email" name="customer_email" required
                                       class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:border-blue-600 focus:outline-none transition-colors"
                                       placeholder="Masukkan alamat email">
                            </div>
                            <div>
                                <label for="customer_phone" class="block text-sm font-medium text-blue-700 mb-2">Nomor Telepon</label>
                                <input type="tel" id="customer_phone" name="customer_phone" required
                                       class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:border-blue-600 focus:outline-none transition-colors"
                                       placeholder="Masukkan nomor telepon">
                            </div>
                        </div>
                        <div>
                            <label for="customer_address" class="block text-sm font-medium text-blue-700 mb-2">Alamat Lengkap</label>
                            <textarea id="customer_address" name="customer_address" rows="4" required
                                      class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:border-blue-600 focus:outline-none transition-colors resize-none"
                                      placeholder="Masukkan alamat lengkap pengiriman"></textarea>
                        </div>
                        <div>
                            <label for="notes" class="block text-sm font-medium text-blue-700 mb-2">Catatan Tambahan (Opsional)</label>
                            <textarea id="notes" name="notes" rows="3"
                                      class="w-full px-4 py-3 rounded-lg border border-blue-200 focus:border-blue-600 focus:outline-none transition-colors resize-none"
                                      placeholder="Catatan khusus untuk pengiriman atau pesanan"></textarea>
                        </div>
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('slm-store') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold transition-colors">
                                Lanjut Belanja
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-lg font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                Pesan Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            {{-- EMPTY CART --}}
            <div class="text-center py-12">
                <div class="text-6xl mb-4">🛒</div>
                <h3 class="text-xl font-bold text-blue-800 mb-2">Keranjang Kosong</h3>
                <p class="text-blue-600 mb-6">Belum ada produk di keranjang belanja Anda.</p>
                <a href="{{ route('slm-store') }}" class="inline-block bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-lg font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                    Mulai Belanja
                </a>
            </div>
        @endif
    </section>
</div>

@if(count($cartItems) > 0)
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update quantity buttons
    const updateButtons = document.querySelectorAll('.update-quantity-btn');
    updateButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const action = this.getAttribute('data-action');
            const quantityDisplay = this.closest('.flex').querySelector('.quantity-display');
            let currentQuantity = parseInt(quantityDisplay.textContent);

            if (action === 'increase') {
                currentQuantity++;
            } else if (action === 'decrease' && currentQuantity > 1) {
                currentQuantity--;
            }

            // Update quantity via AJAX
            fetch('/cart/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: currentQuantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    quantityDisplay.textContent = currentQuantity;
                    location.reload(); // Reload to update totals
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });

    // Remove item buttons
    const removeButtons = document.querySelectorAll('.remove-item-btn');
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')) {
                const productId = this.getAttribute('data-product-id');

                fetch('/cart/remove', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        product_id: productId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload(); // Reload to update cart
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });
});
</script>
@endif
@endsection
