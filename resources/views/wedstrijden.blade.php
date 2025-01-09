<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Matches:</h1>
                    @if(auth()->check() && auth()->user()->admin === 1)
                    <a href="{{ route('matches.create') }}">Create match</a>
                    @endif
                    <div>
                    <h1>Upcoming matches</h1>

                        @foreach ($matches as $match )
                            <p>Team 1: {{ $match->team1->name }}</p>
                            <p>Team 2: {{ $match->team2->name }}</p>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
