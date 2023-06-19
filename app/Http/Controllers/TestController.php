<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Test;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function testCreatePage(Request $request)
    {
        $variants = Variant::all();
        return view('admin.testCreatePage', [
            'variants' => $variants
        ]);
    }

    public function testCreate(Request $request)
    {
        $test = new Test();
        $test->variant_id = $request->variantId;
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $test->nameImage = $name;
        $test->answer = $request->answer;
        $file->storeAs('public/test', $name);
        $test->save();
        return 'Test joylandi';
    }

    public function start(Request $request)
    {
        $number = $request->number;
        $id = $request->id;
        $tests = Test::where('variant_id', $id)->get();
        $count = count($tests);
        $testArrayNumber = 0;
        $test = $tests[$testArrayNumber];
        $nameImage = $test->nameImage;
        $answer = $test->answer;
        return view('test', [
            'nameImage' => $nameImage,
            'answer' => $answer,
            'id' => $id,
            'count' => $count,
            'number' => $number,
            'testArrayNumber' => $testArrayNumber,
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
        $number = $request->number;
        $id = $request->id;
        $testArrayNumber = $request->testArrayNumber;
        $tests = Test::where('variant_id', $id)->get();
        $count = count($tests);
        $testArrayNumber = $testArrayNumber + 1;
        $test = $tests[$testArrayNumber];
        $nameImage = $test->nameImage;
        $answer = $test->answer;
        $user_id = Auth::User()->id;
        $variant = Variant::where('number', $number)->first();
        $numbersOfHasAnswer = Result::where('user_id', $user_id)->where('variant_id', $variant->id)->get();
        return view('test', [
            'nameImage' => $nameImage,
            'id' => $id,
            'count' => $count,
            'number' => $number,
            'testArrayNumber' => $testArrayNumber,
            'answer' => $answer,
            'numbersOfHasAnswer' => $numbersOfHasAnswer,
        ]);
    }

    public function previousQuestion(Request $request)
    {
        $number = $request->number;
        $id = $request->id;
        $testArrayNumber = $request->testArrayNumber;
        $tests = Test::where('variant_id', $id)->get();
        $count = count($tests);
        $testArrayNumber = $testArrayNumber - 1;
        $test = $tests[$testArrayNumber];
        $nameImage = $test->nameImage;
        $answer = $test->answer;
        return view('test', [
            'nameImage' => $nameImage,
            'id' => $id,
            'count' => $count,
            'number' => $number,
            'testArrayNumber' => $testArrayNumber,
            'answer' => $answer,
        ]);
    }
}
