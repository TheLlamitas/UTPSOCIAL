<?php

namespace App\Http\Controllers;

use Facades\App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(LoginRequest $request)
    {
        $user = User::saveOrUpdate($request->all());
        return redirect()->route('post', ['user' => $user]);
    }
}
