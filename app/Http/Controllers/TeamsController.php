<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamsController extends Controller
{
    public function index(){
        //$teams = DB::table('teams')->get();
        $teams = Team::all();
        return response()->json($teams);
    }
    
}
