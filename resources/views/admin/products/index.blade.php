@extends('layouts.admin')

@section('title', 'Manajemen Produk')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    
    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
        <div>
            <h2 class="text-lg font-bold text-slate-800">Daftar Produk Store</h2>
            <p class="text-sm text-slate-500">Kelola barang yang dijual di SLM Store.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl text-sm font-bold transition shadow-sm flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah Produk
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-500 border-b uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-4 w-20">Gambar</th>
                    <th class="px-6 py-4">Nama Produk</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Harga</th>
                    <th class="px-6 py-4 text-center">Stok</th>
                    <th class="px-6 py-4 text-center">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($products as $item)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="w-12 h-12 rounded-lg bg-slate-100 overflow-hidden border border-slate-200">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-400">
                                        <i class="fa-solid fa-box"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-800">{{ $item->name }}</td>
                        <td class="px-6 py-4 text-slate-600">
                            <span class="bg-slate-100 px-2 py-1 rounded text-xs border border-slate-200">
                                {{ $item->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-mono font-bold text-emerald-600">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($item->stock <= 5)
                                <span class="text-red-600 font-bold">{{ $item->stock }}</span>
                            @else
                                <span class="text-slate-600">{{ $item->stock }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($item->is_active)
                                <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full font-bold">Aktif</span>
                            @else
                                <span class="bg-slate-100 text-slate-500 text-xs px-2 py-1 rounded-full font-bold">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.products.edit', $item->id) }}" class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition border border-amber-100" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition border border-red-100" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-slate-400 italic">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($products->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection