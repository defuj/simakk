<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    public function updateLabelMinimum(Request $request)
    {
        $skala = DB::table('skala_linier')->where('question_id',$request->id)->update(['label_minimum' => $request->label]);
        return $skala;
    }

    public function updateLabelMaximum(Request $request)
    {
        $skala = DB::table('skala_linier')->where('question_id',$request->id)->update(['label_maximum' => $request->label]);
        return $skala;
    }

    public function getQuestionType()
    {
        $type = DB::table('question_type')->get();
        return response()->json($type);
    }

    public function addQuestion(Request $request)
    {
        $insert = DB::table('questions')->insert([
            'questionnaire_id'          => $request->id, 
            'question_content'         => '', 
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
        $question = DB::table('questions')->leftJoin('skala_linier', 'questions.question_id', '=', 'skala_linier.question_id')->where('questions.questionnaire_id', $request->id)->get();
        return response()->json($question);
    }

    public function updateQuestionType(Request $request)
    {
        $question = DB::table('questions')->where('question_id',$request->question_id)->update(['question_type' => $request->question_type]);
        if($question){
            if($request->question_type == 'Skala Linier'){
                $jml = DB::table('skala_linier')->where('question_id', $request->question_id)->count();
                if($jml > 0){

                }else{
                    $insert = DB::table('skala_linier')->insert([
                        'question_id' => $request->question_id
                    ]);
                }
            }
        }
        return $question;
    }

    public function getSkalaLinier(Request $request)
    {
        $result = DB::table('skala_linier')->where('question_id', $request->question_id)->first();
        return response()->json($result);
    }

    public function updateQuestionContent(Request $request)
    {
        $question = DB::table('questions')->where('question_id',(int)$request->question_id)->update(['question_content' => $request->question_content]);
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
