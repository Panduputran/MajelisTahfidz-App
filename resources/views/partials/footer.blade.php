<footer class="bg-white border-t border-brand-100 relative overflow-hidden" x-data="{ loginModalOpen: false }">
    
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none bg-islamic-pattern"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
            
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('logo.jpg') }}" alt="Logo" class="w-10 h-10 rounded-full">
                    <h3 class="text-xl font-bold text-brand-700 font-serif">Syifaul Mu'minin</h3>
                </div>
                <p class="text-sm text-slate-500 leading-relaxed">
                    Mencetak generasi penghafal Al-Qur'an yang berakhlak mulia, mandiri, dan berwawasan luas.
                </p>
                <div class="flex gap-4 pt-2">
                    <a href="#" class="w-8 h-8 rounded-full bg-brand-50 text-brand-600 flex items-center justify-center hover:bg-brand-600 hover:text-white transition-all">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-brand-50 text-brand-600 flex items-center justify-center hover:bg-brand-600 hover:text-white transition-all">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-brand-50 text-brand-600 flex items-center justify-center hover:bg-brand-600 hover:text-white transition-all">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
                
                <button @click="loginModalOpen = true" class="text-xs text-slate-300 hover:text-brand-500 transition-colors flex items-center gap-1 mt-4">
                    <i class="fa-solid fa-lock"></i> Login Admin
                </button>
            </div>

            <div>
                <h4 class="font-bold text-slate-800 mb-4">Hubungi Kami</h4>
                <ul class="space-y-3 text-sm text-slate-600">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-phone text-brand-500 mt-1"></i>
                        <span>0852-8386-9145 (Admin)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-envelope text-brand-500 mt-1"></i>
                        <span>info@syifaulmuminin.com</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot text-brand-500 mt-1"></i>
                        <span>Jl. Pesantren No. 123, Bogor, Jawa Barat</span>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-slate-800 mb-4">Menu Pintas</h4>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li><a href="{{ route('register') }}" class="hover:text-brand-600 transition-colors">Pendaftaran Santri</a></li>
                    <li><a href="{{ route('slm-store') }}" class="hover:text-brand-600 transition-colors">Cek Status Pembayaran</a></li>
                    <li><a href="{{ route('news') }}" class="hover:text-brand-600 transition-colors">Artikel & Berita</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-brand-600 transition-colors">Tentang Pengasuh</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-100 mt-10 pt-6 text-center">
            <p class="text-xs text-slate-400">
                &copy; {{ date('Y') }} Majlis Tahfidz Al-Qur'an Syifa Lilmu'minin. All rights reserved.
            </p>
        </div>
    </div>

    <a href="https://wa.me/6285283869145" target="_blank" class="fixed bottom-6 right-6 z-40 bg-green-500 text-white w-14 h-14 rounded-full shadow-xl flex items-center justify-center hover:scale-110 hover:bg-green-600 transition-all duration-300 group">
        <i class="fa-brands fa-whatsapp text-2xl"></i>
        <span class="absolute right-16 bg-white text-slate-700 text-xs font-bold px-3 py-1 rounded shadow-md opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">Chat Kami</span>
    </a>

    <div x-show="loginModalOpen" class="fixed inset-0 z-[60] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-cloak>
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="loginModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="loginModalOpen = false" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="loginModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm w-full">
                
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 relative">
                    <button @click="loginModalOpen = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <div class="text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-brand-100 mb-4">
                            <i class="fa-solid fa-user-shield text-brand-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-title">Admin Login</h3>
                        
                        <div class="mt-4 text-left">
                            @include('partials.login_form') 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>