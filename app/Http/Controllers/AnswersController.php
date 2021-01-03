<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswersController extends Controller
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

    public function checkMyAnswers(Request $request)
    {
        $result = DB::select('select * FROM answers where email = :email && questionnaire_id = :questionnaire_id', ['email' => $request->email, 'questionnaire_id' => $request->questionnaire_id]);
        return response()->json($result);
    }

    public function saveAnswers(Request $request)
    {
        $id = $this->random_id();
        $insert = DB::table('answers')->insert([
            'answers_id'          => $id, 
            'email'               => $request->email, 
            'questionnaire_id'    => $request->questionnaire_id,
            'created_at'          => NOW(),
            'updated_at'          => NOW(),
        ]);

        if($insert){
            $result = [
                'result' => true, 
                'id'     => $id
            ];
            return $result;
        }else{
            $result = [
                'result' => false, 
            ];
            return $result;
        }
    }

    public function addAnswers(Request $request)
    {
        $insert = DB::table('answers_content')->insert([
            'answers_id'          => $request->answers_id, 
            'questionnaire_id'    => $request->questionnaire_id, 
            'question_id'         => $request->question_id,
            'question_type'       => $request->question_type,
            'answer'              => $request->answers,
            'created_at'          => NOW(),
            'updated_at'          => NOW(),
        ]);

        if($insert){
            $result = [
                'result' => true, 
            ];
            return $result;
        }else{
            $result = [
                'result' => false, 
            ];
            return $result;
        }
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
