<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Total;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TotalController extends Controller
{
    public function ratingPage(Request $request)
    {
        $number = $request->number;
        $variant = Variant::where('number', $number)->first();
        $variant_id = $variant->id;
        $totals = DB::table('totals')->where('variant_id', $variant_id)
            ->orderByRaw('totalCorrect DESC')->paginate(10);
        if (Auth::User() == null) {
            return view('login');
        }
        $user_id = Auth::User()->id;
        $total = Total::where('variant_id', $variant_id)->where('user_id', $user_id)->first();
        if ($total != null) {
            $total_id = $total->id;
        } else {
            $total_id = 0;
            $total = 0;
        }
        $numbersIncorrect = Number::where('total_id', $total_id)->get();
        return view('rating', [
            'totals' => $totals,
            'number' => $number,
            'numbersIncorrect' => $numbersIncorrect,
            'total_id' => $total_id,
            'total' => $total,

        ]);
    }

    public function ratingEndPage(Request $request)
    {
        $number = $request->number;
        $variant = Variant::where('number', $number)->first();
        $variant_id = $variant->id;
        $totals = DB::table('totals')->where('variant_id', $variant_id)
            ->orderByRaw('totalCorrect DESC')->paginate(10);
        return view('ratingEnd', [
            'totals' => $totals,
            'number' => $number,
        ]);
    }

    public function ratingAll(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
        $variants = Variant::all();
        return view('ratingAll', [
            'variants' => $variants
        ]);
    }
}
