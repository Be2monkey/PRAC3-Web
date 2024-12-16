<?php

namespace App\Http\Controllers;

use App\Models\Soccermatch;
use App\Models\Team;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getTeams() {
        $teams = Team::all();
        $json = [];

        foreach($teams as $team) {
            $match = Soccermatch::find($team->id);
            $json[] = [
                "match" => $match->name,
                "teamName" => $team->teamName,
                "numberOfPlayers" => $team->numberOfPlayers,
                "playerNames" => $team->playerNames,
            ];

        }


        return response()->json($json);
    }
}
