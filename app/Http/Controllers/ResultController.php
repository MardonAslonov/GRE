<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Test;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function answerUser(Request $request)
    {
        $number = $request->number;
        $id = $request->id;
        $testArrayNumber = $request->testArrayNumber;
        $answer = $request->answer;
        $answerUser = $request->answerUser;
        $result = new Result();
        $user_id = Auth::User()->id;
        $result->user_id = $user_id;
        $variant = Variant::where('number', $number)->first();
        $result->variant_id = $variant->id;
        $result->numberQuestion = $testArrayNumber + 1;
        if ($answerUser == $answer) {
            $result->correctAnswer = 1;
            $result->noAnswer = 0;
        } elseif ($answerUser != $answer) {
            $result->incorrectAnswer = 1;
            $result->noAnswer = 0;
        }
        $result->save();
        $numbersOfHasAnswer = Result::where('user_id', $user_id)->where('variant_id', $variant->id)->get();
        $tests = Test::where('variant_id', $id)->get();
        $count = count($tests);
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
            'numbersOfHasAnswer' => $numbersOfHasAnswer,
        ]);
    }
}
