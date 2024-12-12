<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getTeams() {
        $teams = Team::all();
        $json = [];

        foreach($teams as $team) {
            $json[] = [
                "teams" => $team->teamName,
                "teams" => $team->numberOfPlayers,
                "teams" => $team->playerNames,


            ];
        }


        return response()->json($json);
    }
}
