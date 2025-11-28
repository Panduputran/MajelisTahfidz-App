@extends('layouts.admin')

@section('title', 'View News Article')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-900">{{ $news->title }}</h1>
            <div class="flex space-x-2">
                <a href="{{ route('admin.news.edit', $news) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
                    Edit Article
                </a>
                <a href="{{ route('admin.news.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg font-medium">
                    Back to List
                </a>
            </div>
        </div>

        <div class="p-6">
            <!-- Article Meta -->
            <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Author</h3>
                    <p class="text-sm text-gray-900">{{ $news->author ?: 'Not specified' }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Category</h3>
                    <p class="text-sm text-gray-900">{{ $news->category }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Status</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $news->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $news->is_published ? 'Published' : 'Draft' }}
                    </span>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Created</h3>
                    <p class="text-sm text-gray-900">{{ $news->created_at->format('M d, Y H:i') }}</p>
                </div>
                @if($news->published_at)
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Published At</h3>
                        <p class="text-sm text-gray-900">{{ $news->published_at->format('M d, Y H:i') }}</p>
                    </div>
                @endif
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Featured</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $news->is_featured ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $news->is_featured ? 'Yes' : 'No' }}
                    </span>
                </div>
            </div>

            <!-- Featured Image -->
            @if($news->image)
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Featured Image</h3>
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="max-w-full h-auto rounded-lg shadow">
                </div>
            @endif

            <!-- Article Content -->
            <div>
                <h3 class="text-sm font-medium text-gray-500 mb-2">Content</h3>
                <div class="prose max-w-none border rounded-lg p-4 bg-gray-50">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
