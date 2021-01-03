<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswersController extends Controller
{
    public function checkMyAnswers(Request $request)
    {
        $result = DB::select('select * FROM answers where email = :email && questionnaire_id = :questionnaire_id', ['email' => $request->email, 'questionnaire_id' => $request->questionnaire_id]);
        return response()->json($result);
    }

    public function saveAnswers(Request $request)
    {
        $insert = DB::table('answers')->insert([
            'answers_id'          => $request->id, 
            'email'               => $request->email, 
            'questionnaire_id'    => $request->questionnaire_id,
            'created_at'          => NOW(),
            'updated_at'          => NOW(),
        ]);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
