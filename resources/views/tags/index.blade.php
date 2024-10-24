@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Tags</h1>

        <form action="{{ route('tags.index') }}" method="GET" class="mb-6 flex items-center space-x-4">
            <input type="text" name="search" placeholder="Search tags..." class="w-full border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm py-2 px-4 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white transition duration-150 ease-in-out" />
            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 transition duration-150 ease-in-out">
                Search
            </button>
        </form>

        <div class="mb-6">
            <a href="{{ route('tags.create') }}" class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 transition duration-150 ease-in-out">
                Create a new tag
            </a>
        </div>

        <ul class="space-y-6">
            @foreach ($tags as $tag)
                <li class="flex justify-between items-center bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                    <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $tag->name }}</span>

                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg shadow-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 dark:focus:ring-red-600 transition duration-150 ease-in-out">
                            Delete
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
