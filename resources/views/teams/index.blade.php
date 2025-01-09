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
                    <h1 class="text-xl font-bold mb-4">Teams Overzicht</h1>

                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-gray-200 dark:border-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 border border-gray-200 dark:border-gray-600 text-left">Naam</th>
                                    <th class="px-4 py-2 border border-gray-200 dark:border-gray-600 text-left">Punten</th>
                                    <th class="px-4 py-2 border border-gray-200 dark:border-gray-600 text-left">Maker</th>
                                    @if(auth()->check() && auth()->user()->admin === 1)
                                        <th class="px-4 py-2 border border-gray-200 dark:border-gray-600 text-left">Acties</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800">
                                @foreach ($teams as $team)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="px-4 py-2 border border-gray-200 dark:border-gray-600">{{ $team->name }}</td>
                                        <td class="px-4 py-2 border border-gray-200 dark:border-gray-600">{{ $team->points }}</td>
                                        <td class="px-4 py-2 border border-gray-200 dark:border-gray-600">{{ $team->creator->name }}</td>
                                        @if(auth()->check() && auth()->user()->admin === 1 || auth()->user()->id === $team->creator_id)
                                            <td class="px-4 py-2 border border-gray-200 dark:border-gray-600">
                                                <a href="{{ route('teams.edit', $team->id) }}" class="text-blue-500 hover:underline">Bewerken</a>
                                                <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="inline-block ml-2">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="text-red-500 hover:underline">Verwijderen</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
