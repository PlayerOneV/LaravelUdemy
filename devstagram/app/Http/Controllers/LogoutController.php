<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {   //Cerramos la sesión
        auth()->logout();
        return redirect()->route('login');
    }
}
