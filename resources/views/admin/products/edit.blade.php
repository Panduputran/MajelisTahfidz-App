@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="max-w-4xl mx-auto">

        <a href="{{ route('admin.products.index') }}"
            class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-emerald-600 mb-6 transition">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                <h2 class="text-lg font-bold text-slate-800">Edit Produk: {{ $product->name }}</h2>
            </div>

            <div class="p-8">
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Produk</label>
                            <input type="text" name="name" required value="{{ old('name', $product->name) }}"
                                class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                            <select name="category" required
                                class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm">
                                @foreach(['Buku & Kitab', 'Pakaian & Atribut', 'Makanan & Minuman', 'Herbal', 'Lainnya'] as $cat)
                                    <option value="{{ $cat }}" {{ $product->category == $cat ? 'selected' : '' }}>{{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Status</label>
                            <select name="is_active" required
                                class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm">
                                <option value="1" {{ $product->is_active ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Arsipkan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Harga (Rp)</label>
                            <input type="number" name="price" required value="{{ old('price', $product->price) }}"
                                class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Stok</label>
                            <input type="number" name="stock" required value="{{ old('stock', $product->stock) }}"
                                class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi</label>
                            <textarea name="description" rows="4" required
                                class="w-full px-4 py-3 rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 transition shadow-sm">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Foto Produk (Biarkan kosong jika
                                tidak diubah)</label>
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-24 h-24 bg-slate-100 rounded-xl border-2 border-dashed border-slate-300 flex items-center justify-center overflow-hidden relative">
                                    <img id="preview" src="{{ $product->image ? asset('storage/' . $product->image) : '' }}"
                                        class="{{ $product->image ? '' : 'hidden' }} absolute inset-0 w-full h-full object-cover">
                                    <i class="fa-solid fa-image text-slate-300 text-2xl {{ $product->image ? 'hidden' : '' }}"
                                        id="icon-preview"></i>
                                </div>
                                <input type="file" name="image" accept="image/*" onchange="previewImage(this)"
                                    class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition cursor-pointer">
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100 flex justify-end gap-3">
                        <a href="{{ route('admin.products.index') }}"
                            class="px-6 py-3 rounded-xl font-bold text-slate-500 hover:bg-slate-100 transition">Batal</a>
                        <button type="submit"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg">
                            Simpan Perubahan
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
                reader.onload = function (e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('preview').classList.remove('hidden');
                    document.getElementById('icon-preview').classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection