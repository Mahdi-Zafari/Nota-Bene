@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-900 dark:text-gray-100">Your Notes</h1>

        <form action="{{ route('notes.index') }}" method="GET" class="flex items-center space-x-4 mb-6">
            <input type="text" name="search" placeholder="Search..." class="w-full border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 focus:outline-none focus:ring focus:ring-indigo-300 dark:focus:ring-indigo-600" />

            <select name="tag" class="border border-gray-300 dark:border-gray-700 rounded-lg px-4 py-2 text-gray-900 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 focus:outline-none focus:ring focus:ring-indigo-300 dark:focus:ring-indigo-600">
                <option value="">All Tags</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg px-5 py-2 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-600 transition duration-150 ease-in-out">
                Filter
            </button>
        </form>

        <div class="mb-6">
            <a href="{{ route('notes.create') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white py-2 px-6 rounded-lg focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-600 transition duration-150 ease-in-out">
                Create a new note
            </a>
        </div>

        <ul class="space-y-6">
            @foreach ($notes as $note)
                <li class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-indigo-600 hover:underline dark:text-indigo-400 mb-2">
                        <a href="{{ route('notes.show', $note->id) }}">
                            {{ $note->title }}
                        </a>
                    </h2>

                    <p class="text-gray-600 dark:text-gray-300 mt-2">
                        {{ $note->content }}
                    </p>

                    <p class="text-gray-500 dark:text-gray-400 mt-4">
                        Tags:
                        @foreach ($note->tags as $tag)
                            <span class="inline-block bg-indigo-100 text-indigo-800 text-xs font-medium mr-1 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </p>

                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('notes.edit', $note->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-600 transition duration-150 ease-in-out">
                            Edit
                        </a>
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-600 transition duration-150 ease-in-out">
                                Delete
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
