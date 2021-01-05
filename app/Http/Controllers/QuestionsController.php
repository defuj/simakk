<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    public function getSkalaLiniers(Request $request)
    {
        $select = DB::select(
            'select DISTINCT answers_content.questionnaire_id,answers_content.question_id as quest_id,answers_content.question_type,answers_content.answer as answer2, (select DISTINCT count(*) from answers_content WHERE question_id = quest_id AND answer = answer2 ORDER BY answer) as total FROM answers_content WHERE answers_content.question_id = :id ORDER BY answers_content.answer', 
            ['id' => $request->question_id,]);
        return response()->json($select);
    }

    public function getMultipleChoiceResult(Request $request)
    {
        $select = DB::select(
            'select multiple_choice.question_id,multiple_choice.choice, (select count(*) from answers_content INNER JOIN questions on questions.question_id = answers_content.question_id WHERE answers_content.question_id = multiple_choice.question_id AND answers_content.answer = multiple_choice.choice) AS total FROM multiple_choice WHERE multiple_choice.question_id = :id', 
            ['id' => $request->question_id,]);
        return response()->json($select);
    }

    public function getSimpleAnswers(Request $request)
    {
        $select = DB::select(
            'select *
            from answers_content 
            where question_id = :id1 AND question_type = "Jawaban Singkat"', 
            ['id1' => $request->question_id,]);
        return response()->json($select);
    }

    public function getAnswerContent(Request $request)
    {
        $select = DB::select(
            'select
            answers_content.id,
            answers_content.answers_id,
            answers_content.questionnaire_id,
            answers_content.question_id,
            answers_content.question_type,
            answers_content.answer,
            (select count(*) from answers_content where questionnaire_id = answers_content.questionnaire_id && question_id = answers_content.question_id) as total 
            from answers_content 
            where answers_content.questionnaire_id = :id1 ORDER BY answers_content.question_id ASC', 
            ['id1' => $request->questionnaire_id,]);
        return response()->json($select);
    }

    public function getQuestionOptions(Request $request)
    {
        $select = DB::select(
            'select * from multiple_choice where question_id = :id1', 
            [
                'id1' => $request->question_id,
            ]);
            return response()->json($select);
    }

    public function getQuestionResponses(Request $request)
    {
        $select = DB::select(
                'select 
                questions.question_id,
                questions.questionnaire_id,
                questions.question_content,
                questions.question_type,
                (select count(*) from answers_content where questionnaire_id = :id1 && question_id = questions.question_id) AS total_responden
                from questions 
                where questions.questionnaire_id = :id2', 
                [
                    'id1' => $request->id,
                    'id2' => $request->id,
                ]);
                return response()->json($select);
    }

    public function getQuestion(Request $request)
    {
        $question = DB::table('questions')
        ->select('questions.question_id','questions.questionnaire_id','questions.question_content','questions.question_type','questions.question_require','skala_linier.minimum','skala_linier.maximum','skala_linier.label_minimum','skala_linier.label_maximum')
        ->leftJoin('skala_linier', 'skala_linier.question_id', '=', 'questions.question_id')
        ->where('questions.questionnaire_id', $request->id)->get();
        //$question = DB::select('select * FROM questions left join skala_linier on skala_linier.question_id = questions.question_id where questions.questionnaire_id = :id', ['id' => $request->id]);
        return response()->json($question);
    }

    public function updateOptions(Request $request)
    {
        $update = DB::table('multiple_choice')->where('id',$request->id)->update(['choice' => $request->choice]);
        return $update;
    }

    public function getOptions(Request $request)
    {
        //$options = DB::table('multiple_choice')
        //->select('multiple_choice.id','multiple_choice.question_id','multiple_choice.choice')
        //->join('questions', 'questions.questionnaire_id', '=', $request->questionnaire_id);

        $result = DB::select('select DISTINCT(multiple_choice.id),multiple_choice.question_id,multiple_choice.choice FROM multiple_choice INNER join questions on questions.questionnaire_id = :id', ['id' => $request->questionnaire_id]);
        return response()->json($result);
    }

    public function deleteOptions(Request $request){
        $delete = DB::table('multiple_choice')->where('id',$request->id);
        return $delete->delete();
    }

    public function addOptions(Request $request)
    {
        $insert = DB::table('multiple_choice')->insert([
            'question_id'          => $request->id
        ]);
        if($insert){
            $result = 1;
            return $result;
        }else{
            $result = 0;
            return $result;
        }
    }

    public function updateSkalaMinimum(Request $request)
    {
        $skala = DB::table('skala_linier')->where('question_id',$request->id)->update(['minimum' => $request->minimum]);
        return $skala;
    }

    public function updateSkalaMaximum(Request $request)
    {
        $skala = DB::table('skala_linier')->where('question_id',$request->id)->update(['maximum' => $request->maximum]);
        return $skala;
    }

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
            'question_content'          => 'Ketikan pertanyaan Anda di sini...', 
            'question_type'             => 'Jawaban Singkat',
            'created_at'                => NOW(),
            'updated_at'                => NOW(),
        ]);

        if($insert){
            $question = DB::table('questions')->where('questionnaire_id', $request->id)->get();
            return response()->json($question);
        }else{
            $result = [];

            return $result;
        }
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
