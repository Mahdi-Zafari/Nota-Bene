@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Edit Note</h1>

        <form action="{{ route('notes.update', $note->id) }}" method="POST" class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title:</label>
                <input type="text" name="title" id="title" value="{{ $note->title }}" required class="block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-700 dark:text-white transition duration-150 ease-in-out" />
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Content:</label>
                <textarea name="content" id="content" rows="6" required class="block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-700 dark:text-white transition duration-150 ease-in-out">{{ $note->content }}</textarea>
            </div>

            <div>
                <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tags:</label>
                <select name="tags[]" id="tags" multiple class="block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-700 dark:text-white transition duration-150 ease-in-out">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $note->tags->contains($tag->id) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Hold down the Ctrl (Windows) / Command (Mac) button to select multiple tags.</p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('notes.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-600 transition duration-150 ease-in-out">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 transition duration-150 ease-in-out">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
