<x-app-layout>
    <x-slot name="header">
        <div class="flex space-x-4">
            <button id="userStatsTab" class="tab-button active pb-2 focus:outline-none text-gray-900 dark:text-white">
                Stats
            </button>
            <button id="exploreTab" class="tab-button pb-2 focus:outline-none text-gray-900 dark:text-white">
                Explore
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="userStatsSection" class="tab-content">
                @include('sections.user-stats')
            </div>

            <div id="exploreSection" class="tab-content hidden">
                @include('sections.explore', ['publicNotes' => $publicNotes])
            </div>
        </div>
    </div>

    @vite(['resources/js/dashboard.js', 'resources/css/dashboard.css'])
</x-app-layout>
