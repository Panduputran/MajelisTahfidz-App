@extends('layouts.admin')

@section('title', 'View Gallery Item')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-900">{{ $gallery->title }}</h1>
            <div class="flex space-x-2">
                <a href="{{ route('admin.gallery.edit', $gallery) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
                    Edit Item
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg font-medium">
                    Back to List
                </a>
            </div>
        </div>

        <div class="p-6">
            <!-- Image -->
            @if($gallery->image_path)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="max-w-full h-auto rounded-lg shadow-lg mx-auto block">
                </div>
            @endif

            <!-- Item Meta -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Title</h3>
                    <p class="text-sm text-gray-900">{{ $gallery->title }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Category</h3>
                    <p class="text-sm text-gray-900">{{ $gallery->category }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Status</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $gallery->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $gallery->is_published ? 'Published' : 'Draft' }}
                    </span>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Sort Order</h3>
                    <p class="text-sm text-gray-900">{{ $gallery->sort_order }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Created</h3>
                    <p class="text-sm text-gray-900">{{ $gallery->created_at->format('M d, Y H:i') }}</p>
                </div>
                @if($gallery->published_at)
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Published At</h3>
                        <p class="text-sm text-gray-900">{{ $gallery->published_at->format('M d, Y H:i') }}</p>
                    </div>
                @endif
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Featured</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $gallery->is_featured ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $gallery->is_featured ? 'Yes' : 'No' }}
                    </span>
                </div>
            </div>

            <!-- Description -->
            @if($gallery->description)
                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Description</h3>
                    <div class="border rounded-lg p-4 bg-gray-50">
                        {!! nl2br(e($gallery->description)) !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
