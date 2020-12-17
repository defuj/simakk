<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuestionnairesController extends Controller
{
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
