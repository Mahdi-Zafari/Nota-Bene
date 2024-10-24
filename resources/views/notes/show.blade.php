@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-900 dark:text-gray-100">{{ $note->title }}</h1>

        <p class="text-lg text-gray-800 dark:text-gray-300 leading-relaxed mb-6">
            {{ $note->content }}
        </p>

        <p class="text-gray-600 dark:text-gray-400 mb-8">
            <span class="font-semibold">Tags:</span>
            @foreach ($note->tags as $tag)
                <span class="inline-block bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-3 py-1 rounded-full dark:bg-indigo-900 dark:text-indigo-300">
                    {{ $tag->name }}
                </span>
            @endforeach
        </p>

        <div class="flex space-x-4">
            <a href="{{ route('notes.index') }}" class="inline-block bg-gray-600 hover:bg-gray-700 text-white py-2 px-6 rounded-lg shadow-lg focus:outline-none focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 transition duration-150 ease-in-out">
                Back to Notes
            </a>

            <a href="{{ route('notes.edit', $note->id) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-600 transition duration-150 ease-in-out">
                Edit Note
            </a>

            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block bg-red-600 hover:bg-red-700 text-white py-2 px-6 rounded-lg shadow-lg focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-600 transition duration-150 ease-in-out">
                    Delete Note
                </button>
            </form>
        </div>
    </div>
@endsection
