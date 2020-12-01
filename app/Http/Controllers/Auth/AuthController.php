<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Exception;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {

    }

    
    public function SocialSignup($provider)
    {
        // Socialite will pick response data automatic 
        $user = Socialite::driver($provider)->stateless()->user();
        return response()->json($user);
    }

    public function RegisterUser(Request $request)
    {
        //$teams = DB::table('teams')->get();
        //$user = Team::all();
        return $request;
    }
}
