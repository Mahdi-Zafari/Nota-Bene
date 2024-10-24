@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Tags</h1>

        <form action="{{ route('tags.index') }}" method="GET" class="mb-4">
            <input type="text" name="search" placeholder="Search tags..." class="border rounded px-2 py-1" />
            <button type="submit" class="bg-blue-500 text-white rounded px-4 py-1">Search</button>
        </form>

        <a href="{{ route('tags.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mb-4">
            Create a new tag
        </a>
        <ul class="space-y-4">
            @foreach ($tags as $tag)
                <li class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                    <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $tag->name }}</span>
                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="inline-block ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">
                            Delete
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
