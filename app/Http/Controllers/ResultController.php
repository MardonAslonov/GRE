<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Test;
use App\Models\Time;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class ResultController extends Controller
{
    public function answerUser(Request $request)
    {
        $number = $request->number;
        $id = $request->id;
        $testArrayNumber = $request->testArrayNumber;
        $answer = $request->answer;
        $answerUser = $request->answerUser;
        $user_id = Auth::User()->id;
        $variant = Variant::where('number', $number)->first();
        $variant_id = $variant->id;
        $testResult = Result::where('user_id', $user_id)->where('variant_id', $variant_id)->where('numberQuestion', $testArrayNumber + 1)->get();
        foreach ($testResult as $key) {
            $key->delete();
        }
        $result = new Result();
        $result->user_id = $user_id;
        $result->variant_id = $variant->id;
        $result->numberQuestion = $testArrayNumber + 1;
        $result->answerUser = $answerUser;
        if ($answerUser == $answer) {
            $result->correctAnswer = 1;
            $result->noAnswer = 0;
        } elseif ($answerUser != $answer) {
            $result->incorrectAnswer = 1;
            $result->noAnswer = 0;
        }
        $result->save();
        $numbersOfHasAnswer = Result::where('user_id', $user_id)->where('variant_id', $variant_id)->get();
        $tests = Test::where('variant_id', $id)->get();
        $count = count($tests);
        $test = $tests[$testArrayNumber];
        $nameImage = $test->nameImage;
        $answer = $test->answer;

        $time = Time::where('user_id', $user_id)->where('variant_id', $variant_id)->get();
        $startTime = 0;
        foreach ($time as $key) {
            $startTime = $key->startTime;
            $key->delete();
        }
        $time = new Time();
        $time->user_id = $user_id;
        $time->variant_id = $variant_id;
        if ($startTime == 0) {
            $time->startTime = time();
        } else {
            $time->startTime = $startTime;
        }
        $time->save();
        $currentTime = time();
        $deltaTime = $currentTime - $time->startTime;

        return view('test', [
            'nameImage' => $nameImage,
            'id' => $id,
            'count' => $count,
            'number' => $number,
            'testArrayNumber' => $testArrayNumber,
            'answer' => $answer,
            'numbersOfHasAnswer' => $numbersOfHasAnswer,
            'deltaTime' => $deltaTime,
        ]);
    }

    public function finishTest(Request $request)
    {
        $user_id = Auth::User()->id;
        $number = $request->number;
        $variant = Variant::where('number', $number)->first();
        $results = Result::where('user_id', $user_id)->where('variant_id', $variant->id)->get();

        $time = Time::where('user_id', $user_id)->where('variant_id', $variant->id)->delete();

        $correctAnswerAmount = 0;
        $incorrectAnswerAmount = 0;
        foreach ($results as $result) {
            $correctAnswerAmount = $result->correctAnswer + $correctAnswerAmount;
        }
        foreach ($results as $result) {
            $incorrectAnswerAmount = $result->incorrectAnswer + $incorrectAnswerAmount;
        }
        return view('result', [
            'correctAnswerAmount' => $correctAnswerAmount,
            'incorrectAnswerAmount' => $incorrectAnswerAmount,
            'number' => $number,
        ]);
    }
}
