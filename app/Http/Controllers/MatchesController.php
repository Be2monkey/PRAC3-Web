<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Amatch;

class MatchesController extends Controller
{


    public function matches()
    {
        $matches = Amatch::with(['team1', 'team2'])->get(); // Retrieve matches with related teams
        return view('matches', compact('matches')); // Pass the data to the view
    }

    public function create(){
        $teams = Team::all();

        return view('matches.create', compact('teams'));
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id',
            'field' => 'required|string|in:field 1,field 2,field 3,field 4,field 5',
            'time' => 'required|string',
        ]);

        // Create a new Amatch record
        $match = new Amatch();
        $match->name = $validated['name'];
        $match->team1_id = $validated['team1_id'];
        $match->team2_id = $validated['team2_id'];
        $match->field = $validated['field'];
        $match->time = $validated['time'];
        $match->referee_id = auth()->id();

        // Save the match to the database
        $match->save();

        // Retrieve all matches to pass to the view
        $matches = Amatch::with(['team1', 'team2'])->get();

        // Redirect to the matches view with the data
        return redirect()->route('matches')->with(['matches' => $matches]);
    }}
