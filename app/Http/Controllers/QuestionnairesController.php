<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuestionnairesController extends Controller
{
    public function random_id() {
        $length = 45;
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-';
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    public function duplicateKuesioner(Request $request)
    {
        $old = DB::table('questionnaires')->where('questionnaire_id', $request->id)->first();

        $id = $this->random_id();
        $insert = DB::table('questionnaires')->insert([
            'questionnaire_id'          => $id, 
            'questionnaire_title'       => $old->questionnaire_title, 
            'questionnaire_description' => $old->questionnaire_description, 
            'questionnaire_status'      => 'enable',//enable & disabled
            'questionnaire_type'        => 'draf',//draf & publish
            'created_at'                => NOW(),
            'updated_at'                => NOW()
        ]);

        $questions = DB::table('questions')->where('questionnaire_id', $request->id)->get();
        foreach ($questions as $question) {
            DB::table('questions')->insert([
                'questionnaire_id'          => $id, 
                'question_content'          => $question->question_content, 
                'question_require'          => $question->question_require,
                'question_index'            => $question->question_index,
                'question_type'             => $question->question_type,
                'created_at'                => NOW(),
                'updated_at'                => NOW()
            ]);
        }

        $news = DB::table('questions')->where('questionnaire_id', $id)->get();
        foreach ($news as $new) {
            $new->question_id;

            if($new->question_type === "Skala Linier"){
                $skalas = DB::table('skala_linier')
                ->join('questions', 'skala_linier.question_id', '=', 'questions.question_id')
                ->where('questions.questionnaire_id', $request->id)->get();
                foreach ($skalas as $skala) {
                    DB::table('skala_linier')->insert([
                        'question_id'   => $new->question_id,
                        'minimum'       => $skala->minimum,
                        'maximum'       => $skala->maximum,
                        'label_minimum' => $skala->label_minimum,
                        'label_maximum' => $skala->label_maximum,
                    ]);
                }
            }else if($new->question_type === "Pilihan Ganda"){
                $options = DB::table('multiple_choice')
                ->join('questions', 'multiple_choice.question_id', '=', 'questions.question_id')
                ->where('questions.questionnaire_id', $request->id)->get();
                foreach ($options as $option) {
                    DB::table('multiple_choice')->insert([
                        'question_id'          => $new->question_id,
                        'choice'               => $option->choice
                    ]);
                }
            }
        }

        if($insert){
            $result = [
                'result' => true, 
                'id' => $id
            ];

            return $result;
        }else{
            $result = [
                'result' => false
            ];

            return $result;
        }
    }

    public function getTemplates(Request $request)
    {
        if($request->id == 0){
            $templates = DB::table('templates')
            ->select(
                'questionnaires.questionnaire_id',
                'questionnaires.questionnaire_title',
                'questionnaires.questionnaire_description',
                'questionnaires.questionnaire_status',
                'questionnaires.questionnaire_type',
                'questionnaires.created_at',
                'questionnaires.updated_at',
                'categories.category',
            )
            ->join('questionnaires', 'questionnaires.questionnaire_id', '=', 'templates.questionnaire_id')
            ->join('categories', 'categories.id', '=', 'templates.category_id');
            return response()->json($templates->get());
        }else{
            $templates = DB::table('templates')
            ->select(
                'questionnaires.questionnaire_id',
                'questionnaires.questionnaire_title',
                'questionnaires.questionnaire_description',
                'questionnaires.questionnaire_status',
                'questionnaires.questionnaire_type',
                'questionnaires.created_at',
                'questionnaires.updated_at',
                'categories.category',
            )
            ->join('questionnaires', 'questionnaires.questionnaire_id', '=', 'templates.questionnaire_id')
            ->join('categories', 'categories.id', '=', 'templates.category_id')
            ->where('templates.category_id', $request->id)->get();
            return response()->json($templates);
        }
    }

    public function updateStatus(Request $request)
    {
        $status = ($request->status == 'true') ? 'enable' : 'disabled';
        $update = DB::table('questionnaires')->where('questionnaire_id', $request->id)->update(['questionnaire_status' => $status]);
        return $update;
    }

    public function updateType(Request $request)
    {
        $type = ($request->type == 'true') ? 'publish' : 'draf';
        $update = DB::table('questionnaires')->where('questionnaire_id', $request->id)->update(['questionnaire_type' => $type]);
        return $update;
    }

    public function updateTitle(Request $request)
    {
        $update = DB::table('questionnaires')->where('questionnaire_id', $request->id)->update(['questionnaire_title' => $request->title]);
        return $update;
    }

    public function updateDescription(Request $request)
    {
        $update = DB::table('questionnaires')->where('questionnaire_id', $request->id)->update(['questionnaire_description' => $request->desc]);
        return $update;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$questionnaire = Db::->select('')->get();
        $questionnaire = DB::table('questionnaires')->orderByDesc('created_at')->get(); //Questionnaire::all();
        return response()->json($questionnaire);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = $this->random_id();
        $insert = DB::table('questionnaires')->insert([
            'questionnaire_id'          => $id, 
            'questionnaire_title'       => '', 
            'questionnaire_description' => '', 
            'questionnaire_status'      => 'enable',//enable & disabled
            'questionnaire_type'        => 'draf',//draf & publish
            'created_at'                => NOW(),
            'updated_at'                => NOW(),
        ]);

        if($insert){
            $result = [
                'result' => true, 
                'id' => $id
            ];

            return $result;
        }else{
            $result = [
                'result' => false
            ];

            return $result;
        }
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
     * Display the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $questionnaire = DB::table('questionnaires')->where('questionnaire_id', $request->kode)->first();
        return response()->json($questionnaire);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $questionnaire = DB::table('questionnaires');
        $questionnaire->where('questionnaire_id', 'like', '%'.$request->search.'%');
        $questionnaire->orWhere('questionnaire_title', 'like', '%'.$request->search.'%');
        $questionnaire->orWhere('questionnaire_description', 'like', '%'.$request->search.'%');
        return response()->json($questionnaire->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = DB::table('questionnaires')->where('questionnaire_id',$request->id);
        return $delete->delete();
    }
}
