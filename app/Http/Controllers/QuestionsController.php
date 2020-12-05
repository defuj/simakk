<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    public function addQuestion(Request $request)
    {
        $insert = DB::table('questions')->insert([
            'questionnaire_id'          => $request->id, 
            'question_content'         => '', 
            'question_type'            => 'multiple_choice',//multiple_choice or essay
            'created_at'                => Date('Y-d-m h:i:s'),
            'updated_at'                => Date('Y-d-m h:i:s'),
        ]);

        if($insert){
            $question = DB::table('questions')->where('questionnaire_id', $request->id)->get();
            return response()->json($question);
        }else{
            $result = [];

            return $result;
        }
    }

    public function getQuestion(Request $request)
    {
        $question = DB::table('questions')->where('questionnaire_id', $request->id)->get();
        return response()->json($question);
    }

    public function updateQuestionContent(Request $request)
    {
        $question = DB::table('questions')->where(
            ['question_id' => $request->question_id],
            ['questionnaire_id' => $request->questionnaire_id]
        )->update(['question_content' => $request->question_content]);
        return $question;
    }

    public function updateQuestionRequire(Request $request)
    {
        $question = DB::table('questions')->where(
            ['question_id' => $request->question_id],
            ['questionnaire_id' => $request->questionnaire_id]
        )->update(['question_require' => $request->question_require]);
        return $question;
    }

    public function deleteQuestion(Request $request){
        $delete = DB::table('questions')->where('question_id',$request->id);
        return $delete->delete();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function count(Request $request)
    {
        $questionnaire = DB::table('questions')->where('questionnaire_id', $request->id)->count();
        return $questionnaire;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
