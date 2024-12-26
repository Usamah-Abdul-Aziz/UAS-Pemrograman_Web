@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4">
    <!-- Title Section -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Daftar Artikel</h1>
        @if(request()->has('query'))
            <p class="text-gray-600 mt-2">
                Search Results for: <span class="font-semibold text-blue-600">"{{ request()->query }}"</span>
            </p>
        @endif
    </div>

    <!-- Blog List -->
    @if(request()->has('query') && (!isset($blogs) || $blogs->isEmpty()))
        <p class="text-center text-gray-500">No blogs found matching your search.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($blogs as $blog)
                <!-- Blog Card -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- Image Placeholder -->
                    <div class="h-40 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400 text-xl">No Image</span>
                    </div>

                    <!-- Blog Details -->
                    <div class="p-4">
                        <!-- Title -->
                        <a href="{{ route('blogs.show', $blog->id) }}" class="block text-lg font-semibold text-gray-800 hover:text-blue-500">
                            {{ $blog->title }}
                        </a>
                        <!-- Snippet -->
                        <p class="text-gray-600 mt-2">
                            {{ Str::limit($blog->content, 100) }}
                        </p>
                    </div>

                    <!-- Read More Button -->
                    <div class="bg-gray-100 p-4 text-right">
                        <a href="{{ route('blogs.show', $blog->id) }}" class="text-blue-500 font-medium hover:underline">
                            Read More →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
