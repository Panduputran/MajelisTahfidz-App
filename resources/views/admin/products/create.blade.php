@extends('layouts.admin')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    
    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-emerald-600 mb-6 transition">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6 border-b border-slate-100 bg-slate-50/50">
            <h2 class="text-lg font-bold text-slate-800">Form Produk</h2>
        </div>
        
        <div class="p-8">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Nama Produk --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Produk</label>
                        <input type="text" name="name" required value="{{ old('name') }}" class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm placeholder:text-slate-300" placeholder="Contoh: Mushaf Al-Qur'an A5">
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                        <select name="category" required class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm">
                            <option value="">Pilih Kategori...</option>
                            <option value="Buku & Kitab">Buku & Kitab</option>
                            <option value="Pakaian & Atribut">Pakaian & Atribut</option>
                            <option value="Makanan & Minuman">Makanan & Minuman</option>
                            <option value="Herbal">Herbal</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Status Penjualan</label>
                        <select name="is_active" required class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm">
                            <option value="1">Aktif (Dijual)</option>
                            <option value="0">Arsipkan (Sembunyikan)</option>
                        </select>
                    </div>

                    {{-- Harga --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Harga (Rp)</label>
                        <input type="number" name="price" required value="{{ old('price') }}" class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm" placeholder="0">
                    </div>

                    {{-- Stok --}}
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Stok Awal</label>
                        <input type="number" name="stock" required value="{{ old('stock') }}" class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm" placeholder="0">
                    </div>

                    {{-- Deskripsi --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Produk</label>
                        <textarea name="description" rows="4" required class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm" placeholder="Jelaskan detail produk...">{{ old('description') }}</textarea>
                    </div>

                    {{-- Gambar --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Foto Produk</label>
                        <div class="flex items-center gap-4">
                            <div class="w-24 h-24 bg-slate-100 rounded-xl border-2 border-dashed border-slate-300 flex items-center justify-center overflow-hidden relative">
                                <img id="preview" class="absolute inset-0 w-full h-full object-cover hidden">
                                <i class="fa-solid fa-image text-slate-300 text-2xl" id="icon-preview"></i>
                            </div>
                            <input type="file" name="image" accept="image/*" onchange="previewImage(this)" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition cursor-pointer">
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview').classList.remove('hidden');
                document.getElementById('icon-preview').classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection