<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Match') }}
        </h2>
    </x-slot>
    <form action="{{route('matches.store')}}" method="POST">
        @csrf
        <label>Match name</label>
        <input type="text" name="name" id="name">
        <label>team 1</label>
        <select name="team1_id" id="team1">
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>
        <label>team 2</label>
        <select name="team2_id" id="team2">
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>
        <label>Field</label>
        <select name="field" id="field">
            <option value="field 1">Field 1</option>
            <option value="field 2">Field 2</option>
            <option value="field 3">Field 3</option>
            <option value="field 4">Field 4</option>
            <option value="field 5">Field 5</option>
        </select>
        <label>time</label>
        <input type="text" name="time" id="time">
        <input type="submit" class="styled-button" value="Submit">
        </form>

    </form>
</x-app-layout>
