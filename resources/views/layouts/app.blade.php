<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Website Resmi Majlis Tahfidz Al-Qur'an Syifa Lilmu'minin">
    <link rel="icon" type="image" href="{{ asset('/logo.jpg') }}">
    {{-- Font Poppins --}}
    <title>{{ config('app.name', "Majlis Tahfidz Al-Qur'an Syifa Lilmu'minin") }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|amiri:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'sans-serif'],
                        serif: ['Amiri', 'serif'],
                    },
                    colors: {
                        // Menggunakan palette warna biru sesuai request awal
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb', // Warna Utama
                            700: '#1d4ed8',
                            900: '#1e3a8a',
                        },
                        gold: {
                            400: '#fbbf24',
                            500: '#d4af37', // Warna Emas Islami
                            600: '#b45309',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 1s ease-out forwards',
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 3s infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                },
            },
        }
    </script>

    <style>
        /* Latar Belakang Geometris Halus (Checkerboard) */
        .bg-islamic-grid {
            background-color: #eff6ff;
            /* primary-50 */
            background-image:
                repeating-linear-gradient(45deg, rgba(37, 99, 235, 0.03) 0%, rgba(37, 99, 235, 0.03) 7px, transparent 7px, transparent 14px),
                repeating-linear-gradient(-45deg, rgba(29, 78, 216, 0.02) 0%, rgba(29, 78, 216, 0.02) 7px, transparent 7px, transparent 14px);
            background-size: 28px 28px;
        }

        /* Motif Bunga/Islami SVG (Base64) */
        .bg-islamic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%232563eb' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3Cpath d='M30 15c-8.284 0-15 6.716-15 15s6.716 15 15 15 15-6.716 15-15-6.716-15-15-15zm0 5c5.523 0 10 4.477 10 10s-4.477 10-10 10-10-4.477-10-10 4.477-10 10-10z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* Efek Premium Card 3D */
        .premium-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .premium-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px -5px rgba(37, 99, 235, 0.15);
        }

        /* Scrollbar Kustom agar elegan */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col antialiased font-sans text-slate-800 bg-islamic-grid">

    @include('partials.navbar')

    <main class="flex-grow w-[95%] max-w-[1920px] mx-auto px-4 sm:px-6 lg:px-8 py-8 animate-fade-in relative z-10">
        <div class="absolute inset-0 bg-islamic-pattern opacity-50 pointer-events-none -z-10"></div>

        @yield('content')
    </main>

    @include('partials.footer')

</body>

</html>