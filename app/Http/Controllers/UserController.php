<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        return view('users.create');
    }
    public function store(){
        $attributs = request()->validate([
            'name'=>'required|max:255',
            'role'=>'required',
            'password'=>'required'
        ]);
        $attributs['password'] = bcrypt($attributs['password']);
        $user = User::create($attributs);
        auth()->login($user);
        return redirect('/');
    }
    public function logout()
    {
        auth()->logout();
        return redirect("/register");
    }
    public function log()
    {
        return view("users.login");
    }
    public function login()
    {
        $user = User::where("name", "=", request("name"))->first();
        if ($user && Hash::check(request("password"), $user->password)) {
            Auth::login($user);
            return redirect("/");
        }
        return redirect("/login");
    }
}
