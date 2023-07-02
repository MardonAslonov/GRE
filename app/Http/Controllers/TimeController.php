<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimeController extends Controller
{
    public function answerListPage(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
        $variants = Variant::all();
        return view('admin.answerListPage', [
            'variants' => $variants
        ]);
    }

    public function answerList(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
        $variant_id = $request->variantId;
        $tests = DB::table('tests')->where('variant_id', $variant_id)->paginate(10);
        return view('admin.answerList', [
            'tests' => $tests,
            'variantId' => $variant_id,

        ]);
    }
}
