<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\QuestionnairesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuestionsController;


Route::get('/teams', [TeamsController::class, 'index']);
Route::post('/registerUser', [UsersController::class,'store']);

Route::get('/kuesioner', [QuestionnairesController::class,'index']);
Route::get('/createKuesioner', [QuestionnairesController::class,'create']);
Route::post('/deleteKuesioner', [QuestionnairesController::class,'destroy']);
Route::post('/searchKuesioner', [QuestionnairesController::class,'search']);
Route::post('/getKuesioner', [QuestionnairesController::class,'show']);
Route::post('/updateTypeKuesioner', [QuestionnairesController::class,'updateType']);
Route::post('/updateStatusKuesioner', [QuestionnairesController::class,'updateStatus']);
Route::post('/updateTitleKuesioner', [QuestionnairesController::class,'updateTitle']);
Route::post('/updateDescriptionKuesioner', [QuestionnairesController::class,'updateDescription']);

Route::get('/getQuestionType', [QuestionsController::class,'getQuestionType']);
Route::post('/countQuestions', [QuestionsController::class,'count']);
Route::post('/getQuestion', [QuestionsController::class,'getQuestion']);
Route::post('/addQuestion', [QuestionsController::class,'addQuestion']);
Route::post('/deleteQuestion', [QuestionsController::class,'deleteQuestion']);
Route::post('/updateQuestionContent', [QuestionsController::class,'updateQuestionContent']);
Route::post('/updateQuestionRequire', [QuestionsController::class,'updateQuestionRequire']);
Route::post('/updateQuestionType', [QuestionsController::class,'updateQuestionType']);
Route::post('/getSkalaLinier', [QuestionsController::class,'getSkalaLinier']);
Route::post('/updateLabelMinimum', [QuestionsController::class,'updateLabelMinimum']);
Route::post('/updateLabelMaximum', [QuestionsController::class,'updateLabelMaximum']);
Route::post('/updateSkalaMinimum', [QuestionsController::class,'updateSkalaMinimum']);
Route::post('/updateSkalaMaximum', [QuestionsController::class,'updateSkalaMaximum']);




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
