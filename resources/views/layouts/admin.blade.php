<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Majlis Tahfidz') }} - Admin Panel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|amiri:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'sans-serif'],
                        serif: ['Amiri', 'serif'],
                    },
                    colors: {
                        brand: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            500: '#10b981', // Emerald 500
                            600: '#059669', // Emerald 600
                            900: '#064e3b', // Emerald 900
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }
    </style>
</head>

<body class="font-sans antialiased bg-slate-50 text-slate-800" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <!-- MOBILE SIDEBAR BACKDROP -->
        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-slate-900/80 z-40 lg:hidden backdrop-blur-sm"></div>

        <!-- SIDEBAR -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 shadow-2xl flex flex-col border-r border-slate-800">

            <!-- Brand Logo -->
            <div class="flex items-center justify-center h-20 bg-slate-950/50 border-b border-slate-800 shadow-sm">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-500 to-teal-600 p-0.5 shadow-lg shadow-emerald-900/20">
                        <img src="{{ asset('logo.jpg') }}"
                            class="w-full h-full rounded-full object-cover border-2 border-slate-900" alt="Logo">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-white font-serif font-bold text-lg tracking-wide leading-none">Majlis
                            Tahfidz</span>
                        <span class="text-[10px] text-emerald-500 font-bold uppercase tracking-widest mt-1">Admin
                            Panel</span>
                    </div>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto custom-scrollbar">

                {{-- DASHBOARD --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg shadow-emerald-900/30' : 'hover:bg-slate-800 hover:text-white' }}">
                    <i
                        class="fa-solid fa-gauge-high w-6 text-center {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-500 group-hover:text-emerald-400' }}"></i>
                    <span class="ml-3">Dashboard</span>
                </a>

                {{-- SECTION LABEL --}}
                <div class="px-4 mt-8 mb-2">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Penerimaan
                        Santri</span>
                </div>

                <a href="{{ route('admin.santri.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.santri.*') ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg shadow-emerald-900/30' : 'hover:bg-slate-800 hover:text-white' }}">
                    <i
                        class="fa-solid fa-file-signature w-6 text-center {{ request()->routeIs('admin.santri.*') ? 'text-white' : 'text-slate-500 group-hover:text-emerald-400' }}"></i>
                    <span class="ml-3">Data Pendaftar</span>
                </a>

                <a href="{{ route('admin.pembayaran.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.pembayaran.*') ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg shadow-emerald-900/30' : 'hover:bg-slate-800 hover:text-white' }}">
                    <i
                        class="fa-solid fa-money-check-dollar w-6 text-center {{ request()->routeIs('admin.pembayaran.*') ? 'text-white' : 'text-slate-500 group-hover:text-emerald-400' }}"></i>
                    <span class="ml-3">Verifikasi Pembayaran</span>
                </a>

                {{-- SECTION LABEL --}}
                <div class="px-4 mt-8 mb-2">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Akademik</span>
                </div>

                <a href="{{ route('admin.daftar-ulang.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.daftar-ulang.*') ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg shadow-emerald-900/30' : 'hover:bg-slate-800 hover:text-white' }}">
                    <i
                        class="fa-solid fa-user-clock w-6 text-center {{ request()->routeIs('admin.daftar-ulang.*') ? 'text-white' : 'text-slate-500 group-hover:text-emerald-400' }}"></i>
                    <span class="ml-3">Daftar Ulang (Lama)</span>
                </a>

                {{-- SECTION LABEL --}}
                <div class="px-4 mt-8 mb-2">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Konten & Toko</span>
                </div>

                <a href="{{ route('admin.news.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.news.*') ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg shadow-emerald-900/30' : 'hover:bg-slate-800 hover:text-white' }}">
                    <i
                        class="fa-solid fa-newspaper w-6 text-center {{ request()->routeIs('admin.news.*') ? 'text-white' : 'text-slate-500 group-hover:text-emerald-400' }}"></i>
                    <span class="ml-3">Berita & Artikel</span>
                </a>

                <a href="{{ route('admin.gallery.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.gallery.*') ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg shadow-emerald-900/30' : 'hover:bg-slate-800 hover:text-white' }}">
                    <i
                        class="fa-solid fa-images w-6 text-center {{ request()->routeIs('admin.gallery.*') ? 'text-white' : 'text-slate-500 group-hover:text-emerald-400' }}"></i>
                    <span class="ml-3">Galeri Foto</span>
                </a>

                <a href="{{ route('admin.orders.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.orders.*') ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg shadow-emerald-900/30' : 'hover:bg-slate-800 hover:text-white' }}">
                    <i
                        class="fa-solid fa-cart-shopping w-6 text-center {{ request()->routeIs('admin.orders.*') ? 'text-white' : 'text-slate-500 group-hover:text-emerald-400' }}"></i>
                    <span class="ml-3">Pesanan Masuk</span>
                </a>

            </nav>

            <!-- Logout Section -->
            <div class="p-4 border-t border-slate-800 bg-slate-950">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center w-full px-4 py-3 text-sm font-bold text-red-400 hover:text-white hover:bg-red-600/10 border border-transparent hover:border-red-600/30 rounded-xl transition-all group">
                        <i class="fa-solid fa-arrow-right-from-bracket mr-2 group-hover:text-red-500"></i>
                        <span>Keluar Aplikasi</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Topbar Header -->
            <header
                class="h-16 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-6 lg:px-8 shadow-sm relative z-30 sticky top-0">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true"
                        class="text-slate-500 hover:text-emerald-600 lg:hidden focus:outline-none transition-colors">
                        <i class="fa-solid fa-bars-staggered text-2xl"></i>
                    </button>
                    <div>
                        <h2 class="text-xl font-bold text-slate-800 tracking-tight">@yield('title', 'Dashboard')</h2>
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <!-- Profile Dropdown -->
                    <div class="flex items-center gap-3 pl-6 border-l border-slate-200">
                        <div class="text-right hidden md:block">
                            <p class="text-sm font-bold text-slate-700 leading-none">
                                {{ Auth::user()->name ?? 'Administrator' }}</p>
                            <p class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider mt-1">Super Admin
                            </p>
                        </div>
                        <div
                            class="h-10 w-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-500 overflow-hidden">
                            <i class="fa-solid fa-user text-lg"></i>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6 lg:p-8">

                {{-- Global Alerts --}}
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-200 flex items-center gap-3 shadow-sm animate-fade-in"
                        x-data="{show: true}" x-show="show">
                        <div class="bg-emerald-100 p-2 rounded-full shrink-0"><i class="fa-solid fa-check"></i></div>
                        <div class="flex-1">
                            <p class="font-bold text-sm">Berhasil!</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                        <button @click="show = false" class="text-emerald-500 hover:text-emerald-700"><i
                                class="fa-solid fa-xmark"></i></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200 flex items-center gap-3 shadow-sm animate-fade-in"
                        x-data="{show: true}" x-show="show">
                        <div class="bg-red-100 p-2 rounded-full shrink-0"><i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-sm">Terjadi Kesalahan!</p>
                            <p class="text-sm">{{ session('error') }}</p>
                        </div>
                        <button @click="show = false" class="text-red-500 hover:text-red-700"><i
                                class="fa-solid fa-xmark"></i></button>
                    </div>
                @endif

                @yield('content')

            </main>
        </div>
    </div>
</body>

</html>