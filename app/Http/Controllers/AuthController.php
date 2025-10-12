<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        echo $request->input('text_username'); //capturando um capo especifico do request
        echo "<br>";
        echo $request->input('text_password');

    }
    
    public function logout()
    {
        echo 'logout';
    }
}
