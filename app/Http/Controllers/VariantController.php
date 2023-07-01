<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VariantController extends Controller
{
    public function variantCreate(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
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

    public function testCreatePage(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
        $variants = Variant::all();
        return view('admin.testCreatePage', [
            'variants' => $variants
        ]);
    }

    public function testCreate(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
        $test = new Test();
        $test->variant_id = $request->variantId;
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $test->nameImage = $name;
        $test->answer = $request->answer;
        $file->storeAs('public/test', $name);
        $test->save();
        return 'Test joylandi';
    }

    public function testDeletePage(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
        $variants = Variant::all();
        return view('admin.testDeletePage', [
            'variants' => $variants
        ]);
    }

    public function testGet(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
        $variantId = $request->variantId;
        $tests = Test::where('variant_id', $variantId)->get();
        return view('admin.testDeletePageTwo', [
            'tests' => $tests
        ]);
    }

    public function testDelete(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
        $testId = $request->testId;
        $tests = Test::where('id', $testId)->first();
        $filename = $tests->nameImage;
        $tests->delete();
        unlink(storage_path('app/public/test/' . $filename));
        return 'Test o\'chirildi';
    }


    public function variantDeletePage(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
        $variants = Variant::all();
        return view('admin.variantDeletePage', [
            'variants' => $variants
        ]);
    }

    public function variantDelete(Request $request)
    {
        if (Auth::User() == null) {
            return view('login');
        }
        $variantId = $request->variantId;
        $tests = Test::where('variant_id', $variantId)->get();
        foreach ($tests as $test) {
            $fileNameTest = $test->nameImage;
            unlink(storage_path('app/public/test/' . $fileNameTest));
        }
        $variant = Variant::where('id', $variantId)->first();
        $fileNameVariant = $variant->nameImage;
        $variant->delete();
        unlink(storage_path('app/public/variant/' . $fileNameVariant));
        return 'Variant savollari bilan birgalikda o\'chirildi';
    }
}
