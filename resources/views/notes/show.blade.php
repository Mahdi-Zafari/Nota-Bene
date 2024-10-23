@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">{{ $note->title }}</h1>
        <p class="text-gray-800 dark:text-gray-300 mb-4">{{ $note->content }}</p>
        <p class="text-gray-500 dark:text-gray-400 mt-2">
            Tags:
            @foreach ($note->tags as $tag)
                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-1 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $tag->name }}</span>
            @endforeach
        </p>

        <div class="mt-4 space-x-2">
            <a href="{{ route('notes.index') }}" class="inline-block bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                Back to Notes
            </a>
            <a href="{{ route('notes.edit', $note->id) }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Edit Note
            </a>
            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                    Delete Note
                </button>
            </form>
        </div>
    </div>
@endsection
