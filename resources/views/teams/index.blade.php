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

                    <a href="{{route('teams.create')}}"></a>
                        <table>
                            <thead>
                                <th>Name </th>
                                <th>points</th>
                                <th>creator</th>
                                <th>Acties </th>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{$team->teamName}}</td>
                                        <td>{{$team->points}}</td>
                                        <td>{{ $team->creator->name }}</td>                                        <td><a href="{{route('teams.edit', $team->id)}}">Edit</a>
                                            <form action={{route( 'teams.destroy' , $team->id)}} method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="verwijderen">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>
