<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = [
            'name' => $request->name,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            $variants = Variant::all();
            return view('gre', [
                'variants' => $variants,
            ]);
            // return view('gre');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return view('login');
    }
}
