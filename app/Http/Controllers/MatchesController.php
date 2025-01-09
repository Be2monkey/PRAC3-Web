<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Amatch;
use PHPUnit\Framework\NoChildTestSuiteException;

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
            'team1_points' => 'nullable|integer|min:0', // Points for team 1
            'team2_points' => 'nullable|integer|min:0', // Points for team 2
        ]);

        // Create a new Amatch record
        $match = new Amatch();
        $match->name = $validated['name'];
        $match->team1_id = $validated['team1_id'];
        $match->team2_id = $validated['team2_id'];
        $match->field = $validated['field'];
        $match->time = $validated['time'];
        $match->referee_id = auth()->id();

        // Save the match record to the database
        $match->save();

        // Update points for Team 1
        if (auth()->check() && auth()->user()->admin === 1 && isset($validated['team1_points'])) {
            $team1 = Team::find($validated['team1_id']);
            $team1->points = $validated['team1_points']; // Directly set points
            $team1->save();
        }

        // Update points for Team 2
        if (auth()->check() && auth()->user()->admin === 1 && isset($validated['team2_points'])) {
            $team2 = Team::find($validated['team2_id']);
            $team2->points = $validated['team2_points']; // Directly set points
            $team2->save();
        }

        // Redirect to the matches route
        return redirect()->route('matches')->with('success', 'Match created successfully and points updated!');
    }

    public function edit(Amatch $match)
    {
        if (auth()->check() && (auth()->user()->admin === 1)) {
            $teams = Team::all(); // Fetch all teams for dropdowns
            return view('matches.edit', ['match' => $match])->with('teams', $teams);
        }
    }
    public function update(Request $request, Amatch $match)
   {
    $match->name = $request->name;
    $match->team1_id = $request->team1_id;
    $match->team2_id = $request->team2_id;
    $match->field = $request->field;
    $match->time = $request->time;
    $match->referee_id = auth()->id();
    $match->save();

    if ($request->filled('team1_points')) {
        $team1 = $match->team1;
        if ($team1) {
            $team1->points = $request->team1_points;
            $team1->save();
        }
    }


    if ($request->filled('team2_points')) {
        $team2 = $match->team2;
        if ($team2) {
            $team2->points = $request->team2_points;
            $team2->save();
        }
    }


    return redirect()->route('matches');
}


    public function destroy(Amatch $match){
        $match->delete();
        return redirect()->route('matches');
    }
}
