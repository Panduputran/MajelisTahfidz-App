<header
    class="sticky top-0 z-50 bg-gradient-to-r from-islamic-cream/98 via-white/95 to-islamic-cream/98 backdrop-blur-xl shadow-lg border-b border-islamic-primary/40">

    <div class="max-w-6xl mx-auto px-4 py-5 flex items-center justify-between relative z-10">

        {{-- LOGO --}}
        <a href="{{ url('/') }}" class="flex items-center gap-4 group relative">
            <img src="{{ asset('logo.jpg') }}" alt="Logo Majlis Tahfidz Al-Qur'an"
                class="w-14 h-14 rounded-full object-cover transition-all duration-300 group-hover:scale-105 shadow-lg ring-2 ring-islamic-primary/50" />

            <div class="leading-tight">
                <div class="font-bold text-xl text-islamic-primary transition-colors duration-300 font-serif">Majlis
                    Tahfidz</div>
                <div class="text-sm text-islamic-primary/80 font-medium italic">Al-Qur'an Syifa Lilmu'minin</div>
                <div class="text-xs text-islamic-primary/70 font-medium">Al-Qur'an Syifa Lilmu'minin</div>
            </div>
        </a>

        {{-- DESKTOP MENU --}}
        <nav class="hidden md:flex items-center gap-1 text-[15px] font-medium">
            @php
                $links = [
                    ['url' => url('/'), 'label' => 'Home', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>'],
                    [
                        'url' => '#',
                        'label' => 'Program Tahfidz',
                        'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>',
                        'dropdown' => [
                            ['url' => route('about'), 'label' => 'Tentang'],
                            ['url' => route('gallery'), 'label' => 'Galeri'],
                            ['url' => route('pendaftaran'), 'label' => 'Pendaftaran'],
                            ['url' => route('daftar-ulang.create'), 'label' => 'Daftar Ulang'],
                        ]
                    ],
                    ['url' => route('slm-store'), 'label' => 'SLM Store', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>'],
                    ['url' => route('umrah'), 'label' => 'Pendaftaran Umrah', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>'],
                    ['url' => route('news'), 'label' => 'Berita & Artikel', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>'],
                ];
              @endphp

            @foreach($links as $link)
                @if(isset($link['dropdown']))
                    {{-- DESKTOP DROPDOWN --}}
                    <div class="relative group dropdown-wrapper">
                        <a href="{{ $link['url'] }}"
                            class="relative flex items-center gap-2 px-4 py-2 rounded-lg text-islamic-primary transition-all duration-300 hover-islamic-teal">
                            {!! $link['icon'] !!}
                            <span>{{ $link['label'] }}</span>
                            <svg class=" w-4 h-4 ml-1 transition-transform duration-300 group-hover:rotate-180" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>

                        <div
                            class="absolute left-0 w-56 bg-white rounded-lg shadow-xl border border-islamic-primary/20
                                                     opacity-0 invisible pointer-events-none transition-all duration-300 ease-out transform translate-y-2
                                                     group-hover:opacity-100 group-hover:visible group-hover:pointer-events-auto group-hover:translate-y-4 z-50 dropdown-area">
                            @foreach($link['dropdown'] as $dropdownItem)
                                <a href="{{ $dropdownItem['url'] }}"
                                    class="block px-4 py-3 text-sm text-islamic-primary transition-all duration-200 hover-islamic-teal" style="border-radius: 7px">
                                    {{ $dropdownItem['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $link['url'] }}"
                        class="relative flex items-center gap-2 px-4 py-2 rounded-lg text-islamic-primary transition-all duration-300 hover-islamic-teal" ">
                                        {!! $link['icon'] !!}
                                        <span>{{ $link['label'] }}</span>
                                    </a>
                @endif
            @endforeach
        </nav>

        {{-- MOBILE TOGGLE --}}
        <div class=" md:hidden">
                <button id="menuToggle"
                    class="p-2 rounded-lg text-islamic-dark-text hover:bg-islamic-cream/50 transition-colors focus:outline-none focus:ring-2 focus:ring-islamic-primary/50"
                    aria-expanded="false" aria-controls="mobileMenu">
                    <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </button>
    </div>
    </div>

    {{-- MOBILE MENU (dropdown-like with icons + submenu support) --}}
    <div id="mobileMenu"
        class="md:hidden hidden bg-gradient-to-b from-white/95 to-islamic-cream/95 backdrop-blur-md border-t border-islamic-primary/30 shadow-xl overflow-hidden"
        aria-hidden="true" role="menu">

        <nav class="flex flex-col p-2" id="mobileNav">
            @foreach($links as $link)
                @if(isset($link['dropdown']))
                    {{-- parent item with collapsible submenu --}}
                    <div class="w-full" data-has-submenu>
                        <button type="button"
                            class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg text-islamic-primary hover:bg-islamic-cream/50 transition-all duration-200 focus:outline-none"
                            aria-expanded="false">
                            <span class="flex items-center gap-3">
                                {!! $link['icon'] !!}
                                <span>{{ $link['label'] }}</span>
                            </span>

                            <svg class="w-5 h-5 transition-transform duration-200 submenu-chevron" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div
                            class="submenu-wrapper overflow-hidden max-h-0 transition-[max-height,opacity,transform] duration-300 ease-[cubic-bezier(.4,0,.2,1)] opacity-0">
                            <div class="flex flex-col px-2">
                                @foreach($link['dropdown'] as $sub)
                                    <a href="{{ $sub['url'] }}"
                                        class="flex items-center gap-3 px-4 py-3 rounded-lg text-islamic-primary hover:bg-islamic-cream/50 transition-all duration-150">
                                        <span class="ml-1 text-sm">{{ $sub['label'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ $link['url'] }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg text-islamic-primary transition-all duration-200 hover:bg-islamic-cream/50">
                        {!! $link['icon'] !!}
                        <span>{{ $link['label'] }}</span>
                    </a>
                @endif
            @endforeach
        </nav>
    </div>

    {{-- Styles: dropdown fix + mobile animation polish --}}
    <style>
        /* Prevent desktop dropdown flicker: small safe area + keep dropdown visible on hover */
        .dropdown-wrapper {
            position: relative;
        }

        .dropdown-wrapper::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            height: 12px;
            /* safe gap */
            background: transparent;
        }

        .dropdown-wrapper:hover .dropdown-area {
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
            transform: translateY(4px) !important;
        }

        /* Mobile menu: prepare for JS-controlled height & smoother transitions */
        #mobileMenu {
            transition: opacity 320ms cubic-bezier(.4, 0, .2, 1), transform 320ms cubic-bezier(.4, 0, .2, 1);
            transform-origin: top;
            opacity: 0;
            transform: translateY(-6px) scaleY(0.995);
        }

        #mobileMenu.show {
            opacity: 1;
            transform: translateY(0) scaleY(1);
        }

        /* Submenu transitions: max-height + opacity + slight translate for smooth dropdown feel */
        .submenu-wrapper {
            transform: translateY(-4px);
        }

        .submenu-wrapper.open {
            opacity: 1;
            transform: translateY(0);
        }

        @layer utilities {
            .hover-islamic-teal:hover {
                background-color: #088D9F !important;
                color: white !important;
            }
        }
    </style>

    {{-- Scripts: smooth mobile menu height animation + collapsible submenus --}}
    <script>
        (function () {
            const menuToggle = document.getElementById('menuToggle');
            const mobileMenu = document.getElementById('mobileMenu');
            const menuIcon = document.getElementById('menuIcon');

            let mobileOpen = false;
            const openIcon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
            const closeIcon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';

            function openMobileMenu() {
                mobileMenu.classList.remove('hidden');
                // allow layout to compute
                requestAnimationFrame(() => {
                    mobileMenu.classList.add('show');
                    mobileMenu.setAttribute('aria-hidden', 'false');
                    menuToggle.setAttribute('aria-expanded', 'true');
                });
            }

            function closeMobileMenu() {
                mobileMenu.classList.remove('show');
                mobileMenu.setAttribute('aria-hidden', 'true');
                menuToggle.setAttribute('aria-expanded', 'false');
                // wait for transition then hide to remove from tab order
                setTimeout(() => {
                    if (!mobileMenu.classList.contains('show')) {
                        mobileMenu.classList.add('hidden');
                    }
                }, 340); // slightly > CSS transition
            }

            menuToggle.addEventListener('click', () => {
                mobileOpen = !mobileOpen;
                menuIcon.innerHTML = mobileOpen ? openIcon : closeIcon;
                if (mobileOpen) openMobileMenu(); else closeMobileMenu();
            });

            // close on outside click
            document.addEventListener('click', (e) => {
                if (!mobileOpen) return;
                const inside = mobileMenu.contains(e.target) || menuToggle.contains(e.target);
                if (!inside) {
                    mobileOpen = false;
                    menuIcon.innerHTML = closeIcon;
                    closeMobileMenu();
                }
            });

            // keyboard: escape to close
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && mobileOpen) {
                    mobileOpen = false;
                    menuIcon.innerHTML = closeIcon;
                    closeMobileMenu();
                }
            });

            /* Collapsible submenus inside mobile menu (dropdown-like) */
            const parents = Array.from(document.querySelectorAll('#mobileNav [data-has-submenu]'));
            parents.forEach(parent => {
                const btn = parent.querySelector('button');
                const wrapper = parent.querySelector('.submenu-wrapper');

                // initialize
                wrapper.style.maxHeight = '0px';
                wrapper.style.opacity = '0';
                wrapper.style.transition = 'max-height 300ms cubic-bezier(.4,0,.2,1), opacity 240ms ease, transform 300ms cubic-bezier(.4,0,.2,1)';
                wrapper.style.transform = 'translateY(-4px)';

                btn.addEventListener('click', (e) => {
                    const isOpen = btn.getAttribute('aria-expanded') === 'true';
                    btn.setAttribute('aria-expanded', String(!isOpen));
                    const chevron = btn.querySelector('.submenu-chevron');

                    if (!isOpen) {
                        // open
                        wrapper.classList.add('open');
                        wrapper.style.maxHeight = wrapper.scrollHeight + 8 + 'px'; // small padding
                        wrapper.style.opacity = '1';
                        wrapper.style.transform = 'translateY(0)';
                        if (chevron) chevron.style.transform = 'rotate(180deg)';
                    } else {
                        // close
                        wrapper.style.maxHeight = '0px';
                        wrapper.style.opacity = '0';
                        wrapper.style.transform = 'translateY(-4px)';
                        wrapper.classList.remove('open');
                        if (chevron) chevron.style.transform = 'rotate(0deg)';
                    }
                });

                // ensure proper height on window resize (if open)
                window.addEventListener('resize', () => {
                    if (btn.getAttribute('aria-expanded') === 'true') {
                        wrapper.style.maxHeight = wrapper.scrollHeight + 8 + 'px';
                    }
                });
            });
        })();
    </script>
</header>