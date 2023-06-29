<?php

namespace App\Http\Controllers;

use App\Models\Total;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TotalController extends Controller
{
    public function ratingPage(Request $request)
    {
        $number = $request->number;
        $variant = Variant::where('number', $number)->first();
        $variant_id = $variant->id;
        $totals = DB::table('totals')->where('variant_id', $variant_id)
        ->orderByRaw('rawScores DESC')->paginate(10);


        // dd($totals);


        return view('rating', [
            'totals' => $totals,
            // 'variant_id' => $variant_id,
            'number' => $number,
        ]);
    }

    public function ratingEndPage(Request $request)
    {
        $number = $request->number;
        $variant = Variant::where('number', $number)->first();
        $variant_id = $variant->id;
        $totals = DB::table('totals')->where('variant_id', $variant_id)
        ->orderByRaw('rawScores DESC')->paginate(10);

        // dd($totals);

        return view('ratingEnd', [
            'totals' => $totals,
            // 'variant_id' => $variant_id,
            'number' => $number,
        ]);
    }

    public function ratingAll(Request $request)
    {
        $variants = Variant::all();
        return view('ratingAll', [
            'variants' => $variants
        ]);
    }
}
