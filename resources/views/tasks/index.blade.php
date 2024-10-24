@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Your Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mb-4">
            Create a new task
        </a>
        <ul class="space-y-4">
            @foreach ($tasks as $task)
                <li class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-semibold text-blue-600 hover:underline dark:text-blue-400">
                        <a href="{{ route('tasks.edit', $task->id) }}">
                            {{ $task->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">{{ $task->description }}</p>
                    <p class="text-sm mt-2 {{ $task->is_completed ? 'text-green-500' : 'text-red-500' }}">
                        {{ $task->is_completed ? 'Completed' : 'Incomplete' }}
                    </p>
                    <p class="text-sm mt-2 text-gray-500">
                        Status: <span class="{{ $task->status === 'completed' ? 'text-green-500' : ($task->status === 'in_progress' ? 'text-yellow-500' : 'text-red-500') }}">
                            {{ ucfirst($task->status) }}
                        </span>
                    </p>
                    @if ($task->due_date)
                        <p class="text-sm mt-2 text-gray-500">Due Date: {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</p>
                    @endif
                    <div class="mt-4">
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block ml-2">
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
