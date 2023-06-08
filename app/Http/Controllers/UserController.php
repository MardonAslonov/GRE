<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function userCreate(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();
        // return $this->auth($request->name,$request->password);
        $credentials =[
            'name' => $request->name,
            'password' => $request->password
        ];
        Auth::attempt($credentials);
        return view('gre');
    }

    public function registrPage(Request $request)
    {
        return view('registr');
    }
}
