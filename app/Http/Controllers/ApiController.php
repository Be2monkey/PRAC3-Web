<?php

namespace App\Http\Controllers;

use App\Models\Amatch;
use App\Models\Soccermatch;
use App\Models\Team;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Match_;

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

            ];

        }


        return response()->json($json);
    }

    public function matches()
    {
        $matches = Amatch::all();
        return response()->json($matches);
    }
}
