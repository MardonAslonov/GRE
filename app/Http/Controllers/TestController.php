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
        $file->storeAs('public', $name);
        $test->save();
        return 'Joylandi';
    }

    public function start(Request $request)
    {
        $id = $request->id;
        $test = Test::where('id', $id)->first();
        $image = $test->image;
        return view('test', [
            'image' => $image,
            'id' => $id
        ]);
    }

    public function nextQuestion(Request $request)
    {
        $id = $request->id;
        $id = $id + 1;
        $test = Test::where('id', $id)->first();
        $image = $test->image;
        return view('test', [
            'image' => $image,
            'id' => $id
        ]);
    }

    public function previousQuestion(Request $request)
    {
        $id = $request->id;
        $id = $id - 1;
        $test = Test::where('id', $id)->first();
        $image = $test->image;
        return view('test', [
            'image' => $image,
            'id' => $id
        ]);
    }
}
