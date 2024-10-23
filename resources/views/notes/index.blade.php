@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Your Notes</h1>
        <a href="{{ route('notes.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mb-4">
            Create a new note
        </a>
        <ul class="space-y-4">
            @foreach ($notes as $note)
                <li class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-semibold text-blue-600 hover:underline dark:text-blue-400">
                        <a href="{{ route('notes.show', $note->id) }}">
                            {{ $note->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $note->content }}</p>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">
                        Tags:
                        @foreach ($note->tags as $tag)
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-1 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $tag->name }}</span>
                        @endforeach
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('notes.edit', $note->id) }}" class="inline-block bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">
                            Edit
                        </a>
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
