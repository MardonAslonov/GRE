<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Result;
use App\Models\Test;
use App\Models\Time;
use App\Models\Total;
use App\Models\User;
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
        if (Auth::User() == null) {
            return view('login');
        }
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
        if (Auth::User() == null) {
            return view('login');
        }
        $user_id = Auth::User()->id;
        $number = $request->number;
        $variant = Variant::where('number', $number)->first();
        $variant_id = $variant->id;
        $results = Result::where('user_id', $user_id)->where('variant_id', $variant_id)->get();
        Time::where('user_id', $user_id)->where('variant_id', $variant_id)->delete();
        $correctAnswerAmount = 0;
        $incorrectAnswerAmount = 0;
        foreach ($results as $result) {
            $correctAnswerAmount = $result->correctAnswer + $correctAnswerAmount;
        }
        foreach ($results as $result) {
            $incorrectAnswerAmount = $result->incorrectAnswer + $incorrectAnswerAmount;
        }
        // $rawScores = $correctAnswerAmount - $incorrectAnswerAmount / 4;
        $totalOld = Total::where('user_id', $user_id)->where('variant_id', $variant_id)->delete();
        $user = User::where('id', $user_id)->get();
        foreach ($user as $item) {
            $userName = $item->name;
            $userSurname = $item->surname;
        }
        $total = new Total();
        $total->user_id = $user_id;
        $total->variant_id = $variant_id;
        $total->userName = $userName;
        $total->userSurname = $userSurname;
        $total->totalCorrect = $correctAnswerAmount;
        $total->save();
        foreach ($results as $result) {
            if ($result->incorrectAnswer == 1) {
                $numberIncorrect = new Number();
                $numberIncorrect->total_id = $total->id;
                $numberIncorrect->number = $result->numberQuestion;
                $numberIncorrect->save();
            }
        }
        Result::where('user_id', $user_id)->where('variant_id', $variant_id)->delete();
        return view('result', [
            'correctAnswerAmount' => $correctAnswerAmount,
            'incorrectAnswerAmount' => $incorrectAnswerAmount,
            'number' => $number,
            // 'rawScores' => $rawScores,
        ]);
    }
}
