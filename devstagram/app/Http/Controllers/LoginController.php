<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //Validando formulario login
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Si la autenticación falla regresamos con un mensaje de error
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        //Si la autenticación es correcta redireccionamos al usuario al dashboard
        return redirect()->route('posts.index');
    }
}
