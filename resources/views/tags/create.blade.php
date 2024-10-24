@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Create Tag</h1>

        <form action="{{ route('tags.store') }}" method="POST" class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tag Name:</label>
                <input type="text" name="name" id="name" required class="block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-700 dark:text-white transition duration-150 ease-in-out" />
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('tags.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-600 transition duration-150 ease-in-out">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 transition duration-150 ease-in-out">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection
