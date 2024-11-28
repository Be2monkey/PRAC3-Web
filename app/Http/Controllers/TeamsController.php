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
}
