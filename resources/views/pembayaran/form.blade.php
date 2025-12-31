@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-slate-50 py-12 px-4">
        <div class="max-w-4xl mx-auto space-y-8 animate-fade-in">

            {{-- Header Status --}}
            <div
                class="bg-gradient-to-r from-emerald-600 to-teal-600 rounded-3xl shadow-xl p-8 md:p-10 text-center text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-16 -mt-16 animate-pulse">
                </div>

                <div class="relative z-10">
                    <h1 class="text-3xl md:text-4xl font-bold font-serif mb-2">Ahlan Wa Sahlan, {{ $santri->nama_lengkap }}!
                    </h1>
                    <p class="text-emerald-100 text-lg">Anda telah lolos seleksi penerimaan santri baru.</p>

                    {{-- Status Badges --}}
                    <div class="mt-6 flex flex-wrap justify-center gap-3">
                        <span
                            class="px-4 py-1.5 bg-white/20 backdrop-blur rounded-full text-sm font-medium border border-white/30">
                            Program: {{ $santri->program_minat }}
                        </span>

                        @if($santri->pembayaran && $santri->pembayaran->status == 'verified')
                            <span
                                class="px-4 py-1.5 bg-white text-emerald-700 rounded-full text-sm font-bold flex items-center gap-2 shadow-lg">
                                <i class="fa-solid fa-check-circle"></i> SANTRI AKTIF
                            </span>
                        @elseif($santri->pembayaran && $santri->pembayaran->status == 'pending')
                            <span
                                class="px-4 py-1.5 bg-yellow-400 text-yellow-900 rounded-full text-sm font-bold flex items-center gap-2 shadow-lg">
                                <i class="fa-solid fa-clock"></i> MENUNGGU VERIFIKASI
                            </span>
                        @else
                            <span
                                class="px-4 py-1.5 bg-white/20 backdrop-blur rounded-full text-sm font-medium border border-white/30">
                                Menunggu Pembayaran
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- KONDISI 1: SUDAH LUNAS / AKTIF --}}
            @if($santri->status == 'aktif')
                <div class="bg-white rounded-3xl shadow-lg border border-emerald-100 p-8 text-center">
                    <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-user-check text-4xl text-emerald-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800">Selamat Bergabung!</h3>
                    <p class="text-slate-600 mt-2 max-w-lg mx-auto">
                        Administrasi Anda telah selesai. Silakan hubungi admin atau datang ke sekretariat untuk pengambilan
                        seragam dan jadwal masuk.
                    </p>
                    <div class="mt-6">
                        <a href="https://wa.me/6285283869145"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition">
                            <i class="fa-brands fa-whatsapp"></i> Hubungi Admin
                        </a>
                    </div>
                </div>

                {{-- KONDISI 2: SUDAH UPLOAD (PENDING) --}}
            @elseif($santri->pembayaran && $santri->pembayaran->status == 'pending')
                <div class="bg-white rounded-3xl shadow-lg border border-yellow-100 p-8 text-center">
                    <div class="w-20 h-20 bg-yellow-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-hourglass-half text-4xl text-yellow-600 animate-pulse"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800">Pembayaran Sedang Diverifikasi</h3>
                    <p class="text-slate-600 mt-2">
                        Terima kasih telah melakukan pembayaran. Admin kami sedang mengecek bukti transfer Anda.
                        Proses ini biasanya memakan waktu maksimal 1x24 jam.
                    </p>
                    <div class="mt-6 p-4 bg-slate-50 rounded-xl inline-block text-left text-sm text-slate-500">
                        <p><strong>Tanggal Upload:</strong> {{ $santri->pembayaran->created_at->format('d M Y H:i') }}</p>
                        <p><strong>Nominal:</strong> Rp {{ number_format($santri->pembayaran->nominal, 0, ',', '.') }}</p>
                    </div>
                </div>

                {{-- KONDISI 3: BELUM BAYAR / DITOLAK (SHOW FORM) --}}
            @else
                <div class="flex flex-col md:flex-row gap-6">
                    {{-- Instruksi --}}
                    <div class="md:w-5/12 space-y-6">
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                            <h3 class="font-bold text-slate-800 text-lg mb-4">Rekening Tujuan</h3>
                            <div class="bg-blue-50 p-5 rounded-xl border border-blue-100 relative">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg"
                                    class="h-8 mb-4 opacity-80" alt="BSI">
                                <p class="text-sm text-blue-600 font-bold tracking-wider mb-1">BANK SYARIAH INDONESIA</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-mono font-bold text-slate-800">7266633418</span>
                                    <button onclick="navigator.clipboard.writeText('1234567890')"
                                        class="text-blue-500 hover:text-blue-700 text-sm font-bold">SALIN</button>
                                </div>
                                <p class="text-sm text-slate-600 mt-2">A/n Yayasan Shotu Azzikri Walfikri</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                            <h3 class="font-bold text-slate-800 mb-2">Rincian Biaya Awal</h3>
                            <ul class="space-y-3 text-sm text-slate-600">
                                <li class="flex justify-between">
                                    <span>Pendaftaran & Administrasi</span>
                                    <span class="font-bold">Rp 100.000</span>
                                </li>
                                <li class="flex justify-between">
                                    <span>Kas Bulan Pertama</span>
                                    <span class="font-bold">Rp 20.000</span>
                                </li>
                                <li class="border-t pt-2 flex justify-between text-emerald-600 font-bold text-base">
                                    <span>Total Transfer</span>
                                    <span>Rp 120.000</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Form Upload --}}
                    <div class="md:w-7/12 bg-white p-8 rounded-3xl shadow-lg border border-slate-100">
                        <h3 class="text-xl font-bold text-slate-800 mb-6">Konfirmasi Pembayaran</h3>

                        @if($santri->pembayaran && $santri->pembayaran->status == 'rejected')
                            <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-xl border border-red-100 text-sm">
                                <strong>Pembayaran Ditolak:</strong>
                                {{ $santri->pembayaran->catatan_admin ?? 'Bukti tidak valid.' }}. Silakan upload ulang.
                            </div>
                        @endif

                        <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data"
                            class="space-y-5">
                            @csrf
                            <input type="hidden" name="santri_id" value="{{ $santri->id }}">

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-sm font-bold text-slate-700 mb-1 block">Nama Pengirim</label>
                                    <input type="text" name="nama_pengirim" required
                                        class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:ring-emerald-500 focus:border-emerald-500"
                                        placeholder="Nama di Rekening">
                                </div>
                                <div>
                                    <label class="text-sm font-bold text-slate-700 mb-1 block">Bank Asal</label>
                                    <input type="text" name="bank_asal"
                                        class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:ring-emerald-500 focus:border-emerald-500"
                                        placeholder="Cth: BRI, BCA">
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-bold text-slate-700 mb-1 block">Nominal Transfer</label>
                                <div class="relative">
                                    <span
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 text-sm">Rp</span>
                                    <input type="number" name="nominal" value="120000" required
                                        class="w-full pl-10 px-4 py-3 rounded-xl border border-slate-200 text-sm font-mono font-bold focus:ring-emerald-500 focus:border-emerald-500">
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-bold text-slate-700 mb-1 block">Tanggal Transfer</label>
                                <input type="date" name="tanggal_transfer" value="{{ date('Y-m-d') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            </div>

                            <div>
                                <label class="text-sm font-bold text-slate-700 mb-1 block">Bukti Transfer</label>
                                <div
                                    class="border-2 border-dashed border-slate-300 rounded-xl p-6 text-center hover:bg-slate-50 transition cursor-pointer relative">
                                    <input type="file" name="bukti_transfer" accept="image/*" required
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                        onchange="previewFile(this)">
                                    <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 mb-2"></i>
                                    <p class="text-sm text-slate-500 font-medium" id="file-label">Klik untuk upload foto</p>
                                    <p class="text-xs text-slate-400 mt-1">Max 2MB (JPG/PNG)</p>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                                Kirim Konfirmasi
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function previewFile(input) {
            const file = input.files[0];
            if (file) {
                document.getElementById('file-label').innerText = "Terpilih: " + file.name;
                document.getElementById('file-label').classList.add('text-emerald-600');
            }
        }
    </script>
@endsection