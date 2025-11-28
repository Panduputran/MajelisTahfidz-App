@extends('layouts.admin')

@section('title', 'Gallery Management')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Gallery Management</h1>
    <a href="{{ route('admin.gallery.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
        Add New Image
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">All Gallery Items</h3>
    </div>

    <div class="p-6">
        @if($gallery->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($gallery as $item)
                    <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm border">
                        <!-- Image -->
                        <div class="aspect-w-16 aspect-h-12 bg-gray-200">
                            @if($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}"
                                     class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-4">
                            <h4 class="font-medium text-gray-900 mb-1">{{ $item->title }}</h4>
                            @if($item->description)
                                <p class="text-sm text-gray-600 mb-2">{{ Str::limit($item->description, 50) }}</p>
                            @endif

                            <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                                <span>{{ $item->category }}</span>
                                <span>{{ $item->created_at->format('M d, Y') }}</span>
                            </div>

                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $item->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $item->is_published ? 'Published' : 'Draft' }}
                                </span>
                                @if($item->is_featured)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                        Featured
                                    </span>
                                @endif
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.gallery.show', $item) }}" class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 rounded text-sm font-medium">
                                    View
                                </a>
                                <a href="{{ route('admin.gallery.edit', $item) }}" class="flex-1 text-center bg-blue-100 hover:bg-blue-200 text-blue-800 px-3 py-1 rounded text-sm font-medium">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.gallery.destroy', $item) }}" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-red-100 hover:bg-red-200 text-red-800 px-3 py-1 rounded text-sm font-medium">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($gallery->hasPages())
                <div class="mt-6">
                    {{ $gallery->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No gallery items</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by adding your first image.</p>
                <div class="mt-6">
                    <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Add New Image
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
