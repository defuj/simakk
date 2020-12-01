<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\QuestionnairesController;
use App\Http\Controllers\UsersController;


Route::get('/teams', [TeamsController::class, 'index']);
Route::post('/registerUser', [UsersController::class,'store']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
