<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        /*Obteniendo valores del formulario
        dd($request->get('name')); */

        //Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]); //Tenemos que transformalo antes de verificar si ya existe

        //Validación de valores recibidos del formulario
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        //Después de pasada la validación se agrega a la tabla users
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //Autenticar un usuario
        /* auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]); */
        auth()->attempt($request->only('email', 'password'));

        //Redireccionamiento
        return redirect()->route('posts.index');
    }
}
