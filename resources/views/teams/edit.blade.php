<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Teams overzicht:") }}

                    <div >
                        <form action="{{ route('teams.update', ['team' => $team->id]) }}" method="POST">
                            @csrf
                            <label>Team name</label>
                            <input class="text-black border-solid border-2 border-black m-4" type="string" name="teamName" value="{{ $team->teamName }}"><br>

                            <label>Number of players</label>
                            <input class="text-black border-solid border-2 border-black m-4" type="number" name="numberOfPlayers" value="{{ $team->numberOfPlayers }}"><br>

                            <label>player names</label>
                            <textarea class="text-black border-solid border-2 border-black m-4" rows="10" name="playerNames" value="{{ $team->playerNames }}"></textarea><br>
                            <input type="submit" class="styled-button" value="Submit">
                            </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
