<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create(Request $request)
    {
        $test = new Test();
        $test->variant_id = $request->variant_id;
        $test->image = $request->image;
        $test->answer = $request->answer;
        $test->save();
        $a=Test::where('id',8)->first()->image;
        return ($a);
    }
}
