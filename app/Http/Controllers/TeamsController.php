<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{

    public function index()
    {
        $teams = Team::all();
        return view('teams.index')->with('teams', $teams);
    }

    public function create()
    {
        return view('teams.create');
    }

    public function inschrijven(Request $request)
    {
        return view('teams.inschrijven');
    }

    public function store(Request $request)
    {
        $newTeam = new Team();
        $newTeam->teamName = $request->teamName;
        $newTeam->numberOfPlayers = $request->numberOfPlayers;
        $newTeam->playerNames = $request->playerNames;
        $newTeam->save();

        return redirect()->route('teams.index');
    }

    public function edit(Team $team){
        return view('teams.edit', ['team' => $team]);
    }

    public function update(Request $request , Team $team){
        $team->teamName = $request->teamName;
        $team->numberOfPlayers = $request->numberOfPlayers;
        $team->playerNames = $request->playerNames;
        $team->save();

        return redirect()->route('teams.index');
    }

    public function destroy(Team $team){
        $team->delete();

        return redirect()->route('teams.index');

    }
}
