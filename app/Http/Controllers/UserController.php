<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        dd(1);
        // $user = new User();
        // $user->name = $request->name;
        // $user->surname = $request->surname;
        // $user->phone = $request->phone;
        // $user->password = bcrypt($request->password);
        // $user->save();
        // return view('gre');
    }
}
