<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Amatch;

class MatchesController extends Controller
{


    public function matches()
    {
        // Eager load team1 and team2 relationships
        $matches = Amatch::with(['team1', 'team2'])->get();

        return view('wedstrijden', ['matches' => $matches]);
    }

    public function create(){
        $teams = Team::all();

        return view('matches.create', compact('teams'));
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id',
            'field' => 'required|string|in:field 1,field 2,field 3,field 4,field 5', // You can also add more validation if needed
        ]);

        // Create a new Amatch record
        $match = new Amatch();
        $match->team1_id = $validated['team1_id'];
        $match->team2_id = $validated['team2_id'];
        $match->field = $validated['field'];
        $match->time = ('time');
        $match->referee_id = auth()->id();

        // Save the match to the database
        $match->save();

        // Redirect back or to another route after storing the match
        return view('wedstrijden');
    }}
