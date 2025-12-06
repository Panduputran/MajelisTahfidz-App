<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
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
                    },
                    colors: {
                        admin: {
                            dark: '#0f172a', // Slate 900
                            primary: '#3b82f6', // Blue 500
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans antialiased bg-slate-50" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR MOBILE OVERLAY -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-900/80 z-40 lg:hidden"></div>

        <!-- SIDEBAR -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 shadow-xl flex flex-col">

            <!-- Brand -->
            <div class="flex items-center justify-center h-16 bg-slate-950 shadow-md">
                <span class="text-xl font-bold tracking-wider uppercase">Admin Panel</span>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

                <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Main Menu</p>

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-gauge w-6"></i>
                    Dashboard
                </a>

                {{-- Menu Pendaftar Santri (BARU) --}}
                <a href="{{ route('admin.santri.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.santri.*') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-user-graduate w-6"></i>
                    Data Pendaftar Baru
                    {{-- Badge Notifikasi jika ada status pending (Opsional Logic) --}}
                    {{-- <span class="ml-auto bg-red-500 text-white text-[10px] px-2 py-0.5 rounded-full">New</span>
                    --}}
                </a>

                <a href="{{ route('admin.daftar-ulang.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.santri.*') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-user-graduate w-6"></i>
                    Data Pendaftar Ulang
                    {{-- Badge Notifikasi jika ada status pending (Opsional Logic) --}}
                    {{-- <span class="ml-auto bg-red-500 text-white text-[10px] px-2 py-0.5 rounded-full">New</span>
                    --}}
                </a>

                <a href="{{ route('admin.pembayaran.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.daftar-ulang.*') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-user-graduate w-6"></i>
                    Data Pembayaran
                    {{-- Badge Notifikasi jika ada status pending (Opsional Logic) --}}
                    {{-- <span class="ml-auto bg-red-500 text-white text-[10px] px-2 py-0.5 rounded-full">New</span>
                    --}}
                </a>

                <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mt-6 mb-2">Content</p>

                <a href="{{ route('admin.news.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.news.*') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-newspaper w-6"></i>
                    Berita & Artikel
                </a>

                <a href="{{ route('admin.gallery.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.gallery.*') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-images w-6"></i>
                    Galeri Foto
                </a>

                <a href="{{ route('admin.orders.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.orders.*') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa-solid fa-shopping-cart w-6"></i>
                    Pesanan Store
                </a>
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-slate-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full px-4 py-2 text-sm font-medium text-slate-300 hover:bg-red-600 hover:text-white rounded-lg transition-colors">
                        <i class="fa-solid fa-right-from-bracket w-6"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- MAIN CONTENT WRAPPER -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- TOP HEADER -->
            <header class="flex items-center justify-between h-16 px-6 bg-white border-b border-slate-200 shadow-sm">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-slate-500 focus:outline-none lg:hidden mr-4">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                    <h2 class="text-xl font-bold text-slate-800">@yield('title', 'Admin Dashboard')</h2>
                </div>

                <div class="flex items-center gap-4">
                    <div class="hidden md:flex flex-col text-right mr-2">
                        <span
                            class="text-sm font-bold text-slate-700">{{ Auth::user()->name ?? 'Administrator' }}</span>
                        <span class="text-xs text-slate-500">Admin</span>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-slate-200 flex items-center justify-center text-slate-500">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
            </header>

            <!-- CONTENT SCROLLABLE -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
                @if(session('success'))
                    <div
                        class="mb-6 p-4 rounded-lg bg-green-100 text-green-700 border border-green-200 flex items-center gap-3 shadow-sm">
                        <i class="fa-solid fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>