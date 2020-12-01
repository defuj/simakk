<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\Auth\AuthController;



Route::get('/teams', [TeamsController::class, 'index']);
Route::post('/userlogin', [AuthController::class,'RegisterUser']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
