@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto elegant-fade-in">
        <h1 class="text-2xl font-semibold arabic-text mb-4">Kontak</h1>
        <div class="w-16 h-1 bg-gradient-to-r from-[var(--brand)] to-[var(--islamic-gold)] mb-6"></div>

        <div class="mt-4 grid md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-semibold">Hubungi Kami</h4>
                <ul class="mt-2 text-gray-700">
                    <li>📞 <a href="https://wa.me/6285283869145" class="underline">+62 812-3456-7890 (WhatsApp)</a></li>
                    <li>✉️ <a href="mailto:info@tahfidz.example" class="underline">info@tahfidz.example</a></li>
                    <li>📍 <a target="_blank" href="https://www.google.com/maps" class="underline">Alamat lengkap — lihat di Google Maps</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold">Form & Lokasi</h4>
                <p class="text-gray-700 mt-2">Semua nomor dan alamat di atas dapat diklik untuk kemudahan akses. Jika ingin konsultasi langsung, kirim pesan melalui WhatsApp.</p>
            </div>
        </div>
    </div>
@endsection
