<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Facades\App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function index() {
        if(Auth::check()){
            return redirect()->route('post', auth()->user()->username);
        }
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $request->request->add([
            'username' => Str::slug($request->username),
            'password' => Hash::make($request->password),
        ]);

        User::saveOrUpdate($request->all());
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('post', auth()->user()->username);

    }
}
