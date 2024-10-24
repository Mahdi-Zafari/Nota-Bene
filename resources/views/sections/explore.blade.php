<div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 space-y-6">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Public Notes</h2>

    <div class="mb-4">
        <input
            type="text"
            id="search"
            placeholder="Search notes..."
            class="w-full p-2 border border-gray-300 rounded-lg dark:border-gray-600 dark:bg-gray-700 dark:text-white"
            oninput="filterNotes()"
        />
    </div>

    @if ($publicNotes->isEmpty())
        <p class="text-gray-500 dark:text-gray-400">No public notes available.</p>
    @else
        <div id="notes-container">
            @foreach ($publicNotes as $note)
                <div class="note border-b border-gray-200 dark:border-gray-700 pb-4 mb-4">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $note->title }}</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{ Str::limit($note->content, 150) }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">By {{ $note->user->name }} | {{ $note->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
