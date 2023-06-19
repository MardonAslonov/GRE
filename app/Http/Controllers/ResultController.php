<?php

namespace App\Http\Controllers;

use App\Models\Result;
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
        $result->user_id = Auth::User()->id;
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
        return 'Success';

        // $testArrayNumber = $testArrayNumber - 1;
        // $test = $tests[$testArrayNumber];
        // $nameImage = $test->nameImage;
        // $answer = $test->answer;
        // return view('test', [
        //     'nameImage' => $nameImage,
        //     'id' => $id,
        //     'count' => $count,
        //     'number' => $number,
        //     'testArrayNumber' => $testArrayNumber,
        //     'answer' => $answer,
        // ]);
    }
}
