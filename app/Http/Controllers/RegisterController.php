<?php

namespace App\Http\Controllers;

use Facades\App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {

        User::saveOrUpdate($request->all());

        dd('fin');


    }
}
