<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Match') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-xl font-bold mb-6">Edit Match</h1>

                    <form action="{{ route('matches.update', ['match' => $match->id]) }}" method="POST" class="space-y-6">
                        @csrf
                        <!-- Removed @method('PUT') -->

                        <!-- Match Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Match Name</label>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ $match->name }}"
                                class="mt-1 block w-full text-black border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                                required>
                        </div>

                        <!-- Team 1 -->
                        <div>
                            <label for="team1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Team 1</label>
                            <select
                                id="team1"
                                name="team1_id"
                                class="mt-1 block w-full text-black border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                                required>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ $team->id == $match->team1_id ? 'selected' : '' }}>
                                        {{ $team->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Team 2 -->
                        <div>
                            <label for="team2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Team 2</label>
                            <select
                                id="team2"
                                name="team2_id"
                                class="mt-1 block w-full text-black border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                                required>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ $team->id == $match->team2_id ? 'selected' : '' }}>
                                        {{ $team->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Field -->
                        <div>
                            <label for="field" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Field</label>
                            <select
                                id="field"
                                name="field"
                                class="mt-1 block w-full text-black border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                                required>
                                <option value="field 1" {{ $match->field == 'field 1' ? 'selected' : '' }}>Field 1</option>
                                <option value="field 2" {{ $match->field == 'field 2' ? 'selected' : '' }}>Field 2</option>
                                <option value="field 3" {{ $match->field == 'field 3' ? 'selected' : '' }}>Field 3</option>
                                <option value="field 4" {{ $match->field == 'field 4' ? 'selected' : '' }}>Field 4</option>
                                <option value="field 5" {{ $match->field == 'field 5' ? 'selected' : '' }}>Field 5</option>
                            </select>
                        </div>

                        <!-- Time -->
                        <div>
                            <label for="time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Time</label>
                            <input
                                id="time"
                                type="text"
                                name="time"
                                value="{{ $match->time }}"
                                class="mt-1 block w-full text-black border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                                required>
                        </div>

                        <!-- Points for Admin Only -->
                        @if(auth()->check() && auth()->user()->admin === 1)
                            <div>
                                <label for="team1_points" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Points for Team 1</label>
                                <input
                                    id="team1_points"
                                    type="number"
                                    name="team1_points"
                                    value="{{ $match->team1->points }}"
                                    class="mt-1 block w-full text-black border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                                    min="0">
                            </div>

                            <div>
                                <label for="team2_points" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Points for Team 2</label>
                                <input
                                    id="team2_points"
                                    type="number"
                                    name="team2_points"
                                    value="{{ $match->team2->points }}"
                                    class="mt-1 block w-full text-black border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                                    min="0">
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <div>
                            <button
                                type="submit"
                                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Update Match
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
