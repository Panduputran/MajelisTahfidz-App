<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\IslamicController;
use App\Http\Controllers\SantriController; // Import Controller Baru

/* ... Route Home, About, Programs, News tetap sama ... */

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/programs', function () {
    return view('programs');
})->name('programs');

Route::get('/news', function (Request $request) {
    $query = $request->get('q');
    $news = \App\Models\News::published()
        ->when($query, function ($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(9);
    return view('news', compact('query', 'news'));
})->name('news');

// === ROUTE PENDAFTARAN SANTRI BARU (Updated) ===
Route::get('/pendaftaran', [SantriController::class, 'create'])->name('pendaftaran'); // Ganti nama route jadi pendaftaran agar lebih relevan
Route::post('/pendaftaran', [SantriController::class, 'store'])->name('pendaftaran.store');

// Redirect /register ke /pendaftaran supaya link lama tetap jalan
Route::get('/register', function () {
    return redirect()->route('pendaftaran');
})->name('register');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/gallery', function () {
    $gallery = \App\Models\Gallery::published()->ordered()->get();
    return view('gallery', compact('gallery'));
})->name('gallery');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/slm-store', function () {
    $products = \App\Models\Product::active()->get();
    return view('slm-store', compact('products'));
})->name('slm-store');

// Cart Routes
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart/count', [App\Http\Controllers\CartController::class, 'getCartCount'])->name('cart.count');

Route::get('/umrah', function () {
    return view('umrah');
})->name('umrah');

// === ADMIN ROUTES ===
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // News & Gallery Management
    Route::resource('news', NewsController::class, ['as' => 'admin']);
    Route::resource('gallery', GalleryController::class, ['as' => 'admin']);

    // Order Management
    Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('orders/{order}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.orders.show');
    Route::patch('orders/{order}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('admin.orders.update-status');

    // === NEW: Manajemen Pendaftar Santri ===
    Route::get('pendaftar', [SantriController::class, 'index'])->name('admin.santri.index');
    Route::get('pendaftar/{santri}', [SantriController::class, 'show'])->name('admin.santri.show');
    Route::patch('pendaftar/{santri}/status', [SantriController::class, 'updateStatus'])->name('admin.santri.update-status');
});

// Islamic Features API Routes
Route::get('/api/islamic-data', [IslamicController::class, 'getIslamicData']);

Route::get('/health', function () {
    return response()->json(['status' => 'ok', 'timestamp' => now()->toDateTimeString()]);
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
