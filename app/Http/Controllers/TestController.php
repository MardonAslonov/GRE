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
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $test->image = $name;
        $test->answer = $request->answer;
        $file->storeAs('public/image', $name);
        $test->save();
        return 'Joylandi';
    }
}
