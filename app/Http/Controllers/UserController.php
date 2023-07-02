<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function registrPage(Request $request)
    {
        return view('registr');
    }

    public function userCreate(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();
        $credentials = [
            'name' => $request->name,
            'password' => $request->password
        ];
        Auth::attempt($credentials);
        return view('success');
    }



    public function userList(Request $request)
    {
        $users = DB::table('users')->paginate(10);
        return view('admin.userList', [
            'users' => $users
        ]);
    }
}
