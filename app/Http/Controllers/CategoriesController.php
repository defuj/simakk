<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{

    public function getCategories(Request $request)
    {
        $result = DB::table('categories')->get();
        return response()->json($result);
    }
}
