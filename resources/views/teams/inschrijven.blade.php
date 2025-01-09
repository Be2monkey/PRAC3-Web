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
                    <h1 class="text-xl font-bold mb-6">Teams Inschrijven</h1>

                    <div class="mt-4">
                        <form action="{{ route('teams.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="teamName" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Team Naam</label>
                                <input
                                    id="teamName"
                                    type="text"
                                    name="teamName"
                                    class="mt-1 block w-full text-black border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                                    required>
                            </div>

                            <div>
                                <label for="points" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Punten</label>
                                <input
                                    id="points"
                                    type="number"
                                    name="points"
                                    class="mt-1 block w-full text-black border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
                                    required>
                            </div>

                            <div>
                                <button
                                    type="submit"
                                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    Inschrijven
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
