<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Test;
use App\Models\Time;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function start(Request $request)
    {
        $number = $request->number;
        $id = $request->id;
        $tests = Test::where('variant_id', $id)->get();
        $testChek = 0;
        foreach ($tests as $test) {
            $testChek = 1;
        }
        if ($testChek == 0) {
            return view('null');
        }
        $count = count($tests);
        $testArrayNumber = 0;
        $test = $tests[$testArrayNumber];
        $nameImage = $test->nameImage;
        $answer = $test->answer;
        if (Auth::User() == null) {
            return view('login');
        }
        $user_id = Auth::User()->id;
        $variant = Variant::where('number', $number)->first();
        $variant_id = $variant->id;
        $numbersOfHasAnswer = Result::where('user_id', $user_id)->where('variant_id', $variant_id)->get();
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
            'answer' => $answer,
            'id' => $id,
            'count' => $count,
            'number' => $number,
            'testArrayNumber' => $testArrayNumber,
            'numbersOfHasAnswer' => $numbersOfHasAnswer,
            'deltaTime' => $deltaTime,
        ]);
    }

    public function startSelect(Request $request)
    {
        $number = $request->number;
        $id = $request->id;
        $testArrayNumber = $request->testArrayNumber;
        $tests = Test::where('variant_id', $id)->get();
        $count = count($tests);
        $test = $tests[$testArrayNumber];
        $nameImage = $test->nameImage;
        $answer = $test->answer;
        if (Auth::User() == null) {
            return view('login');
        }
        $user_id = Auth::User()->id;
        $variant = Variant::where('number', $number)->first();
        $variant_id = $variant->id;
        $numbersOfHasAnswer = Result::where('user_id', $user_id)->where('variant_id', $variant_id)->get();
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

    public function nextQuestion(Request $request)
    {
        $number = $request->number;
        $id = $request->id;
        $testArrayNumber = $request->testArrayNumber;
        $tests = Test::where('variant_id', $id)->get();
        $count = count($tests);
        $testArrayNumber = $testArrayNumber + 1;
        if ($testArrayNumber >= $count) {
            $testArrayNumber = 0;
        }
        $test = $tests[$testArrayNumber];
        $nameImage = $test->nameImage;
        $answer = $test->answer;
        if (Auth::User() == null) {
            return view('login');
        }
        $user_id = Auth::User()->id;
        $variant = Variant::where('number', $number)->first();
        $variant_id = $variant->id;
        $numbersOfHasAnswer = Result::where('user_id', $user_id)->where('variant_id', $variant_id)->get();
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

    public function previousQuestion(Request $request)
    {
        $number = $request->number;
        $id = $request->id;
        $testArrayNumber = $request->testArrayNumber;
        $tests = Test::where('variant_id', $id)->get();
        $count = count($tests);
        $testArrayNumber = $testArrayNumber - 1;
        if ($testArrayNumber <= -1) {
            $testArrayNumber = $count - 1;
        }
        $test = $tests[$testArrayNumber];
        $nameImage = $test->nameImage;
        $answer = $test->answer;
        if (Auth::User() == null) {
            return view('login');
        }
        $user_id = Auth::User()->id;
        $variant = Variant::where('number', $number)->first();
        $variant_id = $variant->id;
        $numbersOfHasAnswer = Result::where('user_id', $user_id)->where('variant_id', $variant_id)->get();
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
}
