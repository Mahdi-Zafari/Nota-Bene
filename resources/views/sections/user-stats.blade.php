<div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h3 class="text-lg font-bold mb-4">{{ __('Stats') }}</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="bg-blue-100 dark:bg-blue-900 p-4 rounded-lg shadow-md">
                <h4 class="font-semibold text-gray-800 dark:text-gray-200">{{ __('Notes') }}</h4>
                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $noteCount }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Total notes created') }}</p>
            </div>

            <div class="bg-green-100 dark:bg-green-900 p-4 rounded-lg shadow-md">
                <h4 class="font-semibold text-gray-800 dark:text-gray-200">{{ __('Tasks') }}</h4>
                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $taskCount }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Total tasks pending') }}</p>
            </div>
        </div>
    </div>
</div>
