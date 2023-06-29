<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Total;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NumberController extends Controller
{
    public function numberIncorrect(Request $request)
    {
        $number = $request->number;
        $variant = Variant::where('number', $number)->first();
        $variant_id = $variant->id;
        $user_id = $request->user_id;
        $total = Total::where('variant_id', $variant_id)->where('user_id', $user_id)->first();
        $total_id = $total->id;


        $numbersIncorrect = Number::where('total_id', $total_id)->get();
        // dd($numbersIncorrect);

        // $variants = Variant::all();
        return view('checkTrue', [
            'numbersIncorrect' => $numbersIncorrect,
        ]);
    }
}
