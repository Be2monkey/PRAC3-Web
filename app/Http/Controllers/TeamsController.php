<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{

    public function index()
    {
        $teams = Team::with('creator')->get(); // Load the creator relationship
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
        $newTeam->name = $request->teamName;
        $newTeam->points = $request->points;
        $newTeam->creator_id = auth()->id();

        $newTeam->save();

        return redirect()->route('teams.index');
    }

    public function edit(Team $team){
        if (auth()->check() && (auth()->user()->admin === 1 || auth()->user()->id === $team->creator_id)) {
            return view('teams.edit', ['team' => $team]);
        }
    }

    public function update(Request $request , Team $team){
        $team->name = $request->teamName;
        $team->creator_id = auth()->id();
        $team->points = $request->points;
        $team->save();

        return redirect()->route('teams.index');
    }

    public function destroy(Team $team){
        $team->delete();

        return redirect()->route('teams.index');

    }
}
