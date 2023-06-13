<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Variant;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testCreate(Request $request)
    {
        $variants = Variant::all();
        return view('admin.subject', [
            'variants' => $variants
        ]);
    }

    public function start(Request $request)
    {
        $count = count(Test::where('variant_id', 'GR-1776')->get());
        $id = $request->id;
        $test = Test::where('id', $id)->first();
        $image = $test->image;
        return view('test', [
            'image' => $image,
            'id' => $id,
            'count' => $count,
        ]);
    }

    public function startSelect(Request $request)
    {
        $count = count(Test::where('variant_id', 'GR-1776')->get());
        $id = $request->a;
        $test = Test::where('id', $id)->first();
        $image = $test->image;
        return view('test', [
            'image' => $image,
            'id' => $id,
            'count' => $count,
        ]);
    }

    public function nextQuestion(Request $request)
    {
        $id = $request->id;
        $count = $request->count;
        $id = $id + 1;
        $test = Test::where('id', $id)->first();
        $image = $test->image;
        return view('test', [
            'image' => $image,
            'id' => $id,
            'count' => $count,
        ]);
    }

    public function previousQuestion(Request $request)
    {
        $id = $request->id;
        $count = $request->count;
        $id = $id - 1;
        $test = Test::where('id', $id)->first();
        $image = $test->image;
        return view('test', [
            'image' => $image,
            'id' => $id,
            'count' => $count,
        ]);
    }
}
