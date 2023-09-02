<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store()
    {
        dd('primer dd');
        dump("sigo");
        dd('Hola desde el controlador');
    }
}
