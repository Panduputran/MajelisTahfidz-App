<header class="sticky top-0 z-50 bg-gradient-to-r from-islamic-cream/98 via-white/95 to-islamic-cream/98 backdrop-blur-xl shadow-lg border-b border-islamic-primary/40">

    <div class="max-w-6xl mx-auto px-4 py-5 flex items-center justify-between relative z-10">
        {{-- FORMAL ISLAMIC LOGO & BRAND --}}
        <a href="{{ url('/') }}" class="flex items-center gap-4 group relative">
            <img src="{{ asset('logo.jpg') }}" alt="Logo Majlis Tahfidz Al-Qur'an" class="w-14 h-14 rounded-full object-cover transition-all duration-300 group-hover:scale-105 shadow-lg ring-2 ring-islamic-primary/50" />

            <div class="leading-tight">
                <div class="font-bold text-xl text-islamic-primary transition-colors duration-300 font-serif">Majlis Tahfidz</div>
                <div class="text-sm text-islamic-primary/80 font-medium italic">Al-Qur'an Syifa Lilmu'minin</div>
                <div class="text-xs text-islamic-primary/70 font-medium">Al-Qur'an Syifa Lilmu'minin</div>
            </div>
        </a>

        {{-- DESKTOP MENU --}}
        <nav class="hidden md:flex items-center gap-1 text-[15px] font-medium">
            @php
                $links = [
                    ['url' => url('/'), 'label' => 'Home', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>'],
                    ['url' => '#', 'label' => 'Program Tahfidz', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>', 'dropdown' => [
                        ['url' => route('about'), 'label' => 'Tentang'],
                        ['url' => route('gallery'), 'label' => 'Galeri'],
                        ['url' => route('pendaftaran'), 'label' => 'Pendaftaran'],
                    ]],
                    ['url' => route('slm-store'), 'label' => 'SLM Store', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>'],
                    ['url' => route('umrah'), 'label' => 'Pendaftaran Umrah', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>'],
                    ['url' => route('news'), 'label' => 'Berita & Artikel', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>'],
                ];
                $currentRoute = request()->route() ? request()->route()->getName() : '';
            @endphp

            @foreach($links as $link)
                @if(isset($link['dropdown']))
                    <div class="relative group">
                        <a href="{{ $link['url'] }}"
                           class="relative flex items-center gap-2 px-4 py-2 rounded-lg text-islamic-primary transition-all duration-300 group {{ $currentRoute == str_replace('route.', '', $link['url']) ? 'bg-islamic-cream/50 text-islamic-secondary font-semibold shadow-sm' : '' }}">
                            {!! $link['icon'] !!}
                            <span>{{ $link['label'] }}</span>
                            <svg class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl border border-islamic-primary/20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            @foreach($link['dropdown'] as $dropdownItem)
                                <a href="{{ $dropdownItem['url'] }}" class="block px-4 py-3 text-sm text-islamic-primary transition-colors duration-200 first:rounded-t-lg last:rounded-b-lg hover:scale-105">
                                    {{ $dropdownItem['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $link['url'] }}"
                       class="relative flex items-center gap-2 px-4 py-2 rounded-lg text-islamic-primary transition-all duration-300 group {{ $currentRoute == str_replace('route.', '', $link['url']) ? 'bg-islamic-cream/50 text-islamic-secondary font-semibold shadow-sm' : '' }}">
                        {!! $link['icon'] !!}
                        <span>{{ $link['label'] }}</span>
                    </a>
                @endif
            @endforeach


            {{-- ADMIN LOGIN BUTTON --}}
            {{-- Removed login button for unobtrusive login access from footer --}}
        </nav>

        {{-- MOBILE MENU TOGGLE --}}
        <div class="md:hidden">
            <button id="menuToggle" class="p-2 rounded-lg text-islamic-dark-text hover:bg-islamic-cream/50 transition-colors focus:outline-none focus:ring-2 focus:ring-islamic-primary/50">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    {{-- MOBILE MENU DROPDOWN --}}
    <div id="mobileMenu" class="md:hidden hidden bg-gradient-to-b from-white/95 to-islamic-cream/95 backdrop-blur-md border-t border-islamic-primary/30 shadow-xl transform transition-all duration-300 ease-in-out">
        <nav class="flex flex-col p-4 space-y-2">
            @foreach($links as $link)
                <a href="{{ $link['url'] }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-islamic-primary transition-all duration-300 hover:scale-105 {{ $currentRoute == str_replace('route.', '', $link['url']) ? 'bg-islamic-cream/50 text-islamic-secondary font-semibold shadow-sm' : '' }}">
                    {!! $link['icon'] !!}
                    <span>{{ $link['label'] }}</span>
                </a>
            @endforeach


            {{-- MOBILE ADMIN LOGIN BUTTON --}}
            {{-- Removed mobile login button for unobtrusive login access from footer --}}
        </nav>
    </div>

    <style>
        /* Enhanced animations */
        .logo-bounce:hover {
            animation: gentle-bounce 0.6s ease-in-out;
        }
        @keyframes gentle-bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0) scale(1); }
            40% { transform: translateY(-5px) scale(1.05); }
            60% { transform: translateY(-3px) scale(1.02); }
        }

        /* Smooth mobile menu slide */
        #mobileMenu {
            transform: translateY(-10px);
            opacity: 0;
        }
        #mobileMenu:not(.hidden) {
            transform: translateY(0);
            opacity: 1;
        }
    </style>

    <script>
        // Enhanced mobile menu toggle with smooth animation
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const toggleIcon = menuToggle.querySelector('svg');

        let isOpen = false;

        menuToggle.addEventListener('click', () => {
            isOpen = !isOpen;
            mobileMenu.classList.toggle('hidden', !isOpen);

            // Animate hamburger to X
            if (isOpen) {
                toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
            } else {
                toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!menuToggle.contains(e.target) && !mobileMenu.contains(e.target) && isOpen) {
                isOpen = false;
                mobileMenu.classList.add('hidden');
                toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
            }
        });
    </script>
</header>
