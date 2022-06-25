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

        //Confirmamos que el usuario exista en la bd,como parametros pasamos las credenciales y un booleano para mantener la sesión abierta
        if (auth()->attempt($request->only('email', 'password'), $request->remember)) {
            //Si la autenticación es correcta redireccionamos al usuario al dashboard
            return redirect()->route('posts.index');
        } else {
            //Si la autenticación falla regresamos con un mensaje de error
            return back()->with('mensaje', 'Credenciales incorrectas');
        }
    }
}
