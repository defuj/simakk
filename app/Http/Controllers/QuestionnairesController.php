<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuestionnairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaire = DB::table('questionnaires')->get(); //Questionnaire::all();
        return response()->json($questionnaire);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = rand();
        $insert = DB::table('questionnaires')->insert([
            'questionnaire_id'          => $id, 
            'questionnaire_title'       => '', 
            'questionnaire_description' => '', 
            'questionnaire_status'      => 'enable',//enable & disabled
            'questionnaire_type'        => 'draf',//draf & publish
            'created_at'                => Date('Y-d-m h:i:s'),
            'updated_at'                => Date('Y-d-m h:i:s'),
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
        //
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
