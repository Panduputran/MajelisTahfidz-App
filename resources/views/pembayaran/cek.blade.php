@extends('layouts.app')

@section('content')
    <div class="min-h-[80vh] flex items-center justify-center bg-slate-50 py-12 px-4 relative overflow-hidden">

        {{-- Background Decoration --}}
        <div class="absolute inset-0 pointer-events-none">
            <div
                class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-emerald-100/50 rounded-full blur-3xl animate-blob">
            </div>
            <div
                class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-blue-100/50 rounded-full blur-3xl animate-blob animation-delay-2000">
            </div>
        </div>

        <div
            class="max-w-md w-full bg-white/90 backdrop-blur-xl p-8 rounded-3xl shadow-2xl border border-white/50 relative z-10 animate-fade-in">

            <div class="text-center mb-8">
                <div
                    class="w-20 h-20 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full flex items-center justify-center mx-auto mb-4 shadow-inner">
                    <i class="fa-solid fa-magnifying-glass-dollar text-3xl text-emerald-600"></i>
                </div>
                <h2 class="text-2xl font-bold text-slate-800 font-serif">Cek Status & Pembayaran</h2>
                <p class="mt-2 text-sm text-slate-500">
                    Masukkan No. WhatsApp atau Email yang didaftarkan untuk mengecek kelulusan dan upload bukti
                    administrasi.
                </p>
            </div>

            {{-- Notifications --}}
            @foreach (['error', 'warning', 'success'] as $msg)
                @if(session($msg))
                    <div class="mb-6 p-4 rounded-xl text-sm flex items-start gap-3 shadow-sm
                                                        {{ $msg == 'error' ? 'bg-red-50 text-red-700 border border-red-100' :
                        ($msg == 'warning' ? 'bg-amber-50 text-amber-700 border border-amber-100' :
                            'bg-emerald-50 text-emerald-700 border border-emerald-100') }}">
                        <i
                            class="fa-solid {{ $msg == 'error' ? 'fa-circle-xmark' : ($msg == 'warning' ? 'fa-triangle-exclamation' : 'fa-circle-check') }} mt-0.5"></i>
                        <div>{!! session($msg) !!}</div>
                    </div>
                @endif
            @endforeach

            <form action="{{ route('pembayaran.process-check') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email / No. WhatsApp</label>
                    <div class="relative group">
                        <span
                            class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-emerald-600 transition-colors">
                            <i class="fa-solid fa-user-shield"></i>
                        </span>
                        <input type="text" name="identifier" required
                            class="pl-11 block w-full px-4 py-3.5 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm bg-slate-50 focus:bg-white"
                            placeholder="Contoh: 08123456789">
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-3.5 px-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-bold rounded-xl shadow-lg hover:shadow-emerald-500/30 transition-all transform hover:-translate-y-0.5">
                    Cek Data Saya
                </button>
            </form>
        </div>
    </div>
@endsection