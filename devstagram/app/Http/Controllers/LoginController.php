<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store($request)
    {
        //Validando formulario login
        $this->validate($request, [
            'email' => $request->email,
            'password' => $request->password
        ]);
    }
}
