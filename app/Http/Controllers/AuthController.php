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
            'phone' => $request->phone,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            $variants = Variant::all();
            return view('gre', [
                'variants' => $variants,
            ]);
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
