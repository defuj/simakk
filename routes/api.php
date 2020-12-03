<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\QuestionnairesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuestionsController;


Route::get('/teams', [TeamsController::class, 'index']);
Route::post('/registerUser', [UsersController::class,'store']);

Route::get('/createKuesioner', [QuestionnairesController::class,'create']);
Route::post('/deleteKuesioner', [QuestionnairesController::class,'destroy']);
Route::get('/kuesioner', [QuestionnairesController::class,'index']);
Route::post('/searchKuesioner', [QuestionnairesController::class,'search']);
Route::post('/countQuestions', [QuestionsController::class,'count']);

Route::post('/getKuesioner', [QuestionnairesController::class,'show']);
Route::post('/updateTypeKuesioner', [QuestionnairesController::class,'updateType']);
Route::post('/updateStatusKuesioner', [QuestionnairesController::class,'updateStatus']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
