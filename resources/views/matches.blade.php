<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Matches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(auth()->check() && auth()->user()->admin === 1)
                        <div class="mb-4">
                            <a href="{{ route('matches.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create Match</a>
                        </div>
                    @endif

                    <div>
                        <h1 class="text-2xl font-bold mb-4">Matches:</h1>
                        @if($matches->isNotEmpty())
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($matches as $match)
                                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                        <h2 class="text-lg font-semibold mb-2">{{ $match->team1->name }} vs {{ $match->team2->name }}</h2>
                                        <p class="text-sm">Team 1: {{ $match->team1->name }}</p>
                                        <p class="text-sm">Punten team 1: {{ $match->team1->points }}</p>
                                        <p class="text-sm">Team 2: {{ $match->team2->name }}</p>
                                        <p class="text-sm">Punten team 2: {{ $match->team2->points }}</p>
                                        @if(auth()->check() && auth()->user()->admin === 1)
                                        <a href="{{ route('matches.edit', ['match' => $match->id]) }}" class="text-blue-500 hover:underline">edit / add results</a>
                                        <form action="{{ route('matches.destroy', $match->id) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-red-500 hover:underline">delete match?</button>
                                            @endif
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-600 dark:text-gray-400">No matches available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
