<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VariantController extends Controller
{
    public function variantCreate(Request $request)
    {
        $variant = new Variant();
        $variant->number = $request->number;
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $variant->nameImage = $name;
        $file->storeAs('public/variant', $name);
        $variant->save();
        return 'Variant joylandi';
    }

    public function home(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
        $variants = Variant::all();
        return view('gre', [
            'variants' => $variants,
        ]);
    }
}
